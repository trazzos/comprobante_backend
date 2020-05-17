<?php

namespace Modules\Invoice\Services;

use Modules\Invoice\Composites\Interfaces\NodeGroupInterface;
use Modules\Invoice\Composites\Interfaces\NodeLeafInterface;
use Validator;
use ThrowException;

/**
 * Class NodeGroupClassMapperService
 * @package Modules\Search\Services
 */
class NodeClassMapperService {
    /**
     * @param string $key
     * @param array $attributes
     * @return NodeGroupInterface
     * For each type of filter we need to have a concrete "leaf" instance.
     */
    public function groupClassMapper(string $key, array $attributes) : NodeGroupInterface {
        //TODO validation
        //$this->predicateValidation($predicate);
        $namespace = 'Modules\Invoice\Composites\Groups\\';
        $action = $this->getClassName($key);
        $className = $namespace.$action."Group";

        //From the front end we should never have filters without a matching class and if someone tries to
        //spoof the filter throwing a "not found" is ok, even if all the other filters are ok
        if(!class_exists($className)) {
            \Log::error('Node not implemented: '.$className);
            ThrowException::notFound('Node not implemented: '.$className);
        }

        return new $className($key, $attributes);
    }

    /**
     * @param string $key
     * @param array $attributes
     * @return NodeLeafInterface
     * For each type of filter we need to have a concrete "leaf" instance.
     */
    public function leafClassMapper(string $key, array $attributes) : NodeLeafInterface {
        //TODO validation
        //$this->predicateValidation($predicate);
        $namespace = 'Modules\Invoice\Composites\Leaves\\';
        $action = $this->getClassName($key);
        $className = $namespace.$action."Leaf";

        //From the front end we should never have filters without a matching class and if someone tries to
        //spoof the filter throwing a "not found" is ok, even if all the other filters are ok
        if(!class_exists($className)) {
            \Log::error('Node not implemented: '.$className);
            ThrowException::notFound('Node not implemented: '.$className);
        }

        return new $className($key, $attributes);
    }

    private function getClassName($key) {
        return str_replace(":", "", ucfirst($key));
    }

    /**
     * @param array $predicate
     */
    private function predicateValidation(array $predicate) : void {
        $validator = Validator::make($predicate, [
            'name' => 'required|string',
            'comparison' => 'required|string',
            'type' => 'required|string',
            'value' => 'required',
        ]);

        if ($validator->fails()) {
            ThrowException::badRequest($validator->errors()->first());
        }
    }
}
