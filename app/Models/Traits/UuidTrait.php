<?php

namespace App\Models\Traits;

use Illuminate\Support\Str;

/**
 * Trait UuidTrait
 * @package App\Models\Traits
 */
trait UuidTrait {
    /**
     *
     */
    protected static function bootUuidTrait() {
        static::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
        });
    }
}