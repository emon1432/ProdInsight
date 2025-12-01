<?php

namespace App\Models;

use App\Traits\Loggable;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use Loggable;

    protected $fillable = [
        'icon',
        'key',
        'value',
    ];
}
