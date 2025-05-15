<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\View\Components\Actions;
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

    public function create() {}

    public function store(Request $request) {}

    public function show(string $id) {}

    public function edit(string $id) {}

    public function update(Request $request, string $id) {}

    public function destroy(string $id) {}

    protected function data()
    {
        $roles = Role::with('users')->get()->map(function ($role) {
            $role->total_users = (new TotalUsers($role))->render()->render();
            $role->actions = (new Actions([
                'model' => $role,
                'resource' => 'roles-permissions',
                'buttons' => [
                    'basic' => [
                        'view' => false,
                        'edit' => true,
                        'delete' => true,
                    ],
                ],
            ]))->render()->render();
            return $role;
        });

        return $roles;
    }
}
