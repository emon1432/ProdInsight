<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class NonInventoryItemRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $this->merge([
            'slug' => slugify($this->name),
        ]);

        if ($this->isMethod('post')) {
            $this->merge(['created_by' => Auth::id()]);
        }

        $id = $this->route('non_inventory_item')?->id;

        return [
            'name' => ['required', 'string', 'max:255'],
            'slug' => [
                'required', 'string', 'max:255',
                Rule::unique('non_inventory_items', 'slug')->ignore($id),
            ],
            'code' => [
                'required', 'string', 'max:255',
                Rule::unique('non_inventory_items', 'code')->ignore($id),
            ],
            'status' => ['required', 'in:Active,Inactive'],
            'description' => ['nullable', 'string', 'max:500'],
            'created_by' => $this->isMethod('post')
                ? ['required', 'exists:users,id']
                : ['nullable', 'exists:users,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Please enter an item name.',
            'slug.required' => 'Please enter an item name.',
            'slug.unique' => 'This item name already exists.',
            'code.required' => 'Please enter an item code.',
            'code.unique' => 'This item code already exists.',
            'status.required' => 'Please select a status for this item.',
            'status.in' => 'Status must be either Active or Inactive.',
            'description.max' => 'Description cannot be longer than 500 characters.',
        ];
    }
}
