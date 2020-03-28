<?php

namespace Modules\Project\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\Project as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Project
{
    use Notifiable;

    /**
     * The attributes that are protected.
     *
     * @var array
     * No queremos que el campo id pueda ser cambiado por lo que lo agregamos al arreglo de guarded
     */
    protected $guarded = [
        'id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'start_date' => 'datetime', 'end_date' => 'datetime',
    ];
}
