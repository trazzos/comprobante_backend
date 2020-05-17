<?php

namespace Modules\Invoice\Composites\Interfaces;
use DOMDocument;
use DOMElement;

interface NodeInterface {
    /**
     * @param DOMDocument $xml
     * @return DOMDocument
     * Each concrete predicate must provide its rendering implementation
     */
    public function render(DOMDocument $xml, DOMElement $parentNode) : DOMDocument;
}
