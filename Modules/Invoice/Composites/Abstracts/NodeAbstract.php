<?php

namespace Modules\Invoice\Composites\Abstracts;

use Modules\Invoice\Composites\Interfaces\NodeInterface;
use DOMDocument;
use DOMElement;
use DOMNode;

/**
 * Class NodeAbstract
 * @package Modules\Invoice\Composites\Abstracts
 * The base Component class declares an abstract for all concrete components,
 * both simple and complex. Still going to figure out what is needed for ALL nodes
 */
abstract class NodeAbstract implements NodeInterface {
    /**
     * @var array
     */
    protected $attributes;

    /**
     * @var string
     */
    protected $nodeName;
    /**
     * NodeAbstract constructor.
     * @param string $nodeName
     * @param array $attributes
     */
    public function __construct(string $nodeName, array $attributes) {
        $this->nodeName = $nodeName;
        $this->attributes = $attributes;
    }

    /**
     * @param DOMDocument $xml
     * @param DOMElement $parentNode
     * @return DOMDocument
     */
    abstract public function render(DOMDocument $xml, DOMElement $parentNode) : DOMDocument;

    /**
     * @param DOMDocument $xml
     * @param DOMElement $parentNode
     * @return DOMNode
     */
    protected function addChildNode(DOMDocument $xml, DOMElement $parentNode) : DOMNode {
        $node = $xml->createElement($this->nodeName);
        $childNode = $parentNode->insertBefore($node);

        $this->setAttributes($childNode, $this->attributes);

        return $childNode;
    }

    /**
     * @param $node
     * @param array $attributes
     */
    protected function setAttributes(&$node, array $attributes) : void {
        foreach ($attributes as $key => $val) {
            if (strlen($val) > 0) {
                $node->setAttribute($key,$val);
            }
        }
    }
}
