<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnitUpdateRequest extends FormRequest
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

        $id = $this->route('unit')->id;

        return [
            'name' => 'required|string|unique:units,name,' . $id . '|max:255',
            'slug' => 'required|string|unique:units,slug,' . $id . '|max:255',
            'symbol' => 'required|string|max:10',
            'description' => 'nullable|string|max:500',
            'status' => 'required|in:Active,Inactive',
        ];
    }
}
