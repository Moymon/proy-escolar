<?php

namespace App\Http\Controllers\menu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class sidebar extends Controller
{
    /**Licenciatura-------------------------------------------------------**/
    
        /*Alumnos*/
        public function alumnos_licenciatura(){
            return view('licenciatura.alumnos.alumnos-licenciatura');
        }

        /*Kardex*/
        public function kardex_lic(){
            return view('licenciatura.kardex.kardex-impresion-licenciatura');
        }

        public function verificacion_lic(){
            return view('licenciatura.kardex.kardex-verificacion-licenciatura');
        }

        /*Examenes*/
        public function examenes_regularizacion(){
        return view('licenciatura.examenes.examenesregularizacion_lic');
        }

        public function examenes_titulo()
        {
            return view('licenciatura.examenes.examenestitulo_lic');
        }

        public function listado_examenes(){
            return view('licenciatura.examenes.listadoexamenes_lic');
        }

        public function fechas_et_er(){
            return view('licenciatura.examenes.fechaseter_lic');
        }

        public function ordenes_pago()
        {
            return view('licenciatura.examenes.ordenes_lic');
        }

        public function captura_ex_reg(){ //****** */
            return view('licenciatura.examenes.captura_ex_reg_lic');
        }

        /*Rutas para Procedimientos-------------------------------------------------------------*/
        public function procedimientos_archivos_constancias(){
            return view('licenciatura.procedimientos.menuprincipal');
        }
    
    /*Posgrado-------------------------------------------------------------*/
    
        /*Alumnos----------------------------------------------------------*/
        public function alumnos_posgrado(){
            return view('posgrado.alumnos.alumnos_posgrado');
        }

        /*kardex*/
        public function kardex_pos(){
            return view('posgrado.kardex.kardex-impresion-posgrado');
        }

    /*Adminsitracion-------------------------------------------------------*/
    

    

    //
    /*Rutas para Kardex---------------------------------------------------------------------*/
    

    

    //
    /*------------------Rutas para Examenes ET y ET-------------------------------------------*/
    
    
    

    /*Rutas para Administracion-------------------------------------------------------------*/
    /*Funcion Index que mostrara los usuarios*/
    public function usuarios(){
        return view('administracion.usuarios-index');
    }




}
