<?php

namespace Modules\Invoice\Services;

use Modules\Invoice\Models\Invoice;
use Modules\Invoice\Repositories\Interfaces\InvoiceRepositoryInterface;
use Modules\User\Models\User;

/**
 * Class InvoiceCreateService
 * @package Modules\Invoice\Services
 */
class InvoiceCreateService {
    /**
     * @var XmlCreateService
     */
    private $xmlCreateService;

    /**
     * InvoiceCreateService constructor.
     * @param XmlCreateService $xmlCreateService
     */
    public function __construct(XmlCreateService $xmlCreateService) {
        $this->xmlCreateService = $xmlCreateService;
    }

    /**
     * @param User $user
     * @param array $nodes
     * @return Invoice|null
     */
    public function create(User $user, array $nodes) : ?Invoice {
        $xml = $this->xmlCreateService->createXml($user, $nodes);
        echo $xml->saveXML();
        return null;
        //return $this->invoiceRepo->create($data);
    }
}
