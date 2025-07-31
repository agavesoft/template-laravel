<?php

namespace App\Traits;

trait ModelActionBy
{
    /**
     * Custom Trait creado para detectar la creación, modificación, borrado logico y restauración de los registros
     * para capturar el id del usuario que realiza la acción, si no hay un usuario logueado el valor sera
     * 0 indicando que es el sistema quien realiza la acción.
     *
     * @return void
     */
    public static function bootModelActionBy(): void
    {
        $user_id = auth()->user() ? auth()->user()->id : 0;
        static::creating(function ($model) use ($user_id) {
            if (!$model->isDirty('created_by')) {
                $model->created_by = $user_id;
            }
            if (!$model->isDirty('updated_by')) {
                $model->updated_by = $user_id;
            }
        });
        static::updating(function ($model) use ($user_id) {
            if (!$model->isDirty('updated_by')) {
                $model->updated_by = $user_id;
            }
        });
        static::deleting(function($model) use ($user_id) {
            $model->deleted_by = $user_id;
            // $model->restored_by = null;
            // $model->restored_at = null;
            $model->save();
        });
        // Comentado a menos que se use Laravel Nova
        // static::restoring(function($model) use ($user_id) {
        //     $model->deleted_by = null;
        //     $model->restored_by = $user_id;
        //     $nowString = Carbon::now()->toString();
        //     $timeZone = $model->created_at->getTimezone();
        //     $restoredAt = Carbon::parse($nowString, $timeZone);
        //     $model->restored_at = $restoredAt;
        //     $model->save();
        // });
    }
}
