<?php

namespace Modules\User\Services;

use Illuminate\Pagination\LengthAwarePaginator;
use Modules\User\Repositories\Interfaces\UserRepositoryInterface;
use ThrowException;
use Filter;
use Sort;

/**
 * Class UserGetService
 * @package Modules\User\Services
 */
class UserGetService {
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
     * @param array $data
     * @return LengthAwarePaginator|null
     */
    public function list(array $data) : ?LengthAwarePaginator {
        //Por favor para sus tareas borren estos comentarios, solo son de ejemplo
        //Para aplicar filtros, hay que llamar a esta funcion, por ejemplo para company seria $this->companyRepo
        //Lo demas quedaria igual
        if(isset($data['predicates'])) {
            Filter::apply(__NAMESPACE__, $this->userRepo, $data['predicates']);
        }

        if(isset($data['sorts'])) {
            Sort::apply(__NAMESPACE__, $this->userRepo, $data['sorts']);
        }

        //Notese como no se necesita pasar el parametro de "page" aqui. Ya laravel lo toma en cuenta internamente
        //por ejemplo
        //http://obras.test/api/user?page=1
        //http://obras.test/api/user?page=3
        $users = $this->userRepo->paginate($data['per_page']);
        $this->userRepo->resetRepository(); //Limpiar los criterios SIEMPRE

        if(!$users) {
            ThrowException::notFound();
        }

        return $users;
    }
}
