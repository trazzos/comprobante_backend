<?php
namespace Modules\Invoice\Composites\Abstracts;

use Modules\Invoice\Composites\Interfaces\NodeGroupInterface;
use Modules\Invoice\Composites\Interfaces\NodeInterface;
use DOMDocument;

/**
 * Class NodeGroupAbstract
 * @package Modules\Search\Composites
 */
abstract class NodeGroupAbstract extends NodeAbstract implements NodeGroupInterface {
    /**
     * @var NodeInterface[]
     */
    protected $nodes = [];

    /**
     * NodeGroupAbstract constructor.
     */
    public function __construct() {
        //TODO add properties for the grouped nodes here
        parent::__construct();
    }

    /**
     * @param NodeInterface $node
     * The methods for adding/removing sub-objects.
     */
    public function add(NodeInterface $node): void {
        $this->nodes[] = $node;
    }

    /**
     * @param DOMDocument $xml
     * @return DOMDocument
     * The base implementation of the Composite's rendering simply combines
     * results of all children. Concrete Composites will be able to reuse this
     * implementation in their real rendering implementations.
     */
    public function render(DOMDocument $xml, $parentNode) : DOMDocument {
        foreach ($this->nodes as $key => $node) {
            echo get_class($node);
            echo PHP_EOL;
            $xml = $node->render($xml, $parentNode);
        }

        return $xml;
    }

    /**
     * @param array $predicates
     * @return callable
     */
    private function renderLeaves(array $predicates) : callable {
        return function($query) use ($predicates) {
            foreach ($predicates as $name => $predicate) {
                $query = $predicate->render($query);
            }
        };
    }
}
