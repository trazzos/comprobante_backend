<?php

namespace Modules\Label\Services;

use App\Services\Abstracts\CrudPatchAbstract;
use Illuminate\Database\Eloquent\Model;
use Modules\Label\Models\Label;
use Modules\Label\Repositories\Interfaces\LabelRepositoryInterface;
use Modules\User\Models\User;

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
     * @return Model|Label|null
     */
    public function update(User $user, array $data) : ?Label {
        $label = parent::update($user, $data);
        $label->load('invoiceType');
        $label->load('branch');
        return $label;
    }
}
