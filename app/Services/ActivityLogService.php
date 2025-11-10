<?php

namespace App\Services;

use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Log;

class ActivityLogService
{
    public static function record(string $event, $model = null, array $extra = [])
    {
        try {
            $data = array_merge([
                'user_id'     => Auth::id(),
                'user_name'   => Auth::user()?->name,
                'role_id'     => Auth::user()?->role?->id,
                'role_name'   => Auth::user()?->role?->name,
                'event'       => $event,
                'title'       => ucfirst($event) . ($model ? ' ' . class_basename($model::class) : ''),
                'description' => $extra['description'] ?? self::defaultDescription($event, $model),
                'model_type'  => $model ? get_class($model) : null,
                'model_id'    => $model?->id,
                'model_name'  => self::detectModelName($model),
                'properties'  => $extra['properties'] ?? null,
                'ip_address'  => Request::ip(),
                'user_agent'  => Request::userAgent(),
                'platform'    => $extra['platform'] ?? 'web',
                'source'      => Request::is('api/*') ? 'api' : 'web',
                'url'         => Request::fullUrl(),
            ], $extra);
            return ActivityLog::create($data);
        } catch (\Throwable $e) {
            Log::error('ActivityLogService Error: ' . $e->getMessage());
            return null;
        }
    }

    protected static function defaultDescription(string $event, $model = null)
    {
        $modelName = $model ? class_basename($model::class) : 'record';
        return ucfirst($event) . ' ' . strtolower($modelName);
    }

    protected static function detectModelName($model)
    {
        if (!$model) return null;
        return $model->name
            ?? $model->title
            ?? $model->slug
            ?? ('Record #' . $model->id);
    }
}
