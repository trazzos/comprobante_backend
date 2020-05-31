<?php

namespace Modules\Setting\Services;

use Modules\Setting\Repositories\Interfaces\InvoiceTypeRepositoryInterface;
use Illuminate\Support\Collection;
/**
 * Class InvoiceTypeGetService
 * @package Modules\Setting\Services
 */
class InvoiceTypeGetService {
    /**
     * @var InvoiceTypeRepositoryInterface $invoiceTypeRepo
     */
    private InvoiceTypeRepositoryInterface $invoiceTypeRepo;

    /**
     * InvoiceTypeGetService constructor.
     * * @param InvoiceTypeRepositoryInterface $invoiceTypeRepo
     */
    public function __construct(InvoiceTypeRepositoryInterface $invoiceTypeRepo) {
        $this->invoiceTypeRepo = $invoiceTypeRepo;
    }
    /**
     * @return Collection|null
     */
    public function list() : ?Collection {
        return $this->invoiceTypeRepo->all();
    }
}
