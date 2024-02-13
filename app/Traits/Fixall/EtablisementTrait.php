<?php

namespace App\Traits\Fixall;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

trait EtablisementTrait
{
    public function scopeEtablisement(Builder $query, $uuid): Builder
    {
        return $query->where('etablisement_uuid', $uuid ?? request()->header('default_etablisement'));
    }

    public static function bootEtablisementTrait(): void
    {
        /*static::creating(function ($model) {
            if (Schema::hasColumn($model->getTable(), $model->getUuidName())) {
                $model->{$model->getUuidName()} = Str::uuid();
            }
        });*/
    }
}
