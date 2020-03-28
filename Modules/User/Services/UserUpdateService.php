<?php

namespace Modules\User\Services;

use Modules\User\Models\User;
use Modules\User\Repositories\Interfaces\UserRepositoryInterface;
use Hash;

/**
 * Class UserUpdateService
 * @package Modules\User\Services
 */
class UserUpdateService {
    /**
     * @var UserRepositoryInterface
     */
    private $userRepo;

    /**
     * UserUpdateService constructor.
     * @param UserRepositoryInterface $userRepo
     */
    public function __construct(UserRepositoryInterface $userRepo) {
        $this->userRepo = $userRepo;
    }

    /**
     * @param User $user
     * @param array $data
     * @return User|null
     */
    public function update(User $user, array $data) : ?User {
        $data = $this->normalizeData($user, $data);

        return $this->userRepo->updateAndReturn($data, $data["id"]);
    }

    /**
     * @param User $user
     * @param array $data
     * @return array
     */
    private function normalizeData(User $user, array $data) {
        //Si el password que pusimos en el formulario esta vacio, NO queremos cambiar el password, lo tenemos que quitar
        //de nuestro array de $data
        if(!isset($data['password'])) {
            unset($data['password']);
        } else {
            //De lo contrario es un password valido, lo tenemos que encriptar
            $data['password'] = Hash::make($data['password']);
        }

        //TODO aqui tambien podriamos agregar el user_id para saber quien fue el usuario que agrego a este nuevo usuario por ejemplo
        //Obvio ahorita no tenemos el campo en la tabla user. Se los dejo de tarea
        $data['user_id'] = $user['id'];

        return $data;
    }
}
