<?php
namespace Modules\Invoice\Composites\Abstracts;

use Modules\Invoice\Composites\Interfaces\NodeGroupInterface;
use Modules\Invoice\Composites\Interfaces\NodeInterface;
use DOMDocument;
use DOMElement;

/**
 * Class NodeGroupAbstract
 * @package Modules\Search\Composites\Abstracts
 */
abstract class NodeGroupAbstract extends NodeAbstract implements NodeGroupInterface {
    /**
     * @var NodeInterface[]
     */
    protected $nodes = [];

    /**
     * @param NodeInterface $node
     * The methods for adding/removing sub-objects.
     */
    public function add(NodeInterface $node): void {
        $this->nodes[] = $node;
    }

    /**
     * @param DOMDocument $xml
     * @param DOMElement $parentNode
     * @return DOMDocument
     * The base implementation of the Composite's rendering simply combines
     * results of all children. Concrete Composites will be able to reuse this
     * implementation in their real rendering implementations.
     */
    public function render(DOMDocument $xml, DOMElement $parentNode) : DOMDocument {
        foreach ($this->nodes as $key => $node) {
            $xml = $node->render($xml, $parentNode);
        }

        return $xml;
    }
}
