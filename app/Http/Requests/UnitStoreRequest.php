<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UnitStoreRequest extends FormRequest
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
            'name' => 'required|string|unique:units,name|max:255',
            'slug' => 'required|string|unique:units,slug|max:255',
            'description' => 'nullable|string|max:500',
            'status' => 'required|in:Active,Inactive',
            'created_by' => 'required|exists:users,id',
        ];
    }
}
