<?php
namespace Modules\Invoice\Composites\Leaves;

use DOMDocument;
use Modules\Invoice\Composites\Abstracts\NodeLeafAbstract;

/**
 * Class FilterVideoAudioOnlyBooleanEqualsLeaf
 * @package Modules\Search\Composites\Filters
 */
class CfdiTrasladoLeaf extends NodeLeafAbstract {
    /**
     * @param DOMDocument $xml
     * @return mixed|UncategorizedCriteria
     */
    public function render(DOMDocument $xml, $parentNode): DOMDocument {
        //$criteria = $this->criteriaObject();
        return $xml;
        //return $criteria->apply($query, $this->filterPayloadMapper->repository);
    }
}
