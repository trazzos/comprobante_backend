<?php

namespace Modules\Label\Services;

use App\Services\Abstracts\CrudGetService;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Label\Repositories\Interfaces\LabelRepositoryInterface;

/**
 * Class LabelGetService
 * @package Modules\Label\Services
 */
class LabelGetService extends CrudGetService {
    /**
     * LabelGetService constructor.
     * @param LabelRepositoryInterface $labelRepo
     */
    public function __construct(LabelRepositoryInterface $labelRepo) {
        $this->repo = $labelRepo;
        $this->nameSpace = __NAMESPACE__;
    }

    /**
     * @param array $data
     * @return LengthAwarePaginator|null
     */
    public function list(array $data) : ?LengthAwarePaginator {
        $response = parent::list($data);
        $response->load('invoiceType');
        $response->load('branch');
        return $response;
    }
}
