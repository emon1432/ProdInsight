<?php

namespace App\Http\Controllers;

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

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|unique:users,phone',
            'role' => 'required|exists:roles,id',
            'address' => 'nullable|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if (!$validated) {
            return redirect()->back()->withErrors($validated)->withInput();
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = bcrypt($request->password);
        $user->role_id = $request->role;
        $user->image = $request->file('image') ? imageUploadManager($request->file('image'), slugify($request->name), 'users') : null;
        $user->save();

        return response()->json([
            'status' => 200,
            'message' => 'User created successfully'
        ]);
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        imageDeleteManager($user->image);
        $user->delete();

        notify()->success('User deleted successfully');
        return redirect()->route('users.index');
    }

    protected function data()
    {
        $users = User::all()->map(function ($user) {
            $user->name = (new UserInfo($user))->render()->render();
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
                        'custom' => [
                            'View' => [
                                'route' => route('users.show', $user->id),
                                'icon' => 'eye',
                            ],
                        ],
                    ],
                ]
            ))->render()->render();
            return $user;
        });

        return $users;
    }
}
