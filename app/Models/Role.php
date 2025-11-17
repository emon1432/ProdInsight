<?php

namespace App\Models;

use App\Traits\Loggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes, Loggable;

    protected $fillable = [
        'name',
        'slug',
        'role_group_id',
        'status',
        'permission',
        'created_by',
        'deleted_by',
    ];

    protected $casts = [
        'permission' => 'array',
    ];

    public function roleGroup()
    {
        return $this->belongsTo(RoleGroup::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
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
