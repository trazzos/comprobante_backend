<?php

namespace Modules\Action\Services;

use Modules\Action\Models\Action;
use Modules\Action\Repositories\Interfaces\ActionRepositoryInterface;

/**
 * Class ActionCreateService
 * @package Modules\Action\Services
 */
class ActionCreateService {
    /**
     * @var ActionRepositoryInterface
     */
    private $actionRepo;

    /**r
     * ActionCreateService constructor.
     * @param ActionRepositoryInterface $actionRepo
     */
    public function __construct(ActionRepositoryInterface $actionRepo) {
        $this->actionRepo = $actionRepo;
    }

    /**
     * @param array $data
     * @return Action|null
     */
    public function create(array $data) : ?Action {
        return $this->actionRepo->create($data);
    }
}
