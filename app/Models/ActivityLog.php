<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ActivityLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'user_name',
        'role_id',
        'role_name',
        'event',
        'title',
        'description',
        'model_type',
        'model_id',
        'model_name',
        'properties',
        'ip_address',
        'user_agent',
        'platform',
        'source',
        'url',
    ];

    protected $casts = [
        'properties' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function subject()
    {
        return $this->morphTo('model', 'model_type', 'model_id')->withTrashed();
    }

    public function scopeEvent($query, $event)
    {
        return $query->where('event', $event);
    }

    public function scopeForModel($query, $model)
    {
        return $query->where('model_type', get_class($model))
            ->where('model_id', $model->id);
    }

    public function scopeByUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    public function getEventLabelAttribute()
    {
        return ucfirst($this->event);
    }

    public function getTimeAgoAttribute()
    {
        return $this->created_at?->diffForHumans();
    }
}
