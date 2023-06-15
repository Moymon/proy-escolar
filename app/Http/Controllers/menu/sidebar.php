<?php

namespace App\Http\Controllers\menu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class sidebar extends Controller
{

    /*Alumnos-------------------------------------------------------------------------------*/
    public function alumnos_licenciatura(){
        return view('alumnos.alumnos_licenciatura');
    }

    public function alumnos_posgrado(){
        return view('alumnos.alumnos_posgrado');
    }

    //
    /*Rutas para Kardex---------------------------------------------------------------------*/
    public function kardex_lic(){
        return view('kardex.kardex-index-lic');
    }

    public function verificacion_lic(){
        return view('kardex.kardex-verificacion-lic');
    }

    //
    /*------------------Rutas para Examenes ET y ET-------------------------------------------*/
    public function examenes_regularizacion(){
        return view('examenes_et_er.examenesregularizacion');
    }

    public function examenes_titulo()
    {
        return view('examenes_et_er.examenestitulo');
    }

    public function listado_examenes(){
        return view('examenes_et_er.listadoexamenes');
    }

    public function fechas_et_er(){
        return view('examenes_et_er.fechaseter');
    }

    public function ordenes_pago()
    {
        return view('examenes_et_er.ordenes');
    }
    
    /*Rutas para Procedimientos-------------------------------------------------------------*/
    public function procedimientos_archivos_constancias(){
        return view('procedimientos.menuprincipal');
    }

    /*Rutas para Administracion-------------------------------------------------------------*/
    /*Funcion Index que mostrara los usuarios*/
    public function usuarios(){
        return view('administracion.usuarios-index');
    }
}
