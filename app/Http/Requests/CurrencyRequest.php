<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CurrencyRequest extends FormRequest
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

        $id = $this->route('currency')?->id;

        return [
            'name' => [
                'required', 'string', 'max:255',
                Rule::unique('currencies', 'name')->ignore($id),
            ],
            'slug' => [
                'required', 'string', 'max:255',
                Rule::unique('currencies', 'slug')->ignore($id),
            ],
            'code' => [
                'required', 'string', 'max:10',
                Rule::unique('currencies', 'code')->ignore($id),
            ],
            'symbol' => ['required', 'string', 'max:10'],
            'conversion_rate' => ['required', 'numeric', 'min:0'],
            'status' => ['required', 'in:Active,Inactive'],
            'created_by' => $this->isMethod('post')
                ? ['required', 'exists:users,id']
                : ['nullable', 'exists:users,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Please enter a currency name.',
            'name.unique' => 'This currency name already exists.',
            'slug.required' => 'Please enter a currency slug.',
            'slug.unique' => 'This currency slug already exists.',
            'code.required' => 'Please enter a currency code.',
            'code.unique' => 'This currency code already exists.',
            'symbol.required' => 'Please enter a currency symbol.',
            'conversion_rate.required' => 'Please enter the conversion rate.',
            'conversion_rate.numeric' => 'Conversion rate must be a numeric value.',
            'conversion_rate.min' => 'Conversion rate cannot be negative.',
            'status.required' => 'Please select a status for this currency.',
            'status.in' => 'Status must be either Active or Inactive.',
        ];
    }
}
