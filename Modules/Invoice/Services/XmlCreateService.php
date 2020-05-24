<?php

namespace Modules\Invoice\Services;

use Modules\Invoice\Composites\Interfaces\NodeGroupInterface;
use Modules\Invoice\Composites\Interfaces\NodeInterface;
use Modules\Invoice\Models\Invoice;
use Modules\User\Models\User;
use DOMDocument;

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
            $nodeGroup = $this->nodeClassMapperService->groupClassMapper('cfdi:Comprobante', $nodes['cfdi:Comprobante']['attributes'] ?? []);
            $nodesGroup = $this->filterLoop($nodeGroup, $nodes['cfdi:Comprobante']['children']);
            $xml = $nodesGroup->render($xml, null);
        }

        return $xml;
    }

    /**
     * @param NodeGroupInterface $nodeGroup
     * @param array $nodes
     * @return null|NodeInterface
     * If the predicate has a logic_gate, we need to create a group
     * Else it means is a leaf and we add it to the current group
     */
    private function filterLoop(?NodeGroupInterface $nodeGroup, array $nodes) : ?NodeInterface {
        foreach($nodes as $key => $node) {
            if(isset($node['children'])) {
                //if(!$nodeGroup) {
                    //$nodeGroup = $this->nodeClassMapperService->groupClassMapper($key, $node);
                //}
                $recursiveNodeGroup = $this->nodeClassMapperService->groupClassMapper($key, $node['attributes'] ?? []);
                $nodeGroup->add($recursiveNodeGroup);
                $this->filterLoop($recursiveNodeGroup, $node['children']);

            } else {
                $nodeLeaf = $this->nodeClassMapperService->leafClassMapper($key, $node['attributes'] ?? []);
                $nodeGroup->add($nodeLeaf);
            }
        }

        return $nodeGroup;
    }

    /**
     * @return DOMDocument
     */
    private function getRootXml() : DOMDocument {
        $dom = new DOMDocument();
        $dom->encoding = 'utf-8';
        $dom->xmlVersion = '1.0';
        $dom->formatOutput = true;

        return $dom;
    }
}
