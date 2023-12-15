<?php

namespace App\Http\Controllers\PDFs;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Barryvdh\Snappy\Facades\SnappyPdf;


class PDFController extends Controller
{

    public function imprimeKardex(Request $request)
    {
        $datos = json_decode($request->getContent(), true);


        $datosSemestre = $datos['semestres'];

        $datosAlumnos = [
            'clave' => $datos['clave'],
            'nombre' => $datos['nombre'],
            'grado' => $datos['grado'],
            'opcion' => $datos['opcion'],
        ];

        $datosCalificaciones = [
            'prom_gnral' => $datos['prom_gnral'],
            'prom_gnral_apro' => $datos['prom_gnral_apro'],
            'total_cre_apro' => $datos['total_cre_apro'],
        ];

        $pdf = SnappyPdf::loadView('pdf.kardexPosgrado', [
            'datosAlumno' => $datosAlumnos,
            'datosSemestre' => $datosSemestre,
            'datosCalificaciones' => $datosCalificaciones
        ]);

        $pdf->setOption('zoom', '0.8');
        $pdf->setOption('viewport-size', '1920x1080');
        $pdf->setPaper('letter', 'portrait');

        return response($pdf->output(), 200)
        ->header('Content-Type', 'application/pdf');
    }

}


