<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\menu\sidebar;
use App\Http\Controllers\authwp;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/Inicio', [App\Http\Controllers\HomeController::class, 'inicio'])->name('Inicio');

Route::post('/crudAlumno',[App\Http\Controllers\alumnosController::class,'crud']);

/* Rutas ALumno*/
Route::get('/al_lic',[sidebar::class,'alumnos_licenciatura']);
Route::get('/al_pos',[sidebar::class,'alumnos_posgrado']);


/*Rutas para el kardex*/
Route::get('/index_kardex',[sidebar::class,'kardex']);

/*Rutas para examenes*/
Route::get('/ex_re',[sidebar::class,'examenes_regularizacion']);
Route::get('/ex_t',[sidebar::class,'examenes_titulo']);
Route::get('/list_ex',[sidebar::class,'listado_examenes']);
Route::get('/fechas_et_er',[sidebar::class,'fechas_et_er']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


/*Login chafa*/
Route::post('/login_wp',[authwp::class,'login_without_password']);