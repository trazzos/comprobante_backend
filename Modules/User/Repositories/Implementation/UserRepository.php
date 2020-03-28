<?php

namespace Modules\User\Repositories\Implementation;
use App\Repositories\Implementation\BaseRepository;
use Modules\User\Models\User;
use Modules\User\Repositories\Interfaces\UserRepositoryInterface;


/**
 * Class UserRepository
 * @package Modules\User\Repositories\Implementation
 */
class UserRepository extends BaseRepository implements UserRepositoryInterface {
    /**
     * @return string
     */
    public function model() : string {
        return User::class;
    }
}