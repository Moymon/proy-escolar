<?php

namespace App\Http\Controllers\archivos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use PDF;

class pdfController extends Controller
{
    //

    public function pdfKardexPosgrado(){
        $pdf = \PDF::loadView('pdf');
        $path = storage_path('pdfs');
        $pdf->save($path.'/'.'ejemplo1.pdf');
        return $pdf->download('ejemplo1.pdf');
    }
}
