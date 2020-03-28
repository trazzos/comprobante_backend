<?php

namespace Modules\Setting\Repositories\Implementation;
use App\Repositories\Implementation\BaseRepository;
use Modules\Setting\Models\AwardType;
use Modules\Setting\Repositories\Interfaces\AwardTypeRepositoryInterface;


/**
 * Class AwardTypeRepository
 * @package Modules\Setting\Repositories\Implementation
 */
class AwardTypeRepository extends BaseRepository implements AwardTypeRepositoryInterface {
    /**
     * @return string
     */
    public function model() : string {
        return AwardType::class;
    }
}
