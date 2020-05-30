<?php

namespace App\Services\Abstracts;

use App\Facades\Filter;
use App\Facades\Sort;
use App\Facades\ThrowException;
use App\Repositories\Interfaces\RepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class CrudGetService
 * @package App\Services\Abstracts
 */
abstract class CrudGetService {
    /**
     * @var RepositoryInterface $repo
     */
    protected RepositoryInterface $repo;

    /**
     * @param array $data
     * @return LengthAwarePaginator|null
     */
    public function list(array $data) : ?LengthAwarePaginator {
        if(isset($data['predicates'])) {
            Filter::apply(__NAMESPACE__, $this->repo, $data['predicates']);
        }co

        if(isset($data['sorts'])) {
            Sort::apply(__NAMESPACE__, $this->repo, $data['sorts']);
        }

        $labels = $this->repo->paginate($data['per_page']);
        $this->repo->resetRepository();

        if(!$labels) {
            ThrowException::notFound();
        }

        return $labels;
    }
}
