<?php

namespace App\Http\Controllers\menu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class sidebar extends Controller
{
    //
    public function procedimientos_archivos_constancias(){
        return view('procedimientos.menuprincipal');
    }
}
