<?php
namespace Modules\Invoice\Composites\Groups;

use DOMDocument;
use Modules\Invoice\Composites\Abstracts\NodeGroupAbstract;

/**
 * Class CfdiConceptoGroup
 * @package Modules\Search\Composites\Filters
 */
class CfdiConceptoGroup extends NodeGroupAbstract {
    /**
     * @param DOMDocument $xml
     * @return DOMDocument
     */
    public function render(DOMDocument $xml, $parentNode): DOMDocument {
        $node = $xml->createElement("cfdi:Concepto");
        $childNode = $parentNode->insertBefore($node);

        //$node = $xml->appendChild($node);

        $attributes = array(
            "Cantidad" => '1.00',
        );

        $this->setAttributes($childNode, $attributes);
        $xml = parent::render($xml, $childNode);
        return $xml;
    }
}
