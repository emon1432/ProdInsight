<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProductionStageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        // Auto-generate slug and handle created_by
        $this->merge([
            'slug' => slugify($this->name),
        ]);

        if ($this->isMethod('post')) {
            $this->merge(['created_by' => Auth::id()]);
        }

        $id = $this->route('production_stage')?->id;

        return [
            'name' => ['required', 'string', 'max:255'],
            'slug' => [
                'required', 'string', 'max:255',
                Rule::unique('production_stages', 'slug')->ignore($id),
            ],
            'code' => [
                'required', 'string', 'max:255',
                Rule::unique('production_stages', 'code')->ignore($id),
            ],
            'status' => ['required', 'in:Active,Inactive'],
            'description' => ['nullable', 'string', 'max:500'],
            'created_by' => $this->isMethod('post')
                ? ['required', 'exists:users,id']
                : ['nullable', 'exists:users,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Please enter a stage name.',
            'slug.unique' => 'This stage name already exists.',
            'code.required' => 'Please enter a stage code.',
            'code.unique' => 'This stage code already exists.',
            'status.required' => 'Please select a status for this stage.',
            'status.in' => 'Status must be either Active or Inactive.',
            'description.max' => 'Description cannot be longer than 500 characters.',
        ];
    }
}
