<?php

namespace Modules\Invoice\Composites\Interfaces;
use DOMDocument;

interface NodeLeafInterface {
    /**
     * @param DOMDocument $xml
     * @return DOMDocument
     * Each concrete predicate must provide its rendering implementation
     */
    public function render(DOMDocument $xml, $parentNode) : DOMDocument;
}
