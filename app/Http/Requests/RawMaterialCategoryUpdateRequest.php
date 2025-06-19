<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RawMaterialCategoryUpdateRequest extends FormRequest
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

        $id = $this->route('raw_material_category')->id;

        return [
            'name' => 'required|string|unique:raw_material_categories,name,' . $id . '|max:255',
            'slug' => 'required|string|unique:raw_material_categories,slug,' . $id . '|max:255',
            'description' => 'nullable|string|max:500',
            'status' => 'required|in:Active,Inactive',
        ];
    }
}
