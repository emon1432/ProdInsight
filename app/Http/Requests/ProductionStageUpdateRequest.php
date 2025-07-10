<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductionStageUpdateRequest extends FormRequest
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

        $id = $this->route('production_stage')->id;

        return [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:production_stages,slug,' . $id . '|max:255',
            'code' => 'required|string|unique:production_stages,code,' . $id . '|max:255',
            'status' => 'required|in:Active,Inactive',
            'description' => 'nullable|string|max:500',
        ];
    }
}
