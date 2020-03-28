<?php

namespace App\Services;

use App;
use App\Repositories\Interfaces\RepositoryInterface;


    /**
 * Class FilterService
 * @package App\Services
 */
class FilterService {
    /**
     * @param $nameSpace
     * @param $repository
     * @param array $predicates
     * @return mixed
     */
    public function apply(string $nameSpace, RepositoryInterface $repository, array $predicates) /*: ?Collection*/ {
        foreach($predicates as $predicate) {
            $repository->pushCriteria(App::makeWith($this->getDecoratorName($nameSpace, $predicate), ['predicate' => $predicate]));
        }
    }

    private function getDecoratorName(string $nameSpace, array $predicate) {
        return "\\". $nameSpace . '\\Filters\\' .
            str_replace(' ', '', ucwords(
                    str_replace('_', ' ', $predicate["name"])
                )
            );
    }
}
