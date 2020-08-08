<?php

namespace Modules\Branch\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Branch
 * @package Modules\Branch\Models
 */
class Branch extends Model {
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'branch';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'company_id', 'zip_code', 'user_id'];

    public function company() {
        return $this->belongsTo('\Modules\Company\Models\Company');
    }
    public function label() {
        return $this->hasMany('\Modules\Label\Models\Label');
    }

}
