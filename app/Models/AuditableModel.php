<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

abstract class AuditableModel extends Model
{
    protected static function booted()
    {
        static::created(function($model){
            if (auth()->check()) {
                $model->auditable()->create([
                    'user_id' => auth()->user()->id,
                    'action' => Audit::CREATED,
                    'old_values' => json_encode($model->getOriginal()),
                    'new_values' => json_encode($model->getChanges()),
                ]);
            }
        });

        static::updated(function($model){
            if (auth()->check()) {
                $model->auditable()->create([
                    'user_id' => auth()->user()->id,
                    'action' => Audit::UPDATED,
                    'old_values' => json_encode($model->getOriginal()),
                    'new_values' => json_encode($model->getChanges()),
                ]);
            }
        });

        static::deleted(function($model){
            if (auth()->check()) {
                $model->auditable()->create([
                    'user_id' => auth()->user()->id,
                    'action' => Audit::DELETED,
                    'old_values' => json_encode($model->getOriginal()),
                    'new_values' => null,
                ]);
            }
        });
    }

    public function auditable(): MorphMany
    {
        return $this->morphMany(Audit::class, 'auditable');
    }
}