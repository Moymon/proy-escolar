
<?php $__env->startSection('plugins.Datatables',true); ?>
<?php $__env->startSection('title', 'Permisos'); ?>

<?php $__env->startSection('content_header'); ?>
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-6">
            <h1>Permisos del sistema</h1>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-12 d-flex justify-content-end">
                <button class="btn btn-info" data-toggle="modal" data-target="#nuevoPermiso"><i class="fas fa-plus"></i></button>
            </div>
        </div>
        <br>
        <h3 align="center">Permisos Generales</h3>
        <table id="tabla_permisos" class="table table-bordered table-striped dataTable dtr-inline">
            
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>

                <?php $__currentLoopData = $permisos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permiso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($permiso->id); ?></td>
                        <td><?php echo e($permiso->name); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <br>
        <br>
        <h3 align="center">Permisos Catalogados</h3>
        <table id="tabla_permisos" class="table table-bordered table-striped dataTable dtr-inline">
            
            <thead>
                <tr>
                    <th>Catalogo</th>
                    <th>Permiso</th>
                    <th>ID</th>
                    <th>Descripcion</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $modulos_permisos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modulo_permiso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($modulo_permiso->nombre); ?></td>
                        <td><?php echo e($modulo_permiso->name); ?></td>
                        <td><?php echo e($modulo_permiso->id); ?></td>
                        <td><?php echo e($modulo_permiso->descripcion); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>

<!-----Modal Nuevo permiso------>
<div class="modal fade" id="nuevoPermiso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nuevo Permiso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="/permisos-create">
                            <?php echo csrf_field(); ?>
                            <div class="form-group"> 
                                <div class="d-flex justify-content-center row">
                                    <div class="col-4">
                                        <label class="col-form-label">Nombre</label>
                                        <input class="form-control" type="text" name="nombre_permiso" required>
                                    </div>
                                    <div class="col-4">
                                        <label class="col-form-label">Modulo</label>
                                        <select class="form-control form-select" name="id_modulo" required>
                                            <?php $__currentLoopData = $modulos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modulo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($modulo->id_modulo); ?>"><?php echo e($modulo->nombre); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="d-flex justify-content-center row">
                                    <label>Descripcion del permiso:</label>
                                    <div class="col-12">
                                        <textarea class="form-control" name="descripcion" required></textarea>
                                    </div>
                                </div>
                                <br>
                                <div class="d-flex justify-content-end row">
                                    <div class="">
                                        <div class="col-3">
                                            <button class="btn btn-primary" type="submit">Crear</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <div></div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
 $(document).ready(function (){
        $('.table').DataTable({
            language:{
                "emptyTable" : "No hay información",
                "info"       : "Mostrando _START_ a _END_ de _TOTAL_ registros",
                "lengthMenu" : "Mostrar _MENU_ resultados",
                "search"     : "Buscar",
                "zeroRecords": "Resultados no encontrados",
                "paginate":{
                    "first"  :"Primero",
                    "last"   :"Ultimo",
                    "next"   :"Siguiente",
                    "previous":"Anterior"
                }
            },
            "autoWidth":false,
        });
    });    
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Alberto\Documents\GitHub\proy-escolar2\resources\views/administracion/roles_permisos/permisos-index.blade.php ENDPATH**/ ?>