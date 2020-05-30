<?php

namespace App\Services\Abstracts;

use App\Repositories\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Modules\Label\Models\Label;

/**
 * Class CrudPatchAbstract
 * @package App\Services\Abstracts
 */
abstract class CrudPatchAbstract {
    /**
     * @var RepositoryInterface $repo
     */
    protected RepositoryInterface $repo;

    /**
     * @param array $data
     * @return Label|null
     */
    public function update(array $data) : ?Model {
        $data =  $this->repo->updateAndReturn($data, $data["id"]);
        return $data;
    }
}