<?php

namespace Modules\Label\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Label
 * @package Modules\Label\Models
 */
class Label extends Model {
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'label';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function invoiceType() {
        return $this->belongsTo('\Modules\Setting\Models\InvoiceType');
    }
    public function branch() {
        return $this->belongsTo('\Modules\Branch\Models\Branch');
    }

}
