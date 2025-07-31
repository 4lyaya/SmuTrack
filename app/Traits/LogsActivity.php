<?php

namespace App\Traits;

use App\Models\Activity;

trait LogsActivity
{
    public static function bootLogsActivity()
    {
        static::created(function ($model) {
            Activity::create([
                'type' => class_basename($model) . '_created',
                'description' => 'Created new ' . class_basename($model),
                'user_id' => auth()->id(),
                'subject_id' => $model->id,
                'subject_type' => get_class($model),
                'properties' => $model->toArray()
            ]);
        });

        static::updated(function ($model) {
            Activity::create([
                'type' => class_basename($model) . '_updated',
                'description' => 'Updated ' . class_basename($model),
                'user_id' => auth()->id(),
                'subject_id' => $model->id,
                'subject_type' => get_class($model),
                'properties' => $model->getChanges()
            ]);
        });
    }
}
