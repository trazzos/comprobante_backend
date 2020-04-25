<?php

namespace Modules\Invoice\Composites\Abstracts;

use Illuminate\Database\Eloquent\Builder;
use Modules\Invoice\Composites\Interfaces\NodeInterface;
use Modules\Search\Composites\Interfaces\PredicateInterface;
use Modules\Search\Mappers\FilterPayloadMapper;
use DOMDocument;

/**
 * Class NodeAbstract
 * @package Modules\Invoice\Composites
 * The base Component class declares an abstract for all concrete components,
 * both simple and complex. Still going to figure out what is needed for ALL nodes
 */
abstract class NodeAbstract implements NodeInterface {
    /**
     * NodeAbstract constructor.
     */
    public function __construct() {
        //TODO add any global property here
    }

    /**
     * @param DOMDocument $xml
     * @return DOMDocument
     */
    abstract public function render(DOMDocument $xml, $parentNode) : DOMDocument;

    protected function setAttributes(&$nodo, $attribute) {
        foreach ($attribute as $key => $val) {
            if (strlen($val) > 0) {
                $nodo->setAttribute($key,$val);
            }
        }
    }
}
