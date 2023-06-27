<?php

namespace App\Http\Controllers\modelosPruebaCapExReg;

use App\Models\modelosPruebaCapExReg\ExamenLic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\alumno;
use App\Models\modelosPruebaCapExReg\Kardex;
use Illuminate\Support\Facades\Response;

class ExamenEjemplo extends Controller
{
    public function getTipoConsulta(Request $request){
        //dd($request);
        $request->validate([
            'ciclo_escolar' => 'required',
            'periodo' => 'required',
            'tipoConsulta' => 'required',
        ]);

        // Obtén el valor de ciclo_escolar del formulario
        $cicloEscolar = $request->input('ciclo_escolar');

        // Divide el valor de ciclo_escolar en año y número de período
        $partes = explode('/', $cicloEscolar);
        $anio = $partes[0];
        $partesAnio = explode(" - ", $anio);
        $anio = $partesAnio[0];
        $numeroPeriodo = $partes[1];
        // Determina las fechas de inicio y fin para cada período
        if ($numeroPeriodo === '1') {
            $fechaInicio = $anio.'-01-01';
            $fechaFin = $anio.'-06-30';
        } elseif ($numeroPeriodo === '2') {
            $fechaInicio = $anio.'-07-01';
            $fechaFin = $anio.'-12-31';
        } else {
            return view('examenes_et_er.captura_ex_reg')->with('advertenciaFechas', 'Datos erroneos de consulta');
        }

        if($request->tipoConsulta == "fecha"){
            $data = $this->getFechas($fechaInicio, $fechaFin, $request->periodo);
        }else if($request->tipoConsulta == "examen"){
            $data = $this->getExamenes($fechaInicio, $fechaFin, $request->periodo);
        }else{
            return response()->json([
                'error' => 'Consulta fallida',
            ], 400);
        }

        $response = [
            //'fecha' => $request,
            'data' => $data,
        ];
        
        return response()->json($response);
    }

    public function getFechas($periodo1, $periodo2, $periodo)
    {
        $data = ExamenLic::whereBetween('fecha', [$periodo1, $periodo2])->where('periodo', $periodo)->get('fecha');

        return $data;
    }

    public function getExamenes($periodo1, $periodo2, $periodo){
        //$data = ExamenLic::whereBetween('fecha', [$request->periodo1, $request->periodo2])->get();

        $data = DB::table('examen_lic')
            ->join('cat_materia', 'examen_lic.cve_materia', '=', 'cat_materia.cve_materia')
            ->join('sinodal_ase_lic', 'examen_lic.folio_ase_lic', '=', 'sinodal_ase_lic.folio_ase_lic')
            ->whereBetween('fecha', [$periodo1, $periodo2])
            ->where('periodo', $periodo)
            ->get();

        //dd($data);
        return $data;
    }




    public function getCalificaciones(Request $request){
        $data = DB::table('alumno')
            ->join('kardex_lic', 'alumno.id_alumno', '=', 'kardex_lic.id_alumno')
            ->join('cat_materia', 'kardex_lic.cve_materia', '=', 'cat_materia.cve_materia')
            ->where('kardex_lic.cve_materia', $request->claveCampo)
            ->get();

        $response = [
            'claveCampo_materia' => $request->claveCampo,
            'nombreCampo_materia' => $request->materiaCampo,
            'data' => $data,
        ];
        
        return response()->json($response);
    }

    public function updateCalificaciones(Request $request)
    {
        $claveCampo = $request->claveCampo;
        $materiaCampo = $request->materiaCampo;
    
        $calificacionesArray = json_decode($request->datosCalificaciones, true);
    
        if (!is_array($calificacionesArray)) {
            return response()->json([
                'error' => 'Datos de calificaciones incorrectos',
            ], 400);
        }
    
        $datosAGuardar = []; // Array para almacenar los datos a guardar
    
        // Accede a cada elemento de datosCalificaciones y almacena los datos en $datosAGuardar
        foreach ($calificacionesArray as $calificacion) {
            $clave = $calificacion['clave'];
            $valorCalificacion = $calificacion['calificacion'];
    
            $alumno = Alumno::where('cve_unica', $clave)->first();
            if ($alumno == null) {
                return response()->json([
                    'error' => 'Datos erróneos de consulta',
                ], 400);
            }
    
            $kardex = Kardex::where('id_alumno', $alumno->id_alumno)
                ->where('cve_materia', $claveCampo)
                ->first();
            if ($kardex == null) {
                return response()->json([
                    'error' => 'Datos erróneos de consulta',
                ], 400);
            }
    
            // Almacena los datos en $datosAGuardar en lugar de guardarlos directamente
            $datosAGuardar[] = [
                'kardex' => $kardex,
                'valorCalificacion' => $valorCalificacion,
            ];
        }
    
        // Realiza las operaciones de guardado para todos los datos en $datosAGuardar
        foreach ($datosAGuardar as $datos) {
            $kardex = $datos['kardex'];
            $valorCalificacion = $datos['valorCalificacion'];
    
            $kardex->calificacion = $valorCalificacion;
            $kardex->save();
        }
    
        $data = DB::table('alumno')
            ->join('kardex_lic', 'alumno.id_alumno', '=', 'kardex_lic.id_alumno')
            ->join('cat_materia', 'kardex_lic.cve_materia', '=', 'cat_materia.cve_materia')
            ->where('kardex_lic.cve_materia', $request->claveCampo)
            ->get();
    
        $response = [
            'claveCampo_materia' => $request->claveCampo,
            'nombreCampo_materia' => $request->materiaCampo,
            'data' => $data,
        ];
    
        return response()->json($response);
    }
}
