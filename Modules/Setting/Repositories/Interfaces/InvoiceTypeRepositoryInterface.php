<?php
namespace Modules\Setting\Repositories\Interfaces;

use App\Repositories\Interfaces\RepositoryInterface;

/**
 * Interface InvoiceTypeRepositoryInterface
 * @package Modules\Setting\Repositories\Interfaces
 */
interface InvoiceTypeRepositoryInterface extends RepositoryInterface {
    /**
     * @return mixed
     */
    public function model();
}
