<?php

namespace Modules\Invoice\Services;

use Modules\Invoice\Models\Invoice;
use Modules\Invoice\Repositories\Interfaces\InvoiceRepositoryInterface;

/**
 * Class InvoiceDeleteService
 * @package Modules\Invoice\Services
 */
class InvoiceDeleteService {
    /**
     * @var InvoiceRepositoryInterface
     */
    private $invoiceRepo;

    /**
     * InvoiceDeleteService constructor.
     * @param InvoiceRepositoryInterface $invoiceRepo
     */
    public function __construct(InvoiceRepositoryInterface $invoiceRepo) {
        $this->invoiceRepo = $invoiceRepo;
    }

    /**
     * @param $id
     * @return false|true
     */
    public function delete($id): ? bool {
        return $this->invoiceRepo->delete($id);
    }
}
