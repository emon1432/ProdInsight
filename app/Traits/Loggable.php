<?php

namespace App\Traits;

use App\Services\ActivityLogService;
use Illuminate\Support\Facades\Auth;

trait Loggable
{
    public static function bootLoggable()
    {
        static::created(function ($model) {
            ActivityLogService::record('created', $model, [
                'properties' => [
                    'new' => $model->getAttributes(),
                ],
            ]);
        });

        static::updated(function ($model) {
            $changedKeys = collect($model->getChanges())->keys();
            if ($changedKeys->isNotEmpty()) {
                if ($changedKeys->every(fn($k) => in_array($k, ['deleted_at', 'updated_at']))) {
                    return;
                }
            }

            if ($model->wasChanged()) {
                ActivityLogService::record('updated', $model, [
                    'properties' => [
                        'old' => $model->getOriginal(),
                        'new' => $model->getChanges(),
                    ],
                ]);
            }
        });

        static::deleted(function ($model) {
            $model->deleted_by = Auth::id();
            $model->saveQuietly();
            if (method_exists($model, 'isForceDeleting') && $model->isForceDeleting()) {
                ActivityLogService::record('permanently_deleted', $model, [
                    'properties' => ['old' => $model->getOriginal()],
                    'description' => 'Record permanently deleted'
                ]);
            } else {
                ActivityLogService::record('deleted', $model, [
                    'properties' => ['old' => $model->getOriginal()],
                    'description' => 'Record moved to trash'
                ]);
            }
        });

        static::restored(function ($model) {
            $model->deleted_by = null;
            $model->saveQuietly();
            ActivityLogService::record('restored', $model, [
                'properties' => [
                    'old' => $model->getOriginal(),
                    'new' => $model->getChanges(),
                ],
                'description' => 'Record restored from trash'
            ]);
        });
    }
}
