<?php

namespace App\Abstracts;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use stdClass;

/**
 * Class FilterService
 * @package App\Abstracts
 */
abstract class FilterAbstract {
    /**
     * @param Model|Builder $model
     * @param $predicate
     * @return Builder
     */
    public function array($model, array $predicate) {
        return $model->whereIn($predicate['attribute'], $predicate['value']);
    }

    /**
     * @param Model|Builder $model
     * @param $predicate
     * @return Builder
     */
    public function contains($model, array $predicate) {
        return $model->whereRaw($predicate['attribute']." LIKE '%".$predicate['value']."%'");
    }

    /**
     * @param Model|Builder $model
     * @param $predicate
     * @return Builder
     */
    public function equals($model, array $predicate) {
        return $model->where($predicate['attribute'], $predicate['value']);
    }
}
