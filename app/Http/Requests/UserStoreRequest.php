<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|unique:users,phone',
            'role_id' => 'required|exists:roles,id',
            'address' => 'nullable|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ];
    }
}
