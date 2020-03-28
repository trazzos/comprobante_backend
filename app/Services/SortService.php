<?php

namespace App\Services;

use App;
use App\Repositories\Interfaces\RepositoryInterface;

/**
 * Class SortService
 * @package App\Services
 */
class SortService {
    /**
     * @param $nameSpace
     * @param $repository
     * @param array $sorts
     * @return mixed
     */
    public function apply(string $nameSpace, RepositoryInterface $repository, array $sorts) /*: ?Collection*/ {
        foreach($sorts as $sort) {
            $repository->pushCriteria(App::makeWith($this->getDecoratorName($nameSpace, $sort), ['sort' => $sort]));
        }
    }

    private function getDecoratorName(string $nameSpace, array $sort) {
        return "\\". $nameSpace . '\\Sorts\\' .
            str_replace(' ', '', ucwords(
                    str_replace('.', ' ', $sort["attribute"])
                )
            );
    }
}
