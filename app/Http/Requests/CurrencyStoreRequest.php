<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CurrencyStoreRequest extends FormRequest
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
            'name' => 'required|string|unique:currencies,name|max:255',
            'slug' => 'required|string|unique:currencies,slug|max:255',
            'code' => 'required|string|unique:currencies,code|max:10',
            'symbol' => 'required|string|max:10',
            'conversion_rate' => 'required|numeric|min:0',
            'status' => 'required|in:Active,Inactive',
            'created_by' => 'required|exists:users,id',
        ];
    }
}
