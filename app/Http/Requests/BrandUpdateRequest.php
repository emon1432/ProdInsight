<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $this->merge([
            'slug' => slugify($this->name),
            'meta_keywords' => collect(json_decode($this->meta_keywords, true))
                ->pluck('value')
                ->implode(','),
        ]);

        $id = $this->route('brand')->id;

        return [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:brands,slug,' . $id . '|max:255',
            'code' => 'required|string|unique:brands,code,' . $id . '|max:255',
            'status' => 'required|in:Active,Inactive',
            'description' => 'nullable|string|max:500',
            'meta_title' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:500',
            'meta_description' => 'nullable|string|max:500',
            'image' => 'nullable|image|max:2048',
        ];
    }
}
