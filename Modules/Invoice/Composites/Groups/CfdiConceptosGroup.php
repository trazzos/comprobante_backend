<?php
namespace Modules\Invoice\Composites\Groups;

use DOMDocument;
use Modules\Invoice\Composites\Abstracts\NodeGroupAbstract;

/**
 * Class CfdiConceptosGroup
 * @package Modules\Search\Composites\Filters
 */
class CfdiConceptosGroup extends NodeGroupAbstract {
    /**
     * @param DOMDocument $xml
     * @return DOMDocument
     */
    public function render(DOMDocument $xml, $parentNode): DOMDocument {
        $node = $xml->createElement("cfdi:Conceptos");
        $childNode = $parentNode->insertBefore($node);

        $xml = parent::render($xml, $childNode);
        return $xml;
    }
}
