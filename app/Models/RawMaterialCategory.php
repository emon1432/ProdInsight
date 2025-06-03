<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RawMaterialCategory extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'status',
        'description',
        'created_by',
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
