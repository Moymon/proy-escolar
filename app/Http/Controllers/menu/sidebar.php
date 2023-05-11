<?php

namespace App\Http\Controllers\menu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class sidebar extends Controller
{
    //
    /*Rutas para Examenes ET y ET*/
    public function examenes_regularizacion(){
        return view('examenes_et_er.examenesregularizacion');
    }
    
    /*Rutas para Procedimientos*/
    public function procedimientos_archivos_constancias(){
        return view('procedimientos.menuprincipal');
    }


}
