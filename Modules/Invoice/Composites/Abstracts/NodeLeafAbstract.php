<?php
namespace Modules\Invoice\Composites\Abstracts;

use Modules\Invoice\Composites\Interfaces\NodeLeafInterface;
use DOMDocument;
use DOMElement;

/**
 * Class NodeLeafAbstract
 * @package Modules\Invoice\Composites\Abstracts
 * The base Leaf class implements the infrastructure for managing the leaf
 * objects, reused by all Leaves.
 */
abstract class NodeLeafAbstract extends NodeAbstract implements NodeLeafInterface {
    /**
     * @param DOMDocument $xml
     * @param DOMElement $parentNode
     * @return DOMDocument
     */
    public function render(DOMDocument $xml, DOMElement $parentNode): DOMDocument {
        $this->addChildNode($xml, $parentNode);
        return $xml;
    }
}
