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
            ],
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('roles', 'slug')->where(function ($query) {
                    return $query->where('role_group_id', $this->role_group_id);
                })->ignore($id),
            ],
            'role_group_id' => [
                'required',
                Rule::exists('role_groups', 'id'),
            ],
            'status' => ['required', 'in:Active,Inactive'],
            'permission' => ['nullable', 'array'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Please enter a role name.',
            'slug.unique' => 'This role name already exists in the selected role group.',
            'role_group_id.required' => 'Please select a role group.',
            'role_group_id.exists' => 'The selected role group is invalid.',
            'status.required' => 'Please select a status for the role.',
            'status.in' => 'Status must be either Active or Inactive.',
            'permission.array' => 'Permissions must be provided as an array.',
        ];
    }
}
