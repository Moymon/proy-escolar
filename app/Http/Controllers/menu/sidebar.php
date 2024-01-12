<?php

namespace App\Http\Controllers\menu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class sidebar extends Controller
{
    /**Licenciatura-------------------------------------------------------**/
    
        /*Alumnos*/
        public function alumnos_licenciatura(){
            $url_img_perfil = 'storage/assets/imagenes/perfil.png';
            return view('licenciatura.alumnos.alumnos-licenciatura',compact('url_img_perfil'));
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
            $url_img_perfil = 'storage/assets/imagenes/perfil.png';
            return view('posgrado.alumnos.alumnos_posgrado',compact('url_img_perfil'));
        }

        /*kardex************************************************************/
        public function kardex_pos(){
            $url_img_perfil = 'storage/assets/imagenes/perfil.png';
            return view('posgrado.kardex.kardex-impresion-posgrado',compact('url_img_perfil'));
        }

        public function verificacion_pos()
        {
            $url_img_perfil = 'storage/assets/imagenes/perfil.png';
            return view('posgrado.kardex.kardex-verificacion-posgrado',compact('url_img_perfil'));
        }

    

    /*Rutas para Administracion-------------------------------------------------------------*/
    /*Funcion Index que mostrara los usuarios*/
    public function usuarios(){
        $roles = Role::all();
        return view('administracion.usuarios-index',compact('roles'));
    }

    /* profile*/
    public function profile(){
        return view('administracion.profile');
    }

}
