<?php

namespace App\Services\Abstracts;

use App\Repositories\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\User;

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
     * @return Model|null
     */
    public function update(User $user, array $data) : ?Model {
        return $this->repo->updateAndReturn($data, $data["id"]);
    }
}
