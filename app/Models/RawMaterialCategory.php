<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RawMaterialCategory extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'status',
        'description',
        'created_by',
    ];

    public function rawMaterials()
    {
        return $this->hasMany(RawMaterial::class, 'raw_material_category_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
