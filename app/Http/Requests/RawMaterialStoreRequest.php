<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class RawMaterialStoreRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:raw_materials,slug|max:255',
            'code' => 'required|string|unique:raw_materials,code|max:255',
            'barcode' => 'nullable|string|unique:raw_materials,barcode|max:255',
            'raw_material_category_id' => 'required|exists:raw_material_categories,id',
            'purchase_unit_id' => 'required|exists:units,id',
            'purchase_price' => 'required|numeric|min:0',
            'different_consumption' => 'boolean',
            'consumption_unit_id' => 'nullable|required_if:different_consumption,true|exists:units,id',
            'conversion_rate' => 'nullable|required_if:different_consumption,true|numeric|min:0',
            'consumption_price' => 'nullable|required_if:different_consumption,true|numeric|min:0',
            'stock' => 'required|numeric|min:0',
            'alert_stock' => 'nullable|numeric|min:0',
            'image' => 'nullable|image|max:2048',
            'description' => 'nullable|string|max:500',
            'status' => 'required|in:Active,Inactive',
            'created_by' => 'required|exists:users,id',
        ];
    }
}
