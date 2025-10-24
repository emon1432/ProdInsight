<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class RawMaterialCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        // Auto-generate slug and handle created_by
        $this->merge([
            'slug' => slugify($this->name),
        ]);

        if ($this->isMethod('post')) {
            $this->merge(['created_by' => Auth::id()]);
        }

        $id = $this->route('raw_material_category')?->id;

        return [
            'name' => [
                'required', 'string', 'max:255',
                Rule::unique('raw_material_categories', 'name')->ignore($id),
            ],
            'slug' => [
                'required', 'string', 'max:255',
                Rule::unique('raw_material_categories', 'slug')->ignore($id),
            ],
            'description' => ['nullable', 'string', 'max:500'],
            'status' => ['required', 'in:Active,Inactive'],
            'created_by' => $this->isMethod('post')
                ? ['required', 'exists:users,id']
                : ['nullable', 'exists:users,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Please enter a category name.',
            'slug.unique' => 'This category name already exists.',
            'status.required' => 'Please select a status for this category.',
            'status.in' => 'Status must be either Active or Inactive.',
            'description.max' => 'Description cannot be longer than 500 characters.',
        ];
    }
}
