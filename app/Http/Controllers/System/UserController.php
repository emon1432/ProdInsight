<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Role;
use App\Models\User;
use App\View\Components\Actions;
use App\View\Components\UserInfo;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return response()->json($this->data());
        }
        return view('pages.users.index');
    }

    public function create()
    {
        $roles = Role::all();
        return view('pages.users.create', compact('roles'));
    }

    public function store(UserStoreRequest $request)
    {
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->password = bcrypt($request->password);
            $user->role_id = $request->role_id;
            $user->image = $request->file('image') ? imageUploadManager($request->file('image'), slugify($request->name), 'users') : null;
            $user->save();

            return response()->json([
                'status' => 200,
                'message' => __('User created successfully'),
                'redirect' => route('users.index'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => __('Whoops! Something went wrong. Please try again later. Error: ') . $e->getMessage(),
                'redirect' => null,
            ], 500);
        }
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('pages.users.edit', compact('user', 'roles'));
    }

    public function update(UserUpdateRequest $request, string $id)
    {
        try {
            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->role_id = $request->role_id;
            if ($request->file('image')) {
                $user->image = imageUpdateManager($request->file('image'), slugify($request->name), 'users', $user->image);
            }
            if ($request->password) {
                $user->password = bcrypt($request->password);
            }
            $user->save();

            return response()->json([
                'status' => 200,
                'message' => __('User updated successfully'),
                'redirect' => route('users.index'),
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
            $user = User::findOrFail($id);
            imageDeleteManager($user->image);
            $user->delete();

            return response()->json([
                'status' => 200,
                'message' => __('User deleted successfully'),
                'redirect' => route('users.index'),
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
        $users = User::all()->map(function ($user) {
            $user->actions = (new Actions(
                [
                    'model' => $user,
                    'resource' => 'users',
                    'buttons' => [
                        'basic' => [
                            'view' => true,
                            'edit' => true,
                            'delete' => true,
                        ],
                    ],
                ]
            ))->render()->render();
            $user->name = (new UserInfo($user))->render()->render();
            return $user;
        });

        return $users;
    }
}
