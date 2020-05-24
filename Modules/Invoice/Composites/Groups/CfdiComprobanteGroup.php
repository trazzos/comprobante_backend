<?php
namespace Modules\Invoice\Composites\Groups;

use DOMDocument;
use DOMElement;
use Modules\Invoice\Composites\Abstracts\NodeGroupAbstract;

/**
 * Class CfdiComprobanteGroup
 * @package Modules\Search\Composites\Groups
 */
class CfdiComprobanteGroup extends NodeGroupAbstract {
    /**
     * @param DOMDocument $xml
     * @param null $parentNode (this is the root element and parentNode is null at this point)
     * @return DOMDocument
     * Can't use the addChildNode as the parentNode os a DOMDocument not a DOMElement
     */
    public function render(DOMDocument $xml, $parentNode): DOMDocument {
        $node = $xml->createElement("cfdi:Comprobante");
        $childNode = $xml->insertBefore($node);
        $this->addDefaultAttributes($node);

        $this->setAttributes($childNode, $this->attributes);
        return parent::render($xml, $childNode);
    }

    private function addDefaultAttributes(DOMElement $node) {
        $node->setAttribute("xmlns:cfdi", "http://www.sat.gob.mx/cfd");
        $node->setAttribute("xmlns:cfdi", "http://www.sat.gob.mx/cfd/3");
        $node->setAttribute("xmlns:xsi", "http://www.w3.org/2001/XMLSchema-instance");

        //There are certain attributes that are only added if the "module" exists.
        //Like this one is only added is the ish tax is > 0
        //$this->node->setAttribute("xmlns:implocal", "http://www.sat.gob.mx/implocal");
    }
}
