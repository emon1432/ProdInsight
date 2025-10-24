<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UnitRequest extends FormRequest
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

        if ($this->isMethod('post')) {
            $this->merge(['created_by' => Auth::id()]);
        }

        $id = $this->route('unit')?->id;

        return [
            'name' => [
                'required', 'string', 'max:255',
                Rule::unique('units', 'name')->ignore($id),
            ],
            'slug' => [
                'required', 'string', 'max:255',
                Rule::unique('units', 'slug')->ignore($id),
            ],
            'symbol' => ['required', 'string', 'max:10'],
            'description' => ['nullable', 'string', 'max:500'],
            'status' => ['required', 'in:Active,Inactive'],
            'created_by' => $this->isMethod('post')
                ? ['required', 'exists:users,id']
                : ['nullable', 'exists:users,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Please enter a unit name.',
            'slug.unique' => 'This unit name already exists.',
            'symbol.required' => 'Please enter a symbol for this unit.',
            'status.required' => 'Please select a status for this unit.',
            'status.in' => 'Status must be either Active or Inactive.',
            'description.max' => 'Description cannot exceed 500 characters.',
        ];
    }
}
