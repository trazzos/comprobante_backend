<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestaController extends Controller {
    public function testa() {
        echo "testa";
        exit;
        return response()->json('testa');
    }
}