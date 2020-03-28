<?php

namespace Modules\Invoice\Repositories\Implementation;
use App\Repositories\Implementation\BaseRepository;
use Modules\Invoice\Models\Invoice;
use Modules\Invoice\Repositories\Interfaces\InvoiceRepositoryInterface;


/**
 * Class InvoiceRepository
 * @package Modules\Invoice\Repositories\Implementation
 */
class InvoiceRepository extends BaseRepository implements InvoiceRepositoryInterface {
    /**
     * @return string
     */
    public function model() : string {
        return Invoice::class;
    }
}