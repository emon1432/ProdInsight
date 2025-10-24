<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class TaxRequest extends FormRequest
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

        $id = $this->route('tax')?->id;

        return [
            'name' => [
                'required', 'string', 'max:255',
                Rule::unique('taxes', 'name')->ignore($id),
            ],
            'slug' => [
                'required', 'string', 'max:255',
                Rule::unique('taxes', 'slug')->ignore($id),
            ],
            'calculation_method' => ['required', 'in:Percentage,Fixed'],
            'rate' => ['required', 'numeric', 'min:0'],
            'type' => ['required', 'in:Inclusive,Exclusive'],
            'scope' => ['required', 'in:Product,Sales,Purchase'],
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
            'name.required' => 'Please enter a tax name.',
            'slug.unique' => 'This tax name already exists.',
            'calculation_method.required' => 'Please select a calculation method.',
            'calculation_method.in' => 'Calculation method must be either Percentage or Fixed.',
            'rate.required' => 'Please enter the tax rate.',
            'rate.numeric' => 'Tax rate must be a numeric value.',
            'rate.min' => 'Tax rate cannot be negative.',
            'type.required' => 'Please select the tax type.',
            'type.in' => 'Tax type must be either Inclusive or Exclusive.',
            'scope.required' => 'Please select the scope of this tax.',
            'scope.in' => 'Scope must be one of Product, Sales, or Purchase.',
            'status.required' => 'Please select a status for this tax.',
            'status.in' => 'Status must be either Active or Inactive.',
            'description.max' => 'Description cannot be longer than 500 characters.',
        ];
    }
}
