<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class TaxStoreRequest extends FormRequest
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
            'name' => 'required|string|unique:taxes,name|max:255',
            'slug' => 'required|string|unique:taxes,slug|max:255',
            'calculation_method' => 'required|in:Percentage,Fixed',
            'rate' => 'required|numeric|min:0',
            'type' => 'required|in:Inclusive,Exclusive',
            'scope' => 'required|in:Product,Sales,Purchase',
            'status' => 'required|in:Active,Inactive',
            'description' => 'nullable|string|max:500',
            'created_by' => 'required|exists:users,id',
        ];
    }
}
