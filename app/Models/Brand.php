<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'code',
        'status',
        'image',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'description',
        'created_by',
    ];


    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
