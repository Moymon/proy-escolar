<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
    <link href="<?php echo e(public_path('css/bootstrap.css')); ?>" rel="stylesheet">

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
                <img class="w-100 h-100" src="<?php echo e(public_path('img/logoinfocomp.png')); ?>" alt="">
            </div>

            <div id="Titulo" class="h-100 centrar" style="width:715px;">
                <div class="p-1">
                    <h4 class="m-0 p-0 text-center">
                        <span class="fw-bold">CENTRO DE INVESTIGACION Y ESTUDIOS DE POSGRADO</span><br>
                        FACULTAD DE INGENIERIA <br>
                        Universidad Autónoma de San Luis Potosí
                    </h4>
                </div>
            </div>

            <div id="logoCIEP" class="h-100" style="width:150px;">
                <img class="w-100 h-100" src="<?php echo e(public_path('img/logoCIEP.png')); ?>" alt="">
            </div>
        </div>
    </header>

    <hr class="mt-1" style="color:black;">

    <div class="w-100 mb-3">
        <div class="centrarStart w-100" style="height: 150px;">
            <div id="logoInfoComp" class="h-100" style="width:140px;margin-right:50px;">
                <img class="w-100 h-100" style="background-color:lightgray;" src="<?php echo e(public_path('img/usuario.svg')); ?>" alt="">
            </div>

            <div class="h-100" style="width:855px;">
                <table id="informacionAlumno" class="tableEdit tableSinBorde" style="border-color:white!important;">

                    <?php $__currentLoopData = $datosAlumno; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $campo => $valor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td style="text-transform: uppercase;"><?php echo e($campo); ?>:</td>
                            <td class="infoTableAlumno"><?php echo e($valor); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </div>

        </div>
    </div>

    <?php $__currentLoopData = $datosSemestre; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $semestre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="w-100 mb-3">
            <?php if($loop->first): ?>
                <div class="h-100 border" style="width:100%;border-color:black!important;">
                    <p class="m-0 my-1 p-0 text-center">Plan Semestral</p>
                    <table class="w-100 text-center">
                        <?php $__currentLoopData = $semestre; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $campo => $valor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($campo == 'semestre'): ?>
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
                                        <td colspan="6">Semestre: <?php echo e($valor); ?></td>
                                    </tr>
                                </thead>
                            <?php else: ?>
                                <tbody class="mb-5">
                                    <?php $__currentLoopData = $valor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item => $valorItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <?php $i = 1; ?>
                                        <?php $__currentLoopData = $valorItem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $celda): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($i == 2): ?>
                                                <td style="text-align: left;padding-left:10px;"><?php echo e($celda); ?></td>
                                            <?php else: ?>
                                                <td><?php echo e($celda); ?></td>
                                            <?php endif; ?>
                                            <?php $i++; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>
            <?php else: ?>
                <div class="h-100 w-100">
                    <table class="w-100 text-center">
                        <?php $__currentLoopData = $semestre; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $campo => $valor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($campo == 'semestre'): ?>
                                <thead>
                                    <tr class="bgHeadTable p-0 m-0" style="visibility: hidden">
                                        <th class="columnaTipo4"></th>
                                        <th class="columnaTipo1"></th>
                                        <th class="columnaTipo2"></th>
                                        <th class="columnaTipo3"></th>
                                        <th class="columnaTipo2"></th>
                                        <th class="columnaTipo3"></th>
                                    </tr>
                                    <tr class="bgSubHeadTable">
                                        <td colspan="6">Semestre: <?php echo e($valor); ?></td>
                                    </tr>
                                </thead>
                            <?php else: ?>
                                <tbody>
                                    <?php $__currentLoopData = $valor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item => $valorItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <?php $i = 1; ?>
                                        <?php $__currentLoopData = $valorItem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $celda): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($i == 2): ?>
                                                <td style="text-align: left;padding-left:10px;"><?php echo e($celda); ?></td>
                                            <?php else: ?>
                                                <td><?php echo e($celda); ?></td>
                                            <?php endif; ?>
                                            <?php $i++; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <div class="w-100 mb-1">
        <div class="w-100">
            <div class="h-100" style="width:100%;">
                <table class="w-100 text-center">
                    <thead class="bgHeadTable">
                        <?php $__currentLoopData = $datosCalificaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $campo => $valor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th style="text-align:right;padding-right:10px;"><?php echo e($campo); ?>: <?php echo e($valor); ?></th>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </thead>
                </table>
            </div>
        </div>
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
    <div class="w-100" style="width:100px;">
        <p class="text-center">
            <span class="fw-bold">Dr. Gilberto Mejía Rodríguez</span><br>
            COORDINADOR DEL POSGRADO
        </p>
    </div>
    
</body>
</html><?php /**PATH C:\Users\Alberto\Documents\GitHub\proy-escolar2\resources\views/pdf/kardexPosgrado.blade.php ENDPATH**/ ?>