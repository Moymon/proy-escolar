<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\alumno;

class alumnosController extends Controller
{
    //

    public function crud(Request $request){
        var_dump($request->input());
        if($request->has('create')){
            $this->insert($request);
            //echo "create";
        }elseif ($request->has('read')) {
            // code...
            $this->select_var1($request);
        }elseif ($request->has('update')) {
            //echo "edit";
            $this->update($request);
        }
    }

    public function insert(Request $request){
        $alumno = new alumno();
        $alumno->id_alumno = $request->id_alumno;

        //$alumno->save();
        DB::insert('insert into ' . $alumno->getTable() . ' (id_alumno, cve_unica, nombre, nombres, paterno, materno, conducta, calle, num_ext, num_int, colonia, codigo_postal, ciudad, estado, curp, correo_uaslp, correo_alterno, telefono, celular, genero, fecha_nace, secundaria, cve_prepa, nss, archivo_nss, fecha_registro_nss) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',[$alumno->id_alumno,'null','null','null','null','null','null','null','null','null','null','null','null','null','null','null','null','null','null','null','05/05/2023','null','null','null','null','05/05/2023']);

    }

    public function select_var1(Request $request){
        $alumno = new alumno();
        $alumno->id_alumno = $request->id_alumno;
        $datos_alumno = DB::table($alumno->getTable())->select('id_alumno')->where('id_alumno',$alumno->id_alumno)->get();
        var_dump($datos_alumno);
    }

    public function update(Request $request){
        $alumno = new alumno();
        $alumno->cve_unica = $request->cve_unica;
        $alumno->conducta = $request->conducta;
        $alumno->calle = $request->calle;
        $alumno->num_ext = $request->num_ext;
        $alumno->num_int = $request->num_int;
        $alumno->colonia = $request->colonia;
        $alumno->codigo_postal = $request->codigo_postal;
        $alumno->ciudad = $request->ciudad;
        $alumno->estado = $request->estado;
        $alumno->correo_uaslp = $request->correo_uaslp;
        $alumno->correo_alterno = $request->correo_alterno;
        $alumno->telefono = $request->telefono;
        $alumno->celular = $request->celular;

        DB::table($alumno->getTable())->where('cve_unica',$alumno->cve_unica)
        ->update(['nombre' => $alumno->nombre,
                  'nombres' => $alumno->nombres,
                  'paterno' => $alumno->paterno,
                  'materno' => $alumno->materno]);
    }
}
