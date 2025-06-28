<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'status',
        'description',
        'created_by',
    ];

    public function rawMaterialsPurchase()
    {
        return $this->hasMany(RawMaterial::class, 'purchase_unit_id');
    }

    public function rawMaterialsConsumption()
    {
        return $this->hasMany(RawMaterial::class, 'consumption_unit_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
