<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class RawMaterialRequest extends FormRequest
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

        $id = $this->route('raw_material')?->id;

        return [
            'name' => ['required', 'string', 'max:255'],
            'slug' => [
                'required', 'string', 'max:255',
                Rule::unique('raw_materials', 'slug')->ignore($id),
            ],
            'code' => [
                'required', 'string', 'max:255',
                Rule::unique('raw_materials', 'code')->ignore($id),
            ],
            'barcode' => [
                'nullable', 'string', 'max:255',
                Rule::unique('raw_materials', 'barcode')->ignore($id),
            ],
            'raw_material_category_id' => ['required', 'exists:raw_material_categories,id'],
            'purchase_unit_id' => [
                'required',
                Rule::exists('units', 'id')->where(fn($query) => $query->where('status', 'Active')),
            ],
            'purchase_price' => ['required', 'numeric', 'min:0'],
            'different_consumption' => ['boolean'],
            'consumption_unit_id' => [
                'nullable',
                'required_if:different_consumption,true',
                Rule::exists('units', 'id')->where(fn($query) => $query->where('status', 'Active')),
            ],
            'conversion_rate' => ['nullable', 'required_if:different_consumption,true', 'numeric', 'min:0'],
            'consumption_price' => ['nullable', 'required_if:different_consumption,true', 'numeric', 'min:0'],
            'stock' => ['required', 'numeric', 'min:0'],
            'alert_stock' => ['nullable', 'numeric', 'min:0'],
            'image' => ['nullable', 'image', 'max:2048'],
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
            'name.required' => 'Please enter the raw material name.',
            'slug.unique' => 'This raw material name already exists.',
            'code.required' => 'Please enter a code for the raw material.',
            'code.unique' => 'This raw material code already exists.',
            'barcode.unique' => 'This barcode is already assigned to another raw material.',
            'raw_material_category_id.required' => 'Please select a raw material category.',
            'purchase_unit_id.required' => 'Please select a purchase unit.',
            'purchase_price.required' => 'Please enter the purchase price.',
            'purchase_price.numeric' => 'Purchase price must be a numeric value.',
            'different_consumption.boolean' => 'Different consumption must be true or false.',
            'consumption_unit_id.required_if' => 'Please select a consumption unit when different consumption is enabled.',
            'conversion_rate.required_if' => 'Please enter a conversion rate when different consumption is enabled.',
            'consumption_price.required_if' => 'Please enter a consumption price when different consumption is enabled.',
            'stock.required' => 'Please enter the stock quantity.',
            'stock.numeric' => 'Stock must be a numeric value.',
            'alert_stock.numeric' => 'Alert stock must be a numeric value.',
            'image.image' => 'The uploaded file must be an image.',
            'image.max' => 'Image size should not exceed 2 MB.',
            'description.max' => 'Description cannot exceed 500 characters.',
            'status.required' => 'Please select a status.',
            'status.in' => 'Status must be either Active or Inactive.',
        ];
    }
}
