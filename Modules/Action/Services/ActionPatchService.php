<?php

namespace Modules\Action\Services;
use Modules\Action\Repositories\Interfaces\ActionRepositoryInterface;
use Modules\Action\Models\Action;
/**
 * Class ActionPatchService
 * @package Modules\Action\Services
 */
class ActionPatchService {
    /**
     * @var ActionRepositoryInterface
     */
    private $actionRepo;

    /**
     * ActionUpdateService constructor.
     * @param ActionRepositoryInterface $actionRepo
     */
    public function __construct(ActionRepositoryInterface $actionRepo) {
        $this->actionRepo = $actionRepo;
    }

    /**
     * @param array $data
     * @return Action|null
     */
    public function update(array $data) : ?Action {
        return $this->actionRepo->updateAndReturn($data, $data["id"]);
    }
}
