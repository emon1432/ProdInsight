<?php

namespace App\Traits;

use App\Services\ActivityLogService;

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
            ActivityLogService::record('deleted', $model, [
                'properties' => ['old' => $model->getOriginal()],
            ]);
        });
    }
}
