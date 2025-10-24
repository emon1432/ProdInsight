<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $this->merge([
            'slug' => slugify($this->name),
            'meta_keywords' => collect(json_decode($this->meta_keywords ?? '[]', true))
                ->pluck('value')
                ->implode(','),
        ]);

        if ($this->isMethod('post')) {
            $this->merge(['created_by' => Auth::id()]);
        }

        $id = $this->route('category')?->id;

        return [
            'name' => ['bail', 'required', 'string', 'max:255'],
            'slug' => [
                'required', 'string', 'max:255',
                Rule::unique('categories', 'slug')->ignore($id),
            ],
            'parent_id' => ['nullable', 'exists:categories,id'],
            'code' => [
                'required', 'string', 'max:255',
                Rule::unique('categories', 'code')->ignore($id),
            ],
            'status' => ['required', 'in:Active,Inactive'],
            'description' => ['nullable', 'string', 'max:500'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_keywords' => ['nullable', 'string', 'max:500'],
            'meta_description' => ['nullable', 'string', 'max:500'],
            'image' => ['nullable', 'image', 'max:2048'],
            'created_by' => $this->isMethod('post')
                ? ['required', 'exists:users,id']
                : ['nullable', 'exists:users,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Please enter a category name.',
            'slug.required' => 'Please enter a category slug.',
            'slug.unique' => 'This category name already exists.',
            'code.required' => 'Please enter a category code.',
            'code.unique' => 'This category code already exists.',
            'status.required' => 'Please select a status for this category.',
            'status.in' => 'Status must be either Active or Inactive.',
            'image.image' => 'The uploaded file must be an image.',
            'image.max' => 'Image size should not exceed 2 MB.',
            'meta_title.max' => 'Meta title cannot be longer than 255 characters.',
            'meta_description.max' => 'Meta description cannot be longer than 500 characters.',
        ];
    }
}
