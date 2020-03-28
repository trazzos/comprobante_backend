<?php

namespace Modules\Action\Services;

use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Action\Repositories\Interfaces\ActionRepositoryInterface;
use ThrowException;
use Filter;
use Sort;

/**
 * Class ActionGetService
 * @package Modules\Action\Services
 */
class ActionGetService {
    /**
     * @var ActionRepositoryInterface
     */
    private $actionRepo;

    /**
     * ActionGetService constructor.
     * @param ActionRepositoryInterface $actionRepo
     */
    public function __construct(ActionRepositoryInterface $actionRepo) {
        $this->actionRepo = $actionRepo;
    }

    /**
     * @param array $data
     * @return LengthAwarePaginator|null
     */
    public function list(array $data) : ?LengthAwarePaginator {
        if(isset($data['predicates'])) {
            Filter::apply(__NAMESPACE__, $this->actionRepo, $data['predicates']);
        }

        if(isset($data['sorts'])) {
            Sort::apply(__NAMESPACE__, $this->actionRepo, $data['sorts']);
        }

        $actions = $this->actionRepo->paginate($data['per_page']);
        $this->actionRepo->resetRepository(); //Limpiar los criterios SIEMPRE

        if(!$actions) {
            ThrowException::notFound();
        }

        return $actions;
    }
}
