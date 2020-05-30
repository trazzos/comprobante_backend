<?php

namespace App\Services\Abstracts;

use App\Repositories\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CrudPostAbstract
 * @package App\Services\Abstracts
 */
abstract class CrudPostAbstract {
    /**
     * @var RepositoryInterface $repo
     */
    protected RepositoryInterface $repo;

    /**
     * @param array $data
     * @return Model|null
     */
    public function create(array $data) : ?Model {
        $data =  $this->repo->create($data);
        return $data;
    }
}
