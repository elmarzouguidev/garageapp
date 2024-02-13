<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

trait ULidGenerator
{
    public function scopeUlid(Builder $query, $ulid): Builder
    {
        return $query->where($this->getUlidName(), $ulid);
    }

    public function getUlidName(): string
    {
        return property_exists($this, 'ulidName') ? $this->ulidName : 'ulid';
    }

    public static function bootULidGenerator(): void
    {
        static::creating(function (Model $model) {
            if (Schema::hasColumn($model->getTable(), $model->getUlidName())) {
                $model->{$model->getUlidName()} = Str::lower(Str::ulid());
            }
        });
    }
}
