<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Http\Requests\RolePermissionRequest;
use App\Models\Role;
use App\View\Components\Actions;
use App\View\Components\PermissionsViewModal;
use App\View\Components\StatusBadge;
use App\View\Components\TotalUsers;
use Illuminate\Http\Request;

class RolesPermissionsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
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
        try {
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
                'redirect' => route('roles-permissions.index'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => __('Whoops! Something went wrong. Please try again later. Error: ') . $e->getMessage(),
                'redirect' => null,
            ], 500);
        }
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
        try {
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
                'redirect' => route('roles-permissions.index'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => __('Whoops! Something went wrong. Please try again later. Error: ') . $e->getMessage(),
                'redirect' => null,
            ], 500);
        }
    }

    public function destroy(string $id)
    {
        try {
            $role = Role::findOrFail($id);
            if ($role->id == 1) {
                return response()->json([
                    'status' => 403,
                    'message' => __('You cannot delete the super admin role'),
                    'redirect' => route('roles-permissions.index'),
                ]);
            }

            $role->delete();

            return response()->json([
                'status' => 200,
                'message' => __('Role deleted successfully'),
                'redirect' => route('roles-permissions.index'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => __('Whoops! Something went wrong. Please try again later. Error: ') . $e->getMessage(),
                'redirect' => null,
            ], 500);
        }
    }

    protected function data()
    {
        return Role::with('users')->get()->map(function ($role) {
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
            $role->total_users = (new TotalUsers($role))->render()->render();
            $role->permission_view = (new PermissionsViewModal($role))->render()->render();
            $role->status = (new StatusBadge($role->status))->render()->render();
            return $role;
        })->toArray();
    }
}
