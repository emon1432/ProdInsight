<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoleGroup extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'status',
    ];

    public function roles()
    {
        return $this->hasMany(Role::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
