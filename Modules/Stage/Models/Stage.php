<?php

namespace Modules\Stage\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Task\Models\Task;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;

class Stage extends Model
{
    use SoftDeletes, SoftCascadeTrait;
    /*
     * @var array this define which relations is delete on cascade
     */
    protected $softCascade = ['task'];
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'stage';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $hidden = [];

    public function task(){
        return $this->hasMany(Task::class);

    }


}
