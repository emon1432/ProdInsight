<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class RawMaterialCategoryStoreRequest extends FormRequest
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
            'name' => 'required|string|unique:raw_material_categories,name|max:255',
            'slug' => 'required|string|unique:raw_material_categories,slug|max:255',
            'description' => 'nullable|string|max:500',
            'status' => 'required|in:Active,Inactive',
            'created_by' => 'required|exists:users,id',
        ];
    }
}
