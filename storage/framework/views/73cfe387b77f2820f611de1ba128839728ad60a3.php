
<?php $__env->startSection('title', 'Panel de Administracion'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Panel de Administracion</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <p>Welcome to this beautiful admin panel.</p>
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Hola mundo</h1>
        </div>
        <div class="card-body">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
    </div>


<form action="/crudAlumno" method="POST">
    <?php echo csrf_field(); ?> 
        <div  class="card text-center">
                <input type="text" name="id_alumno">
        </div>
        <div class="card">
            <div class="card-body">
                <input type="text" name="nombre" placeholder="nombre">
                <input type="text" name="nombres" placeholder="nombres">
                <input type="text" name="paterno" placeholder="paterno">
                <input type="text" name="materno" placeholder="materno">
            </div>
        </div>
        <div class="card-footer">
                <button class="btn btn-outline-primary" name="create" type="submit">Guardar</button>
                <button class="btn btn-outline-primary" name="read" type="submit">Buscar</button>
                <button class="btn btn-outline-primary" name="update" type="submit">Editar</button>
        </div>
</form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="/css/admin_custom.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script> console.log('Hi!'); </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\inetpub\wwwroot\escolar_v01\resources\views/index.blade.php ENDPATH**/ ?>