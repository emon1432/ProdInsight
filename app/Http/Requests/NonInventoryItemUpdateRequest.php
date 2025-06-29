<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NonInventoryItemUpdateRequest extends FormRequest
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

        $id = $this->route('non_inventory_item')->id;

        return [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:non_inventory_items,slug,' . $id . '|max:255',
            'code' => 'required|string|unique:non_inventory_items,code,' . $id . '|max:255',
            'status' => 'required|in:Active,Inactive',
            'description' => 'nullable|string|max:500',
        ];
    }
}
