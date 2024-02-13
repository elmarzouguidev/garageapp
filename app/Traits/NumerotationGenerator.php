<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

trait NumerotationGenerator
{
    public static function bootNumerotationGenerator(): void
    {
        static::created(function (Model $model) {
            if (Schema::hasColumn($model->getTable(), 'document_number')) {
                $startColumn = strtolower(class_basename($model)).'_start';
                $prefixColumn = strtolower(class_basename($model)).'_prefix';

                //  dd($startColumn, $prefixColumn, $nameClass, $prefix, $start);

                if (self::count() <= 0) {
                    $number = getDocument()->{$startColumn};
                } else {
                    $number = ($model->max('code') + 1);
                }

                $code = str_pad($number, 5, 0, STR_PAD_LEFT);
                $model->code = $code;
                $model->document_number = getDocument()->{$prefixColumn}.$code;
            }
        });
    }
}
