<?php
namespace Modules\Invoice\Composites\Groups;

use DOMDocument;
use DOMElement;
use Modules\Invoice\Composites\Abstracts\NodeGroupAbstract;

/**
 * Class CfdiImpuestosGroup
 * @package Modules\Search\Composites\Groups
 */
class CfdiImpuestosGroup extends NodeGroupAbstract {
    /**
     * @param DOMDocument $xml
     * @param DOMElement $parentNode
     * @return DOMDocument
     */
    public function render(DOMDocument $xml, DOMElement $parentNode): DOMDocument {
        $childNode = $this->addChildNode($xml, $parentNode);
        return parent::render($xml, $childNode);
    }
}
