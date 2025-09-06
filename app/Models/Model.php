<?php

declare(strict_types=1);

namespace App\Models;

use App\Contracts\HasCommonModelProperties;
use App\Contracts\HasModelUuid;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Support\Str;

abstract class Model extends EloquentModel implements HasCommonModelProperties
{
    protected static $unguarded = true;

    protected static function boot()
    {
        parent::boot();
        static::saving(function (EloquentModel $model) {
            if ($model instanceof HasModelUuid) {
                if (! $model->uuid) {
                    $model->uuid = Str::orderedUuid();
                }
            }
        });
    }
}
