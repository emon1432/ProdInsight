<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('user')?->id;

        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($id),
            ],
            'phone' => [
                'required',
                'string',
                Rule::unique('users', 'phone')->ignore($id),
            ],
            'role_id' => ['required', 'exists:roles,id'],
            'address' => ['nullable', 'string', 'max:255'],
            'password' => $this->isMethod('post')
                ? ['required', 'string', 'min:8', 'confirmed']
                : ['nullable', 'string', 'min:8', 'confirmed'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Please enter the user name.',
            'email.required' => 'Please enter the email address.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email is already in use.',
            'phone.required' => 'Please enter the phone number.',
            'phone.unique' => 'This phone number is already in use.',
            'role_id.required' => 'Please select a role for the user.',
            'role_id.exists' => 'Selected role is invalid.',
            'address.max' => 'Address cannot exceed 255 characters.',
            'password.required' => 'Please enter a password.',
            'password.min' => 'Password must be at least 8 characters.',
            'password.confirmed' => 'Password confirmation does not match.',
        ];
    }
}
