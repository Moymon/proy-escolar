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
    public function getFechas(Request $request){
        $request->validate([
            'ciclo_escolar' => 'required',
            'periodo' => 'required',
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
            return response()->json([
                'error' => 'Consulta fallida',
            ]);
        }

        $data = ExamenLic::whereBetween('fecha', [$fechaInicio, $fechaFin])->where('periodo', $request->periodo)->get('fecha');

        $response = [
            'periodo' => $request->periodo,
            'data' => $data,
        ];
        
        return response()->json($response);
    }

    public function getExamenes(Request $request){
        $request->validate([
            'fechaForExam' => 'required',
            'periodoForExam' => 'required'
        ]);
        
        $data = DB::table('examen_lic')
            ->join('cat_materia', 'examen_lic.cve_materia', '=', 'cat_materia.cve_materia')
            ->join('sinodal_ase_lic', 'examen_lic.folio_ase_lic', '=', 'sinodal_ase_lic.folio_ase_lic')
            ->where('fecha', $request->fechaForExam)
            ->where('periodo', $request->periodoForExam)
            ->get();

            $response = [
                'data' => $data,
            ];
            
            return response()->json($response);
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
            ]);
        }
    
        $datosAGuardar = []; // Array para almacenar los datos a guardar
    
        foreach ($calificacionesArray as $calificacion) {
            $clave = $calificacion['clave'];
            $valorCalificacion = $calificacion['calificacion'];
    
            $alumno = Alumno::where('cve_unica', $clave)->first();
            if ($alumno == null) {
                return response()->json([
                    'error' => 'Datos erróneos de consulta',
                ]);
            }
    
            $kardex = Kardex::where('id_alumno', $alumno->id_alumno)
                ->where('cve_materia', $claveCampo)
                ->first();
            if ($kardex == null) {
                return response()->json([
                    'error' => 'Datos erróneos de consulta',
                ]);
            }

            $datosAGuardar[] = [
                'kardex' => $kardex,
                'valorCalificacion' => $valorCalificacion,
            ];
        }
    
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
