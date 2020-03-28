<?php
namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class ThrowException extends Facade {
    protected static function getFacadeAccessor() { return 'ThrowException'; }
}