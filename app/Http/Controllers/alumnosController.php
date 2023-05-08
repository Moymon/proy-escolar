<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\alumno;

class alumnosController extends Controller
{
    //
    public function insert(Request $request){
        $alumno = new alumno();
        $alumno->id_alumno = $request->id_alumno;

        //$alumno->save();
        DB::insert('insert into ' . $alumno->getTable() . ' (id_alumno, cve_unica, nombre, nombres, paterno, materno, conducta, calle, num_ext, num_int, colonia, codigo_postal, ciudad, estado, curp, correo_uaslp, correo_alterno, telefono, celular, genero, fecha_nace, secundaria, cve_prepa, nss, archivo_nss, fecha_registro_nss) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',[$alumno->id_alumno,'null','null','null','null','null','null','null','null','null','null','null','null','null','null','null','null','null','null','null','05/05/2023','null','null','null','null','05/05/2023']);
    }
}
