<?php
namespace Modules\Invoice\Composites\Groups;

use DOMDocument;
use Modules\Invoice\Composites\Abstracts\NodeGroupAbstract;
use DOMElement;

/**
 * Class CfdiConceptoGroup
 * @package Modules\Search\Composites\Groups
 */
class CfdiConceptoGroup extends NodeGroupAbstract {
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
