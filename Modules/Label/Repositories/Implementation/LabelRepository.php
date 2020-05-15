<?php

namespace Modules\Label\Repositories\Implementation;
use App\Repositories\Implementation\BaseRepository;
use Modules\Label\Models\Label;
use Modules\Label\Repositories\Interfaces\LabelRepositoryInterface;


/**
 * Class LabelRepository
 * @package Modules\Label\Repositories\Implementation
 */
class LabelRepository extends BaseRepository implements LabelRepositoryInterface {
    /**
     * @return string
     */
    public function model() : string {
        return Label::class;
    }
}
