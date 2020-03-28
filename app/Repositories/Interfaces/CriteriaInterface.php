<?php

namespace App\Repositories\Interfaces;

/**
 * Interface CriteriaInterface
 * @package App\Repositories\Contracts
 */
interface CriteriaInterface
{
    /**
     * @param $model
     * @param RepositoryInterface $repository
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository);
}