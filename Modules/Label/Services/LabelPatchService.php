<?php

namespace Modules\Label\Services;

use App\Services\Abstracts\CrudPatchAbstract;
use Modules\Label\Models\Label;
use Modules\Label\Repositories\Interfaces\LabelRepositoryInterface;

/**
 * Class LabelPatchService
 * @package Modules\Label\Services
 */
class LabelPatchService extends CrudPatchAbstract {
    /**
     * LabelPatchService constructor.
     * @param LabelRepositoryInterface $labelRepo
     */
    public function __construct(LabelRepositoryInterface $labelRepo) {
        $this->repo = $labelRepo;
    }

    /**
     * @param array $data
     * @return Label|null
     * An example of overriding the method, if you don't need to "load" anything else you don't
     * need to override it
     */
    public function update(array $data) : ?Label {
        $label = parent::update($data);
        return $label->load('invoiceType');
    }
}
