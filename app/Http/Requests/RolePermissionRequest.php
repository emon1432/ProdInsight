<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class RolePermissionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $this->merge([
            'slug' => Str::slug($this->name),
        ]);

        $id = $this->route('role')?->id;

        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('roles', 'name')->ignore($id),
            ],
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('roles', 'slug')->ignore($id),
            ],
            'status' => ['required', 'in:Active,Inactive'],
            'permission' => ['nullable', 'array'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Please enter a role name.',
            'slug.unique' => 'This role name already exists.',
            'status.required' => 'Please select a status for the role.',
            'status.in' => 'Status must be either Active or Inactive.',
            'permission.array' => 'Permissions must be provided as an array.',
        ];
    }
}
