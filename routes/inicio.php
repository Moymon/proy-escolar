<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\inicioController;

Route::get('',[inicioController::class,'index']);
?>