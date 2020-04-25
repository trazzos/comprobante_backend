<?php
namespace Modules\Invoice\Composites\Groups;

use DOMDocument;
use Modules\Invoice\Composites\Abstracts\NodeGroupAbstract;

/**
 * Class CfdiComprobanteGroup
 * @package Modules\Search\Composites\Filters
 */
class CfdiComprobanteGroup extends NodeGroupAbstract {
    /**
     * @param DOMDocument $xml
     * @return DOMDocument
     */
    public function render(DOMDocument $xml, $parentNode): DOMDocument {
        $node = $xml->createElement("cfdi:Comprobante");
        $childNode = $xml->insertBefore($node);
        $xml = parent::render($xml, $childNode);

        return $xml;
    }
}
