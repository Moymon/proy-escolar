<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<?php if(session('status')): ?>
    <div class="mb-4 font-medium text-sm text-green-600">
        <?php echo e(session('status')); ?>

    </div>
<?php endif; ?>
<?php if($errors->any()): ?>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="alert alert-danger alert-dismissible default_cursor_cs">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
            <i class="icon fas fa-user-slash" > Alerta </i>
            <?php echo e($error); ?>

        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<br>
<br>
<br>
<div class="container-fluid" style="">
    <div class="row">
        <div class="col-6"></div>
        <div class="col-4">
            <div class="card primary">
                <div class="card-header">
                    Sistema de información de la Facultad de Ingeniería
                </div>
                <form method="POST" action="/login_wp">
                    <?php echo csrf_field(); ?>
                <div class="card-body">
                    
                        <div class="row">
                            <div class="d-flex justify-content-center input-group">
                                    <div class="col-3" >
                                        <span class="form-control input-group-text">RPE</span>
                                    </div>
                                    <div class="col-3">
                                        <input class="form-control" type="number" name="rpe" placeholder="123456" required>
                                    </div>                
                            </div>
                        </div>

                        <div class="row">
                            <div class="d-flex justify-content-center input-group">
                                <div class="col-3">
                                    <span class="form-control input-group-text">Contraseña</span>
                                </div>
                                <div class="col-3">
                                    <input class="form-control" type="password" name="password" placeholder="******" required>
                                </div>
                            </div>
                        </div>
                    
                </div>
                <div class="card-footer">
                    <div align="right">
                        <button class="btn btn-primary" type="submit">Iniciar Sesion</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>    
</div><?php /**PATH C:\Users\Alberto\Documents\GitHub\proy-escolar2\resources\views/auth/login.blade.php ENDPATH**/ ?>