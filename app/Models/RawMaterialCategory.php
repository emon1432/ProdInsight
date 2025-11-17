<?php

namespace App\Models;

use App\Traits\Loggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RawMaterialCategory extends Model
{
    use SoftDeletes, Loggable;

    protected $fillable = [
        'name',
        'slug',
        'status',
        'description',
        'created_by',
        'deleted_by',
    ];

    public function rawMaterials()
    {
        return $this->hasMany(RawMaterial::class, 'raw_material_category_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function deletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }
}
