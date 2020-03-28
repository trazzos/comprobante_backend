<?php

namespace App\Repositories\Interfaces;

/**
 * Interface RepositoryCriteriaInterface
 * @package App\Repositories\Contracts
 */
interface RepositoryCriteriaInterface
{
    /**
     * @param bool $status
     * @return $this
     */
    public function skipCriteria($status = true);

    /**
     * @return mixed
     */
    public function getCriteria();

    /**
     * @param CriteriaInterface $criteria
     * @return $this
     */
    public function getByCriteria(CriteriaInterface $criteria);

    /**
     * @param CriteriaInterface $criteria
     * @return $this
     */
    public function pushCriteria(CriteriaInterface $criteria);

    /**
     * @return $this
     */
    public function resetRepository();

    /**
     * @return $this
     */
    public function applyCriteria();
}