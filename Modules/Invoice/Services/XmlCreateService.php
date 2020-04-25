<?php

namespace Modules\Invoice\Services;

use Modules\Invoice\Composites\Groups\CfdiInvoiceGroup;
use Modules\Invoice\Composites\Interfaces\NodeGroupInterface;
use Modules\Invoice\Composites\Interfaces\NodeInterface;
use Modules\Invoice\Models\Invoice;
use Modules\Invoice\Repositories\Interfaces\InvoiceRepositoryInterface;
use Modules\User\Models\User;
use DOMDocument;
use RecursiveArrayIterator;

/**
 * Class XmlParseService
 * @package Modules\Invoice\Services
 */
class XmlCreateService {
    /**
     * @var NodeClassMapperService
     */
    private $nodeClassMapperService;

    /**
     * @param NodeClassMapperService $nodeClassMapperService
     * XmlParseService constructor.
     */
    public function __construct(NodeClassMapperService $nodeClassMapperService) {
        $this->nodeClassMapperService = $nodeClassMapperService;
    }

    /**
     * @param User $user
     * @param array $nodes
     * @return Invoice|null
     */
    public function createXml(User $user, array $nodes) : ?DOMDocument {
        $xml = $this->getRootXml();

        if(isset($nodes)) {
            $nodeGroup = $this->nodeClassMapperService->groupClassMapper('cfdiComprobante', $nodes['cfdiComprobante']['children']);
            $nodesGroup = $this->filterLoop($nodeGroup, $nodes['cfdiComprobante']['children']);
            echo get_class($nodesGroup);
            $xml = $nodesGroup->render($xml, $xml->parentNode);
        }

        return $xml;
    }

    /**
     * @param NodeGroupInterface $nodeGroup
     * @param array $nodes
     * @return NodeInterface
     * If the predicate has a logic_gate, we need to create a group
     * Else it means is a leaf and we add it to the current group
     */
    private function filterLoop(?NodeGroupInterface $nodeGroup, array $nodes) : ?NodeInterface {
        foreach($nodes as $key => $node) {
            if(isset($node['children'])) {
                //echo get_class($nodeGroup);
                //if(!$nodeGroup) {
                    //$nodeGroup = $this->nodeClassMapperService->groupClassMapper($key, $node);
                //}
                //print_r(get_class($nodeGroup));
                echo PHP_EOL;
                //print_r($key);
                //print_r($node['children']);
                $recursiveNodeGroup = $this->nodeClassMapperService->groupClassMapper($key, $node);
                //print_r(get_class($recursiveNodeGroup));
                echo PHP_EOL;
                $nodeGroup->add($recursiveNodeGroup);
                /*echo 'composite '. $key;
                echo PHP_EOL;
                print_r($node['attributes'] ?? null);
                echo PHP_EOL;*/
                $this->filterLoop($recursiveNodeGroup, $node['children']);

            } else {
                /*echo 'leaf '. $key;
                echo PHP_EOL;
                print_r($node);
                echo PHP_EOL;*/
                $nodeLeaf = $this->nodeClassMapperService->leafClassMapper($key, $node);
                //echo get_class($nodeLeaf);
                echo PHP_EOL;
                $nodeGroup->add($nodeLeaf);
            }
        }
        echo PHP_EOL;
        //exit;

        return $nodeGroup;
    }

    //TODO move to service
    private function getRootXml() : DOMDocument {
        $dom = new DOMDocument();
        $dom->encoding = 'utf-8';
        $dom->xmlVersion = '1.0';
        $dom->formatOutput = true;

        return $dom;
    }
}
