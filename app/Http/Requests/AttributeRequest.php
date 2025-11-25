<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class AttributeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $this->merge([
            'slug' => slugify($this->name),
            'values' => collect(json_decode($this->values ?? '[]', true) ?? [])
                ->map(fn($v) => [
                    'name' => $v['value'],
                    'slug' => slugify($v['value']),
                ])
                ->all(),
        ]);

        if ($this->isMethod('put')) {
            $this->merge([
                'existing_values' => collect($this->existing_values ?? [])
                    ->map(fn($name, $id) => [
                        'id' => $id,
                        'name' => $name,
                        'slug' => slugify($name),
                    ])
                    ->all(),
            ]);
        }

        if ($this->isMethod('post')) {
            $this->merge(['created_by' => Auth::id()]);
        }

        $id = $this->route('attribute')?->id;

        return [
            'name' => ['bail', 'required', 'string', 'max:255'],
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('attributes', 'slug')->ignore($id),
            ],
            'code' => [
                'required',
                'string',
                'max:255',
                Rule::unique('attributes', 'code')->ignore($id),
            ],
            'status' => ['required', 'in:Active,Inactive'],
            'values' => $this->isMethod('post')
                ? ['required', 'array', 'min:1']
                : ['nullable', 'array'],
            'values.*.slug' => [
                'required',
                function ($attribute, $slug, $fail) use ($id) {
                    $exists = DB::table('attribute_values')
                        ->where('attribute_id', $id)
                        ->where('slug', $slug)
                        ->exists(); // includes deleted

                    if ($exists) {
                        $fail("This value already exists (even in Recycle Bin). Please restore it instead.");
                    }
                }
            ],
            'existing_values.*.slug' => [
                'required',
                function ($attribute, $slug, $fail) use ($id) {
                    $index = explode('.', $attribute)[1];
                    $item = $this->existing_values[$index];
                    $valueId = $item['id'];

                    $exists = DB::table('attribute_values')
                        ->where('attribute_id', $id)
                        ->where('slug', $slug)
                        ->where('id', '<>', $valueId)
                        ->exists(); // includes deleted

                    if ($exists) {
                        $fail("This value already exists (even in Recycle Bin). Please restore it instead.");
                    }
                }
            ],
            'created_by' => $this->isMethod('post')
                ? ['required', 'exists:users,id']
                : ['nullable', 'exists:users,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Please enter an attribute name.',
            'slug.required' => 'Please enter an attribute name.',
            'slug.unique' => 'This attribute name already exists.',
            'code.required' => 'Please enter an attribute code.',
            'code.unique' => 'This attribute code already exists.',
            'status.required' => 'Please select a status for this attribute.',
            'status.in' => 'Status must be either Active or Inactive.',
            'values.required' => 'Please add at least one attribute value.',
            'values.array' => 'Attribute values must be an array.',
            'values.min' => 'Please add at least one attribute value.',
            'values.*.slug.unique' => 'One of the attribute values already exists for this attribute.',
            'existing_values.*.slug.unique' => 'One of the existing attribute values already exists for this attribute.',
        ];
    }
}
