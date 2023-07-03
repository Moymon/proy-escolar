<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\menu\sidebar;
use App\Http\Controllers\authwp;
use App\Http\Controllers\usuarios\usuariosController;
use App\Http\Controllers\administracion\datosGenerales;
use App\Http\Controllers\rolesypermisos\roles_permisos;
use App\Http\Controllers\archivos\pdfController;

use App\Http\Controllers\modelosPruebaCapExReg\ExamenEjemplo;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});*/

//Auth::routes();

/*Login chafa*/
Route::post('/login_wp',[authwp::class,'login_without_password']);

/*Otras rutas*/
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/Inicio', [App\Http\Controllers\HomeController::class, 'inicio'])->name('Inicio');

Route::post('/crudAlumno',[App\Http\Controllers\alumnosController::class,'crud']);

/* Rutas Alumnos*/
/*Route::get('/al_lic',[sidebar::class,'alumnos_licenciatura']);
Route::get('/al_pos',[sidebar::class,'alumnos_posgrado']);*/


/*Rutas para el kardex*/
//Route::get('/index_kardex',[sidebar::class,'kardex']);

/*Rutas para examenes*/
/*Route::get('/ex_re',[sidebar::class,'examenes_regularizacion']);
Route::get('/ex_t',[sidebar::class,'examenes_titulo']);
Route::get('/list_ex',[sidebar::class,'listado_examenes']);
Route::get('/fechas_et_er',[sidebar::class,'fechas_et_er']);*/

/*Rutas de administracion*/
//Route::get('/usuarios',[sidebar::class,'usuarios']);
//Route::resource('/catalogo-usuarios',usuariosController::class)->names('catalogo.usuarios');

/*Permisos de rutas para el administrador*/
Route::group(['middleware' => ['auth', 'role:Administrador',]] , function(){
    /*Permisos de solo lectura*/
    Route::group(['middleware' => ['permission:administrador.read']], function(){
        /*Rutas de administracion*/
        Route::get('/roles',[roles_permisos::class,'index_r']);
        Route::get('/permisos',[roles_permisos::class,'index_p']);
        Route::get('/administracion-index',[datosGenerales::class,'index']);
        Route::get('/usuarios',[sidebar::class,'usuarios']);
        /*Rutas de examenes*/
        Route::get('/ex_re',[sidebar::class,'examenes_regularizacion']);
        Route::get('/ex_t',[sidebar::class,'examenes_titulo']);
        Route::get('/list_ex',[sidebar::class,'listado_examenes']);
        Route::get('/fechas_et_er',[sidebar::class,'fechas_et_er']);
        Route::get('/ordenes_pago',[sidebar::class,'ordenes_pago']);
        Route::get('/cap_ex_reg',[sidebar::class,'captura_ex_reg']);
        /*Rutas para el kardex*/
        Route::get('/index_kardex_lic',[sidebar::class,'kardex_lic']);
        Route::get('/verificacion_kardex_lic',[sidebar::class,'verificacion_lic']);
        Route::get('/index_kardex_pos',[sidebar::class,'kardex_pos']);
        /* Rutas Alumnos*/
        Route::get('/al_lic',[sidebar::class,'alumnos_licenciatura']);
        Route::get('/al_pos',[sidebar::class,'alumnos_posgrado']);
    });
    /*Permisos de editar*/
    Route::group(['middleware' => ['permission:administrador.edit']], function(){
        Route::get('/roles-edit/{id}',[roles_permisos::class,'edit']);
        Route::get('/administracion-edit/{id}',[datosGenerales::class,'edit']);
    });
    /*Permisos de crear*/
    Route::group(['middleware' => ['permission:administrador.create']], function(){
        Route::post('/roles-create',[roles_permisos::class,'create_r']);
        Route::post('/permisos-create',[roles_permisos::class,'create_p']);
    });
    /*Permisos de actualizar*/
    Route::group(['middleware' => ['permission:administrador.update']], function(){
        Route::post('/roles/update/{id}',[roles_permisos::class,'update']);
        Route::post('/administracion-update/{id}',[datosGenerales::class,'update']);
    });
    /*Permisos de todo*/
    Route::group(['middleware' => ['permission:administrador.create|administrador.read|administrador.update']], function(){
        Route::resource('/catalogo-usuarios',usuariosController::class)->names('catalogo.usuarios');
    });



    /*Ejemplos obtencion de fechas y materias*/
    Route::post('/get-dataCapturaCalificaciones',[ExamenEjemplo::class,'getTipoConsulta'])->name('getTipoConsulta');
    Route::post('/get-calificaciones',[ExamenEjemplo::class,'getCalificaciones'])->name('getCalificaciones');

    /*Ejemplo crear pdf*/
    
    Route::post('/crearPDF-kardexPosgrado',[pdfController::class,'pdfKardexPosgrado']);


});

//Route::get('/roles',[roles_permisos::class,'index_r']);
//Route::post('/roles-create',[roles_permisos::class,'create_r']);
//Route::get('/roles-edit/{id}',[roles_permisos::class,'edit']);
//Route::post('/roles/update/{id}',[roles_permisos::class,'update']);

//Route::get('/permisos',[roles_permisos::class,'index_p']);
//Route::post('/permisos-create',[roles_permisos::class,'create_p']);

//Route::get('/administracion-index',[datosGenerales::class,'index']);
//Route::get('/administracion-edit/{id}',[datosGenerales::class,'edit']);
//Route::post('/administracion-update/{id}',[datosGenerales::class,'update']);


/*------------*/
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

/*Cerrar session*/
Route::post('/cerrarsesion',[authwp::class,'logout']);

