<?php

namespace Modules\Invoice\Services;

use Modules\Invoice\Models\Invoice;
use Modules\Invoice\Repositories\Interfaces\InvoiceRepositoryInterface;

/**
 * Class InvoiceCreateService
 * @package Modules\Invoice\Services
 */
class InvoiceCreateService {
    /**
     * @var InvoiceRepositoryInterface
     */
    private $invoiceRepo;

    /**
     * InvoiceCreateService constructor.
     * @param InvoiceRepositoryInterface $invoiceRepo
     */
    public function __construct(InvoiceRepositoryInterface $invoiceRepo) {
        $this->invoiceRepo = $invoiceRepo;
    }

    /**
     * @param array $data
     * @return Invoice|null
     */
    public function create(array $data) : ?Invoice {
        return $this->invoiceRepo->create($data);
    }
}
