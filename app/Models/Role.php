<?php

namespace App\Models;

use App\Traits\Loggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes,Loggable;

    protected $fillable = [
        'name',
        'slug',
        'role_group_id',
        'status',
        'permission',
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
}
