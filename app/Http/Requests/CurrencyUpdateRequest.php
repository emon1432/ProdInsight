<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CurrencyUpdateRequest extends FormRequest
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

        $id = $this->route('currency')->id;

        return [
            'name' => 'required|string|unique:currencies,name,' . $id . '|max:255',
            'slug' => 'required|string|unique:currencies,slug,' . $id . '|max:255',
            'code' => 'required|string|unique:currencies,code,' . $id . '|max:10',
            'symbol' => 'required|string|max:10',
            'conversion_rate' => 'required|numeric|min:0',
            'status' => 'required|in:Active,Inactive',
        ];
    }
}
