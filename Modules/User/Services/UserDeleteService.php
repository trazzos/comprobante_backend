<?php

namespace Modules\User\Services;

use Modules\User\Models\User;
use Modules\User\Repositories\Interfaces\UserRepositoryInterface;

/**
 * Class UserDeleteService
 * @package Modules\User\Services
 */
class UserDeleteService {
    /**
     * @var UserRepositoryInterface
     */
    private $userRepo;

    /**
     * UserGetService constructor.
     * @param UserRepositoryInterface $userRepo
     */
    public function __construct(UserRepositoryInterface $userRepo) {
        $this->userRepo = $userRepo;
    }

    /**
     * @param $id
     * @return User|null
     */
    public function delete($id) : ?User {
        $this->userRepo->delete($id);
        return null;
    }
}
