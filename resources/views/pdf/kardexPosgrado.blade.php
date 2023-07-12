<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
    <link href="{{ public_path('css/bootstrap.css') }}" rel="stylesheet">

    <style>
        @font-face {
            font-family: 'Open Sans', sans-serif;
            src: url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500;1,600&display=swap') format('truetype');
        }
        body{
            font-size: 23px;
        }
        table, p{
            font-size: 20px;
        }
        tr, td{
            font-size: 18px;
        }
    </style>

    <style>
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
    </style>

    <style>
        .tableSinBorde{
            border: none!important;
            border-collapse: collapse;
        }
        .tableSinBorde td, tr {
            border: none;
        }

        .bgHeadTable{
            background-color: rgb(0, 74, 152);
            color:white;
            border-color: black!important;
        }

        .bgSubHeadTable{
            background-color: rgb(0, 178, 227);
            color:white;
            border-color: black!important;
        }

        .infoTableAlumno {
            font-weight: bold;
            padding-left: 10px;
        }


        .columnaTipo1{
            width:45%;
        }
        .columnaTipo2{
            width:15%;
        }
        .columnaTipo3{
            width:10%;
        }
        .columnaTipo4{
            width:5%!important;
        }
    </style>
</head>
<body class="contenedor">
    <hr class="mb-1" style="color:black;">
    <header class="w-100">
        <div class="centrarBetween w-100" style="height: 150px;">
            
            <div id="logoInfoComp" class="h-100" style="width:140px;">
                <img class="w-100 h-100" src="{{public_path('img/logoinfocomp.png')}}" alt="">
            </div>

            <div id="Titulo" class="h-100 centrar" style="width:715px;">
                <div class="p-1">
                    <h4 class="m-0 p-0 text-center">
                        <span class="fw-bold">CENTRO DE INVESTIGACION Y ESTUDIOS DE POSGRADO</span><br>
                        FACULTAD DE INGENIERIA <br>
                        Universidad Autonoma de San Luis Potosi
                    </h4>
                </div>
            </div>

            <div id="logoCIEP" class="h-100" style="width:150px;">
                <img class="w-100 h-100" src="{{public_path('img/logoCIEP.png')}}" alt="">
            </div>
        </div>
    </header>

    <hr class="mt-1" style="color:black;">

    <div class="w-100 mb-3">
        <div class="centrarStart w-100" style="height: 150px;">
            <div id="logoInfoComp" class="h-100" style="width:140px;margin-right:50px;">
                <img class="w-100 h-100" style="background-color:lightgray;" src="{{public_path('img/usuario.svg')}}" alt="">
            </div>

            <div class="h-100" style="width:855px;">
                <table id="informacionAlumno" class="tableEdit tableSinBorde" style="border-color:white!important;">

                    @foreach ($datosAlumno as $campo => $valor)
                        <tr>
                            <td style="text-transform: uppercase;">{{ $campo }}:</td>
                            <td class="infoTableAlumno">{{ $valor }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>

        </div>
    </div>

    <div class="w-100 mb-3">
        <div class="centrarStart w-100">
            <div class="h-100" style="width:100%;">
                <div class="w-100 border" style="border-color:black!important;">
                    <p class="m-0 my-1 p-0 text-center">Plan Semestral</p>
                    <table class="w-100 text-center">
                        <thead>
                          <tr class="bgHeadTable">
                            <th class="columnaTipo4">No.</th>
                            <th class="columnaTipo1">MATERIA</th>
                            <th class="columnaTipo2">TIPO</th>
                            <th class="columnaTipo3">CALIF.</th>
                            <th class="columnaTipo2">FECHA</th>
                            <th class="columnaTipo3">CRED.</th>
                          </tr>
                          <tr class="bgSubHeadTable">
                            <td colspan="6">Semestre: 2016-2017/ll</td>
                            </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td style="text-align: left;">Metodos de Optimizacion</td>
                            <td>Complemen.</td>
                            <td>7.5</td>
                            <td>22-06-2017</td>
                            <td>8</td>
                          </tr>
                          <tr>
                            <td class="">2</td>
                            <td style="text-align: left;">Procesos de Manufactura Avanzados (CAM)</td>
                            <td>Complemen.</td>
                            <td>7.5</td>
                            <td>22-06-2017</td>
                            <td>8</td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td style="text-align: left;">Seminario l</td>
                            <td>Seminario</td>
                            <td>10</td>
                            <td>22-06-2017</td>
                            <td>1</td>
                          </tr>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>

    <div class="w-100 mb-3">
        <div class="w-100">
            <div class="h-100" style="width:100%;">
                <table class="w-100 text-center">
                    <thead>
                        <tr class="bgSubHeadTable">
                            <td colspan="6">Semestre: 2017-2018/l</td>
                        </tr>
                      </thead>
                    <tbody>
                      <tr>
                        <td class="columnaTipo4">4</td>
                        <td class="columnaTipo1" style="text-align: left;">Mecanica de Solidos Avanzada</td>
                        <td class="columnaTipo2">Complemen.</td>
                        <td class="columnaTipo3">8.0</td>
                        <td class="columnaTipo2">23-01-2018</td>
                        <td class="columnaTipo3">8</td>
                      </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="w-100 mb-3">
        <div class="w-100">
            <div class="h-100" style="width:100%;">
                <table class="w-100 text-center">
                    <thead>
                        <tr class="bgSubHeadTable">
                            <td colspan="6">Semestre: 2017-2018/ll</td>
                        </tr>
                      </thead>
                    <tbody>
                      <tr>
                        <td class="columnaTipo4">5</td>
                        <td class="columnaTipo1" style="text-align: left;">Seminario ll</td>
                        <td class="columnaTipo2">Seminario</td>
                        <td class="columnaTipo3">10.0</td>
                        <td class="columnaTipo2">22-06-2016</td>
                        <td class="columnaTipo3">1</td>
                      </tr>
                      <tr>
                        <td>6</td>
                        <td style="text-align: left;">Tecnicas Experminetales Avanzadas</td>
                        <td>Complemen.</td>
                        <td>9.0</td>
                        <td>22-06-2018</td>
                        <td>8</td>
                      </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="w-100 mb-3">
        <div class="w-100">
            <div class="h-100" style="width:100%;">
                <table class="w-100 text-center">
                    <thead>
                        <tr class="bgSubHeadTable">
                            <td colspan="6">Semestre: 2019-2020/ll</td>
                        </tr>
                      </thead>
                    <tbody>
                      <tr>
                        <td class="columnaTipo4">7</td>
                        <td class="columnaTipo1" style="text-align: left;">Caracterizacion de Materiales</td>
                        <td class="columnaTipo2">Movilidad</td>
                        <td class="columnaTipo3">8.5</td>
                        <td class="columnaTipo2">10-07-2020</td>
                        <td class="columnaTipo3">6</td>
                      </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="w-100 mb-1">
        <div class="w-100">
            <div class="h-100" style="width:100%;">
                <table class="w-100 text-center">
                    <thead class="bgHeadTable">
                        <tr>
                          <th style="text-align:right;">Promedio General: 8.57</th>
                        </tr>
                        <tr>
                            <th style="text-align:right;">Promedio General Aprobatorio: 8.57</th>
                        </tr>
                        <tr>
                          <th style="text-align:right;">Total Creditos Aprobados: 40</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <div class="w-100" style="margin-bottom:200px;">
        <p class="m-0 p-0">
            INSTITUCION OTORGANTE DE BECA: <span class="fw-bold">CONACYT </span> REGISTRO: <span class="fw-bold">263123</span><br>
            TEMA DE TESIS: <span class="fw-bold">Diseño optimo de componentes con materiales porosos</span><br>
            ASESOR: <span class="fw-bold">De Lange Dirk Frederik </span>
        </p>
    </div>

    <div class="w-100 centrar">
        <div style="width:200px;border-bottom:1px solid black;">

        </div>
    </div>
    <div class="w-100" style="width:100px;">
        <p class="text-center">
            <span class="fw-bold">Dr. Gilberto Majia Rodriguez</span><br>
            COORDINADOR DEL POSGRADO
        </p>
    </div>
    
</body>
</html>