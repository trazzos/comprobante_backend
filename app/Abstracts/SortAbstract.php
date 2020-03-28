<?php

namespace App\Abstracts;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use stdClass;

/**
 * Class SortAbstract
 * @package App\Abstracts
 */
abstract class SortAbstract {
    /**
     * @param Model|Builder $model
     * @param $predicate
     * @return Builder
     */
    public function asc($model, array $predicate) {
        return $model->orderBy($predicate['attribute']);
    }

    /**
     * @param Model|Builder $model
     * @param $predicate
     * @return Builder
     */
    public function desc($model, array $predicate) {
        return $model->orderByDesc($predicate['attribute']);
    }
}
