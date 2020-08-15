<?php

namespace App\Services\Abstracts;

use App\Repositories\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\User;

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
    public function create(User $user, array $data) : ?Model {
        return $this->repo->create($data);
    }
}
