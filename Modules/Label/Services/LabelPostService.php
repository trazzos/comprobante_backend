<?php

namespace Modules\Label\Services;

use App\Services\Abstracts\CrudPostAbstract;
use Illuminate\Database\Eloquent\Model;
use Modules\Label\Models\Label;
use Modules\Label\Repositories\Interfaces\LabelRepositoryInterface;
use Modules\User\Models\User;

/**
 * Class LabelPostService
 * @package Modules\Label\Services
 */
class LabelPostService extends CrudPostAbstract {
    /**
     * LabelPostService constructor.
     * @param LabelRepositoryInterface $labelRepo
     */
    public function __construct(LabelRepositoryInterface $labelRepo) {
        $this->repo = $labelRepo;
    }

    /**
     * @param array $data
     * @return Model|Label|null
     */
    public function create(User $user, array $data) : ?Label {
        $label = parent::create($user, $data);
        $label->load('invoiceType');
        $label->load('branch');
        return $label;
    }
}
