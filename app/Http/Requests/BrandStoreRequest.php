<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class BrandStoreRequest extends FormRequest
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
            'created_by' => Auth::user()->id,
        ]);

        return [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:brands,slug|max:255',
            'code' => 'required|string|unique:brands,code|max:255',
            'status' => 'required|in:Active,Inactive',
            'description' => 'nullable|string|max:500',
            'meta_title' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:500',
            'meta_description' => 'nullable|string|max:500',
            'image' => 'nullable|image|max:2048',
            'created_by' => 'required|exists:users,id',
        ];
    }
}
