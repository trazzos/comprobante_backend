<?php

namespace Modules\Action\Repositories\Implementation;
use App\Repositories\Implementation\BaseRepository;
use Modules\Action\Models\Action;
use Modules\Action\Repositories\Interfaces\ActionRepositoryInterface;


/**
 * Class ActionRepository
 * @package Modules\Action\Repositories\Implementation
 */
class ActionRepository extends BaseRepository implements ActionRepositoryInterface {
    /**
     * @return string
     */
    public function model() : string {
        return Action::class;
    }
}
