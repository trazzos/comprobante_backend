<?php

namespace Modules\AnnouncementType\Repositories\Implementation;
use App\Repositories\Implementation\BaseRepository;
use Modules\AnnouncementType\Models\AnnouncementType;
use Modules\AnnouncementType\Repositories\Interfaces\AnnouncementTypeRepositoryInterface;


/**
 * Class AnnouncementTypeRepository
 * @package Modules\AnnouncementType\Repositories\Implementation
 */
class AnnouncementTypeRepository extends BaseRepository implements AnnouncementTypeRepositoryInterface {
    /**
     * @return string
     */
    public function model() : string {
        return AnnouncementType::class;
    }
}