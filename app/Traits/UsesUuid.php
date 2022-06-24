<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait UsesUuid
{
    /**
     * Boot function from Laravel.
     */
    public static function bootUsesUuid()
    {
        static::creating(function ($model) {
            $model->uuid = Str::orderedUuid()->toString();
        });
    }
}
