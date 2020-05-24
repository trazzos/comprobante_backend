<?php

namespace Modules\Invoice\Composites\Interfaces;
use DOMDocument;
use DOMElement;

interface NodeGroupInterface {
    /**
     * @param DOMDocument $xml
     * @return DOMDocument
     * Each concrete predicate must provide its rendering implementation
     */
    public function render(DOMDocument $xml, DOMElement$parentNode) : DOMDocument;
}
