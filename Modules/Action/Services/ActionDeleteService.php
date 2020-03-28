<?php

namespace Modules\Action\Services;

use Modules\Action\Models\Action;
use Modules\Action\Repositories\Interfaces\ActionRepositoryInterface;

/**
 * Class ActionDeleteService
 * @package Modules\Action\Services
 */
class ActionDeleteService {
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
     * @param $id
     * @return Action|null
     */
    public function delete($id) : ?bool {
        return $this->actionRepo->delete($id);
    }
}
