<?php 

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\menu\sidebar;

    Route::get('',[sidebar::class,'procedimientos_archivos_constancias']);
?>