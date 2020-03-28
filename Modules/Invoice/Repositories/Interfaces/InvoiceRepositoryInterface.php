<?php
namespace Modules\Invoice\Repositories\Interfaces;

use App\Repositories\Interfaces\RepositoryInterface;

/**
 * Interface InvoiceRepositoryInterface
 * @package Modules\Invoice\Repositories\Interfaces
 */
interface InvoiceRepositoryInterface extends RepositoryInterface {
    /**
     * @return mixed
     */
    public function model();
}