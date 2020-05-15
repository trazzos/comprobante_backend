<?php

namespace Modules\Setting\Repositories\Implementation;
use App\Repositories\Implementation\BaseRepository;
use Modules\Setting\Models\InvoiceType;
use Modules\Setting\Repositories\Interfaces\InvoiceTypeRepositoryInterface;


/**
 * Class InvoiceTypeRepository
 * @package Modules\Setting\Repositories\Implementation
 */
class InvoiceTypeRepository extends BaseRepository implements InvoiceTypeRepositoryInterface {
    /**
     * @return string
     */
    public function model() : string {
        return InvoiceType::class;
    }
}
