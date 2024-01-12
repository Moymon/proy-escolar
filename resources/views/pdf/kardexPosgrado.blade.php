<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
    <link href="{{ public_path('css/bootstrap.css') }}" rel="stylesheet">

    <style>
        /*Funciones de etiqueta*/
        @font-face {
            font-family: 'Open Sans', sans-serif;
        }
        body{
            font-family: 'Open Sans', sans-serif;
            font-size: 23px;
        }
        table, p{
            font-size: 20px;
        }
        tr, td{
            font-size: 18px;
        }
        hr{
            color:black;
        }
        .tableSemestre, .tableSemestre th, .tableSemestre td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        /*Funciones de posicion*/
        .contenedor {
	        max-width: 1000px!important;
	        margin: 0 auto;
        }

        .centrarBetween{
            display: -webkit-box; /* wkhtmltopdf uses this one */
            display: flex;
            -webkit-box-pack: center; /* wkhtmltopdf uses this one */
            justify-content: space-between;
            flex-direction: row;
        }

        .centrarStart{
            display: -webkit-box; /* wkhtmltopdf uses this one */
            display: flex;
            -webkit-box-pack: center; /* wkhtmltopdf uses this one */
            justify-content: start;
            flex-direction: row;
        }
        
        .centrar{
            display: -webkit-box; /* wkhtmltopdf uses this one */
            -webkit-box-pack: center; /* wkhtmltopdf uses this one */

            display: -webkit-flex;
            -webkit-justify-content: center;
            -webkit-box-align: center;
        }

        /*Funciones de estilo*/
        .bgHeadTable{
            background-color: rgb(0, 74, 152);
            /*rgb(0, 178, 227);*/
            color:white;
            border-color:black;
        }

        .bgSubHeadTable{
            background-color: rgb(0, 178, 227);
            color:white;
            border-color:black;
        }
    </style>
</head>
<body class="contenedor">

    <header class="w-100">
        <hr class="mb-1">
        <div class="centrarBetween w-100" style="height: 150px;">
            <img class="h-100" src="{{public_path('img/logoinfocomp.png')}}" width="140px">

            <div class="h-100 centrar" style="width:715px;">
                <h4 class="m-0 p-1 text-center">
                    <span class="fw-bold">CENTRO DE INVESTIGACION Y ESTUDIOS DE POSGRADO</span><br>
                    FACULTAD DE INGENIERIA <br>
                    Universidad Autónoma de San Luis Potosí
                </h4>
            </div>

            <img class="h-100" src="{{public_path('img/logoCIEP.png')}}" width="150px">
        </div>
        <hr class="mt-1">
    </header>

    <div class="centrarStart w-100 mb-3" style="height: 150px;">
        <div class="h-100 me-5">
            <img class="h-100" src="{{public_path('img/perfil.png')}}" width="140px">
        </div>

        <div class="h-100 w-100">
            <table style="border-color:white!important;">

                @foreach ($datosAlumno as $campo => $valor)
                    <tr>
                        <td class="text-uppercase">{{ $campo }}:</td>
                        <td class="fw-bold ps-2">{{ $valor }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>



    @foreach($datosSemestre as $index => $semestre)
        <table class="w-100 text-center tableSemestre">
            <thead>
                @if($index === 0) 
                    <tr>
                        <td colspan="6">
                            <p class="m-0 my-1 p-0 text-center">Plan Semestral</p>
                        </td>
                    </tr>
                    <tr class="bgHeadTable">
                        <th>No.</th>
                        <th>MATERIA</th>
                        <th>TIPO</th>
                        <th>CALIF.</th>
                        <th>FECHA</th>
                        <th>CRED.</th>
                    </tr>
                @else
                    <tr class="bgHeadTable" style="visibility:hidden;">
                        <th>No.</th>
                        <th>MATERIA</th>
                        <th>TIPO</th>
                        <th>CALIF.</th>
                        <th>FECHA</th>
                        <th>CRED.</th>
                    </tr>
                @endif
                <tr class="bgSubHeadTable">
                    <td colspan="6">{{ $semestre['nombre'] }}</td>
                </tr>
            </thead>
            <tbody>
                @foreach($semestre['materias'] as $materia)
                    <tr>
                        <td>{{ $materia['numero'] }}</td>
                        <td class="text-start ps-2">{{ $materia['nombre'] }}</td>
                        <td>{{ $materia['tipo'] }}</td>
                        <td>{{ $materia['calificacion'] }}</td>
                        <td>{{ $materia['fecha'] }}</td>
                        <td>{{ $materia['creditos'] }}</td>
                    </tr>
                @endforeach
                @if($index === count($datosSemestre) - 1) <!-- Verifica si es la última tabla -->
                    <tr style="border:none;visibility:hidden;">
                        <td colspan="6">Semestre: {{ $semestre['nombre'] }}</td>
                    </tr>
                @endif
            </tbody>
        </table>
    @endforeach


    <div class="w-100 mb-1">
        <table class="text-end w-100 table-bordered">
            <thead class="bgHeadTable">
                @foreach ($datosCalificaciones as $campo => $valor)
                    <tr>
                        @if($campo == "prom_gnral")
                            <th class="pe-2">Promedio General: {{$valor}}</th>
                        @elseif($campo == "prom_gnral_apro")
                            <th class="pe-2">Promedio General Aprobatorio: {{$valor}}</th>
                        @elseif ($campo == "total_cre_apro")
                            <th class="pe-2">Total Créditos Aprobados: {{$valor}}</th>
                        @endif

                    </tr>
                @endforeach
            </thead>
        </table>
    </div>

    <div class="w-100" style="margin-bottom:200px;">
        <p class="m-0 p-0">
            INSTITUCION OTORGANTE DE BECA: <span class="fw-bold">CONACYT </span> REGISTRO: <span class="fw-bold">263123</span><br>
            TEMA DE TESIS: <span class="fw-bold">Diseño óptimo de componentes con materiales porosos</span><br>
            ASESOR: <span class="fw-bold">De Lange Dirk Frederik </span>
        </p>
    </div>

    <div class="w-100 centrar">
        <div style="width:200px;border-bottom:1px solid black;">

        </div>
    </div>

    <div class="w-100">
        <p class="text-center">
            <span class="fw-bold">Dr. Gilberto Mejía Rodríguez</span><br>
            COORDINADOR DEL POSGRADO
        </p>
    </div>
    
</body>
</html>