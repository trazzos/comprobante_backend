<?php

namespace App\Services\Abstracts;

use App\Repositories\Interfaces\RepositoryInterface;

/**
 * Class CrudDeleteAbstract
 * @package App\Services\Abstracts
 */
abstract class CrudDeleteAbstract {
    /**
     * @var RepositoryInterface $repo
     */
    protected RepositoryInterface $repo;

    /**
     * @param int $id
     * @return false|true
     * If a method is more complicated than this, you can easily overwrite it in the concrete class
     */
    public function delete(int $id): ? bool {
        return $this->repo->delete($id);
    }
}
