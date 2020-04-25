<?php
namespace Modules\Invoice\Composites\Groups;

use DOMDocument;
use Modules\Invoice\Composites\Abstracts\NodeGroupAbstract;

/**
 * Class CfdiTrasladosGroup
 * @package Modules\Search\Composites\Filters
 */
class CfdiTrasladosGroup extends NodeGroupAbstract {
    /**
     * @param DOMDocument $xml
     * @return DOMDocument
     */
    public function render(DOMDocument $xml, $parentNode): DOMDocument {
        //$criteria = $this->criteriaObject();
        return $xml;
        //return $criteria->apply($query, $this->filterPayloadMapper->repository);
    }
}
