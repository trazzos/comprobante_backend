<?php

namespace Modules\Task\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Stage\Models\Stage;

class Task extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'task';

    /**
     * The attributes that are mass assignable.
     *a los
     * @var array
     */
    protected $guarded = [];

    protected $hidden = [];

    public function stage(){
        return $this->belongsTo(Stage::class)
;    }
}
