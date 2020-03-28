<?php

namespace Modules\Action\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Action extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'action';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $hidden = [];

    /**
     * The attributes that are convert.
     *
     * @var array
     */
    protected $casts = [
      'accepted_extension' => 'array',
    ];
}
