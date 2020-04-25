<?php
namespace Modules\Invoice\Composites\Abstracts;

use Illuminate\Database\Eloquent\Builder;
use Modules\Invoice\Composites\Abstracts\NodeAbstract;
use Modules\Invoice\Composites\Interfaces\NodeLeafInterface;
use Validator;
use ThrowException;
use DOMDocument;

/**
 * Class NodeLeafAbstract
 * @package Modules\Search\Composites
 * The base Leaf class implements the infrastructure for managing the leaf
 * objects, reused by all Leaves.
 */
abstract class NodeLeafAbstract extends NodeAbstract implements NodeLeafInterface {
    /**
     * PredicateLeaf constructor.
     */
    public function __construct() {
        //TODO properties used by all leaves
        parent::__construct();
        //$this->validate($predicate);
    }

    /**
     * @return mixed
     * Default criteria class used by the render method.
     */
 /*   abstract public function criteriaObject() : ?CriteriaInterface;*/

    /**
     * @param DOMDocument $xml
     * @return DOMDocument
     * Basic implementation of the render query builder.
     * Override it if you need more functionality
     */
    public function render(DOMDocument $xml, $parentNode): DOMDocument {
        //$criteria = $this->criteriaObject();
        return $xml;
        //return $criteria->apply($query, $this->filterPayloadMapper->repository);
    }

    /**
     * @param array $predicate
     * @return void
     * Our first line of defense is the class name. For each valid type and comparison we must have a class
     * At this point we only need to validate a valid value type that matches what's expected. IE Type string should be a string
     * Override this if you need extra validations.
     */
/*    public function validate(array $predicate) : void {
        $data = [
            $predicate['name'] => $predicate['value']
        ];

        $validator = Validator::make($data, [
            $predicate['name'] => 'required|'.$predicate['type'],
        ]);

        if ($validator->fails()) {
            ThrowException::badRequest($validator->errors()->first());
        }
    }*/
}
