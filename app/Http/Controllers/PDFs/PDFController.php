<?php

namespace App\Http\Controllers\PDFs;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Barryvdh\Snappy\Facades\SnappyPdf;

class PDFController extends Controller
{
    function imprimeKardex(Request $request){
        $datosAlumno = json_decode($request->datosAlumno, true);
        $datosSemestre = json_decode($request->datosSemestre, true);
        $datosCalificaciones = json_decode($request->datosCalificaciones, true);

        $pdf = SnappyPdf::loadView('pdf.kardexPosgrado', [
            'datosAlumno' => $datosAlumno,
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
