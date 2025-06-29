<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class NonInventoryItemStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $this->merge([
            'slug' => slugify($this->name),
            'created_by' => Auth::user()->id,
        ]);

        return [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:non_inventory_items,slug|max:255',
            'code' => 'required|string|unique:non_inventory_items,code|max:255',
            'status' => 'required|in:Active,Inactive',
            'description' => 'nullable|string|max:500',
            'created_by' => 'nullable|exists:users,id',
        ];
    }
}
