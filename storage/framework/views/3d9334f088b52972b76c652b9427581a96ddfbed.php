


<?php $__env->startSection('title', 'Kardex'); ?>

<?php $__env->startSection('content_header'); ?>
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-6">
            <h1>Credenciales del sistema</h1>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-body">
        <form method="post" action="/administracion-update/{$botton}">
            <?php echo csrf_field(); ?>

            <?php if($boton == 'edit'): ?>
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="d-flex justify-content-end col-12">
                        <a href="administracion-edit/<?php echo e($boton); ?>" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
                    </div>
                </div>
                <br>
            <?php endif; ?>

            <div class="row">
                <div class="col-3">
                    <label>Institucion</label>
                    <input class="form-control" type="text" name="institucion" value="<?php echo e($datosG->institucion); ?>" <?= $boton == 'edit' ? "disabled" : "" ?>  />
                </div>
                <div class="col-3">
                    <label>URL del Sitio</label>
                    <input class="form-control" type="text" name="url" value="<?php echo e($datosG->url); ?>" <?= $boton == 'edit' ? "disabled" : "" ?>>
                </div>
                <div class="col-3">
                    <label>Version de git</label>
                    <input class="form-control" type="text" name="version_git" value="<?php echo e($datosG->version_git); ?>" <?= $boton == 'edit' ? "disabled" : "" ?>>
                </div>
                <div class="col-3">
                    <label>Nombre de git</label>
                    <input class="form-control" type="text" name="nombre_version" value="<?php echo e($datosG->nombre_version); ?>" <?= $boton == 'edit' ? "disabled" : "" ?>>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-3">
                    <label>Correo</label>
                    <input class="form-control" type="email" name="correo" value="<?php echo e($datosG->correo); ?>" <?= $boton == 'edit' ? "disabled" : "" ?>>
                </div>
                <div class="col-3">
                    <label>Telefono</label>
                    <input class="form-control" type="number" name="telefono" value="<?php echo e($datosG->telefono); ?>" <?= $boton == 'edit' ? "disabled" : "" ?>>
                </div>
                <div class="col-3">
                    <label>ext</label>
                    <input class="form-control" type="number"  name="ext" value="<?php echo e($datosG->ext); ?>" <?= $boton == 'edit' ? "disabled" : "" ?>>
                </div>
                <div class="col-3">
                    <label>Clave Maestra</label>
                    <input class="form-control" type="password" name="master" value="soyunacontrasena" <?= $boton == 'edit' ? "disabled" : "" ?>>
                </div>
            </div>
            <br>

                <?php if($boton == 'update'): ?>
                <div class="row d-flex justify-content-end">
                    <div class="col-12">
                        
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
                
            <?php endif; ?>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <div></div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('modalAlumnos', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Alberto\Documents\GitHub\proy-escolar2\resources\views/administracion/datos-generales.blade.php ENDPATH**/ ?>