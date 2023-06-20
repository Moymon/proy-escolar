<?php

namespace App\Http\Controllers\modelosPruebaCapExReg;

use App\Models\modelosPruebaCapExReg\ExamenLic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
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
            // Maneja un número de período inválido o desconocido
            // Puedes lanzar una excepción, redireccionar o mostrar un mensaje de error
            // según la lógica de tu aplicación
        }

        // Continúa con el procesamiento de los datos recibidos del formulario
        // ...

        // Ejemplo de uso de las fechas obtenidas
        // Puedes almacenarlas en una base de datos, realizar cálculos, etc.
        // Aquí simplemente las mostramos como ejemplo
        //echo "Fecha de inicio: " . $fechaInicio . "<br>";
        //echo "Fecha de fin: " . $fechaFin;

        if($request->tipoConsulta == "fecha"){
            $data = $this->getFechas($fechaInicio, $fechaFin, $request->periodo);
        }else if("examen"){
            $data = $this->getExamenes($fechaInicio, $fechaFin, $request->periodo);
        }

        $response = [
            'fecha' => $request,
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
}
