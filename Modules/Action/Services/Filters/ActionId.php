<?php
namespace Modules\Action\Services\Filters;

use App\Abstracts\FilterAbstract;
use App\Repositories\Interfaces\CriteriaInterface;
use App\Repositories\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ActionId
 * @package Modules\Action\Services\Filters
 */
class ActionId extends FilterAbstract implements CriteriaInterface {
    /**
     * @var array
     */
    protected $predicate;

    /**
     * @param array $predicate
     */
    public function  __construct(array $predicate) {
        $this->predicate = $predicate;
    }

    /**
     * @param Model|Builder $model
     * @param RepositoryInterface $repository
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository) : Builder {
        return $this->{$this->predicate['comparison']}($model, $this->predicate);
    }
}
