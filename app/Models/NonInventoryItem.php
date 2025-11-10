<?php

namespace App\Models;

use App\Traits\Loggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NonInventoryItem extends Model
{
    use SoftDeletes,Loggable;

    protected $fillable = [
        'name',
        'slug',
        'code',
        'status',
        'description',
        'created_by',
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
