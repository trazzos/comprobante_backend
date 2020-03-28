<?php

namespace Modules\Setting\Services;

use Modules\Setting\Repositories\Interfaces\AwardTypeRepositoryInterface;
use Illuminate\Support\Collection;
/**
 * Class AwardTypeGetService
 * @package Modules\Setting\Services
 */
class AwardTypeGetService {
    /**
     * @var AwardTypeRepositoryInterface
     */
    private $awardTypeRepo;

    /**
     * AwardTypeGetService constructor.
     * * @param AwardTypeRepositoryInterface $awardTypeRepo
     */
    public function __construct(AwardTypeRepositoryInterface $awardTypeRepo) {
        $this->awardTypeRepo = $awardTypeRepo;
    }
    /**
     * @return Collection|null
     */
    public function list() : ?Collection {
        return $this->awardTypeRepo->all();
    }
}
