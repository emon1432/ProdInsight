<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RawMaterial extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'code',
        'raw_material_category_id',
        'purchase_unit_id',
        'purchase_price',
        'consumption_unit_id',
        'conversion_rate',
        'consumption_price',
        'stock',
        'alert_stock',
        'image',
        'description',
        'status',
        'created_by',
    ];

    public function rawMaterialCategory()
    {
        return $this->belongsTo(RawMaterialCategory::class, 'raw_material_category_id');
    }

    public function purchaseUnit()
    {
        return $this->belongsTo(Unit::class, 'purchase_unit_id');
    }

    public function consumptionUnit()
    {
        return $this->belongsTo(Unit::class, 'consumption_unit_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
