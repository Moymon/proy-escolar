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
        

        $users = User::all();
        //$pdf = SnappyPdf::loadView('pdf.kardexPosgrado', compact($datosAlumno));
        $pdf = SnappyPdf::loadView('pdf.kardexPosgrado', [
            'datosAlumno' => $datosAlumno,
            'users' => $users,
        ]);

        /*
        $options = [
            'page-size' => 'EXECUTIVE',
            'orientation' => 'landscape',
            'margin-top' => 20
        ];
        */
        
        //$pdf->setOptions($options);

        //$pdf->setOption('margin-top', 10);
        //$pdf->setOption('page-size', 'A4');
        //$pdf->setOption('page-width', '500');
        //$pdf->setOption('page-height', '300');
        //$pdf->setOption('orientation', 'landscape');
        //return $pdf->inline('kardex.pdf');

        $pdf->setOption('zoom', '0.8'); // Establece el nivel de zoom al mínimo
        $pdf->setOption('viewport-size', '1920x1080'); // Establece el tamaño de la vista del contenido
        $pdf->setPaper('letter', 'portrait');

        //$pdf->setOption('orientation','Landspace');
        
        //return $pdf->stream('kardex.pdf');
        //return $pdf->download('kardex.pdf');
        return response($pdf->output(), 200)
        ->header('Content-Type', 'application/pdf');
    }
}
