<?php
namespace Modules\Invoice\Composites\Leaves;

use DOMDocument;
use Modules\Invoice\Composites\Abstracts\NodeLeafAbstract;

/**
 * Class FilterVideoAudioOnlyBooleanEqualsLeaf
 * @package Modules\Search\Composites\Filters
 */
class CfdiEmisorLeaf extends NodeLeafAbstract {
    /**
     * @param DOMDocument $xml
     * @return mixed|UncategorizedCriteria
     */
    public function render(DOMDocument $xml, $parentNode): DOMDocument {
        $node = $xml->createElement("cfdi:Emisor");
        $parentNode->insertBefore($node);

        $attributes = array(
            "Rfc" => 'a',
            "Nombre"=> 'b',
            "RegimenFiscal" => 'c'
        );

        $this->setAttributes($node, $attributes);

        return $xml;
    }
}
