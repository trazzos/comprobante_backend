<?php

namespace Modules\Invoice\Services;

use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Invoice\Models\Invoice;
use Modules\Invoice\Repositories\Interfaces\InvoiceRepositoryInterface;
use ThrowException;
use Filter;
use Sort;

/**
 * Class InvoiceGetService
 * @package Modules\Invoice\Services
 */
class InvoiceGetService {
    /**
     * @var InvoiceRepositoryInterface
     */
    private $invoiceRepo;

    /**
     * InvoiceGetService constructor.
     * @param InvoiceRepositoryInterface $invoiceRepo
     */
    public function __construct(InvoiceRepositoryInterface $invoiceRepo) {
        $this->invoiceRepo = $invoiceRepo;
    }

    /**
     * @param $id
     * @return Invoice|null
    * At this point everything is validated, we shouldn't check anything else
     */
    public function info($id) : ?Invoice {
        $invoice = $this->invoiceRepo->findBy('id', $id);

        if(!$invoice) {
            ThrowException::notFound();
        }

        return $invoice;
    }

    /**
     * @param array $data
     * @return LengthAwarePaginator|null
     */
    public function list(array $data) : ?LengthAwarePaginator {
        if(isset($data['predicates'])) {
            Filter::apply(__NAMESPACE__, $this->invoiceRepo, $data['predicates']);
        }

        if(isset($data['sorts'])) {
            Sort::apply(__NAMESPACE__, $this->invoiceRepo, $data['sorts']);
        }

        $invoices = $this->invoiceRepo->paginate($data['per_page']);
        $this->invoiceRepo->resetRepository(); 

        return $invoices;
    }

}
