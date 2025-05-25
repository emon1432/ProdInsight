<?php

namespace App\Http\Controllers;

use App\Http\Requests\RolePermissionRequest;
use App\Models\Role;
use App\View\Components\Actions;
use App\View\Components\PermissionsViewModal;
use App\View\Components\StatusBadge;
use App\View\Components\TotalUsers;
use Illuminate\Http\Request;
use Illuminate\Notifications\Action;

class RolesPermissionsController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return response()->json($this->data());
        }
        return view('pages.roles-permissions.index');
    }

    public function create()
    {
        $routeList = get_route_list();
        return view('pages.roles-permissions.create', compact('routeList'));
    }

    public function store(RolePermissionRequest $request)
    {
        $routeList = get_route_list();

        if ($request->filled('permission')) {
            foreach ($request->permission as $group => $actions) {
                if (isset($routeList[$group])) {
                    foreach ($routeList[$group] as $action => $_) {
                        $routeList[$group][$action] = in_array($action, $actions);
                    }
                }
            }
        }

        $role = new Role();
        $role->name = $request->name;
        $role->slug = slugify($request->name);
        $role->status = $request->status;
        $role->permission = $routeList;
        $role->save();

        return response()->json([
            'status' => 200,
            'message' => __('Role created successfully'),
        ]);
    }


    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $role = Role::findOrFail($id);
        $routeList = get_route_list();

        if (is_null($role->permission)) {
            $role->permission = json_encode($routeList);
            $role->save();
        }

        $savedPermissions = $role->permission;
        foreach ($routeList as $group => $actions) {
            foreach ($actions as $action => $value) {
                $routeList[$group][$action] = $savedPermissions[$group][$action] ?? false;
            }
        }
        $role->permission = $routeList;
        $role->save();
        return view('pages.roles-permissions.edit', compact('role'));
    }

    public function update(RolePermissionRequest $request, string $id)
    {
        $routeList = get_route_list();

        if ($request->filled('permission')) {
            foreach ($request->permission as $group => $actions) {
                if (isset($routeList[$group])) {
                    foreach ($routeList[$group] as $action => $_) {
                        $routeList[$group][$action] = in_array($action, $actions);
                    }
                }
            }
        }

        $role = Role::findOrFail($id);
        $role->name = $request->name;
        $role->slug = slugify($request->name);
        $role->status = $request->status;
        $role->permission = $routeList;
        $role->save();

        return response()->json([
            'status' => 200,
            'message' => __('Role updated successfully'),
        ]);
    }

    public function destroy(string $id)
    {
        $role = Role::findOrFail($id);
        if ($role->id == 1) {
            return response()->json([
                'status' => 403,
                'message' => __('You cannot delete the super admin role'),
            ]);
        }

        $role->delete();

        return response()->json([
            'status' => 200,
            'message' => __('Role deleted successfully'),
        ]);
    }

    protected function data()
    {
        $roles = Role::with('users')->get()->map(function ($role) {
            $role->total_users = (new TotalUsers($role))->render()->render();
            $role->permission_view = (new PermissionsViewModal($role))->render()->render();
            $role->status = (new StatusBadge($role->status))->render()->render();
            $buttons = [];
            if ($role->id != 1) {
                $buttons = [
                    'basic' => [
                        'view' => false,
                        'edit' => true,
                        'delete' => true,
                    ],
                ];
            }
            $role->actions = (new Actions([
                'model' => $role,
                'resource' => 'roles-permissions',
                'buttons' => $buttons,
            ]))->render()->render();
            return $role;
        });
        return $roles;
    }
}
