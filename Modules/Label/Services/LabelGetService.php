<?php

namespace Modules\Label\Services;

use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Label\Repositories\Interfaces\LabelRepositoryInterface;
use ThrowException;
use Filter;
use Sort;

/**
 * Class LabelGetService
 * @package Modules\Label\Services
 */
class LabelGetService {
    /**
     * @var LabelRepositoryInterface
     */
    private $labelRepo;

    /**
     * LabelGetService constructor.
     * @param LabelRepositoryInterface $labelRepo
     */
    public function __construct(LabelRepositoryInterface $labelRepo) {
        $this->labelRepo = $labelRepo;
    }
    /**
     * @param array $data
     * @return LengthAwarePaginator|null
     */
    public function list(array $data) : ?LengthAwarePaginator {
        if(isset($data['predicates'])) {
            Filter::apply(__NAMESPACE__, $this->labelRepo, $data['predicates']);
        }

        if(isset($data['sorts'])) {
            Sort::apply(__NAMESPACE__, $this->labelRepo, $data['sorts']);
        }
        $labels = $this->labelRepo->paginate($data['per_page']);
        $labels->load('invoiceType');
        $this->labelRepo->resetRepository();

        if(!$labels) {
            ThrowException::notFound();
        }

        return $labels;
    }
}
