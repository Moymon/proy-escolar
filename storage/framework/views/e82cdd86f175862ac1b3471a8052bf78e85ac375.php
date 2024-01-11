

<?php $__env->startSection('title', 'profile'); ?>

<?php $__env->startSection('content_header'); ?>
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-6">
            <h1>Perfil de Usuario</h1>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-3">
        <div class="card card-primary card-outline default_cursor_cs">
            <div class="card-body box-profile default_cursor_cs">
                <div class="text-center default_cursor_cs">
                    <img class="profile-user-img img-fluid img-circle default_cursor_cs" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">
                </div>
                <h3 class="profile-username text-center default_cursor_cs"><?php echo e(Auth::user()->nombre); ?></h3>
                <p class="text-muted text-center default_cursor_cs">Software Engineer</p>
                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item default_cursor_cs">
                        <b>Followers</b> <a class="float-right default_cursor_cs">1,322</a>
                    </li>
                    <li class="list-group-item default_cursor_cs">
                    <b>Following</b> <a class="float-right">543</a>
                    </li>
                    <li class="list-group-item default_cursor_cs">
                    <b class="default_cursor_cs">Friends</b> <a class="float-right">13,287</a>
                    </li>
                </ul>
            <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
            </div>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Datos Generales</h3>
            </div>
            <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i>Educación</strong>
                <p class="text-muted">
                    Ingenieria en informatica de la Universidad Autonoma de San Luis Potosi
                </p>
                <hr>
                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Ubicacion</strong>
                    <p class="text-muted">Ingenieria</p>
                <hr>
                <strong><i class="fas fa-phone-square-alt mr-1"></i> Contacto</strong>
                <p class="text-muted"> ext 6026</p>
            </div>
        </div>
    </div>
    <div class="col-9">
        <div class="card">
            <div class="card-header p-2">
            <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#notificaciones" data-toggle="tab">Notificaciones</a></li>
                <li class="nav-item"><a class="nav-link" href="#configuracion" data-toggle="tab">Configuración</a></li>
                </ul>
            </div>
            <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane active" id="notificaciones">
                    <div class="timeline timeline-inverse default_cursor_cs">
                        <div class="time-label default_cursor_cs">
                            <span class="bg-danger default_cursor_cs">
                                10 Feb. 2014
                            </span>
                        </div>
                        <div class="default_cursor_cs">
                            <i class="fas fa-envelope bg-primary"></i>
                            <div class="timeline-item default_cursor_cs">
                                <span class="time default_cursor_cs"><i class="far fa-clock"></i> 12:05</span>
                                <h3 class="timeline-header default_cursor_cs"><a href="#" class="default_pointer_cs">Support Team</a> sent you an email</h3>
                                <div class="timeline-body default_cursor_cs">
                                    Mensaje de soporte
                                </div>
                                <div class="timeline-footer default_cursor_cs">
                                    <a href="#" class="btn btn-primary btn-sm default_pointer_cs">Read more</a>
                                    <a href="#" class="btn btn-danger btn-sm default_pointer_cs">Delete</a>
                                </div>
                            </div>
                        </div>
                        <div class="default_cursor_cs">
                            <i class="fas fa-user bg-info default_cursor_cs"></i>
                            <div class="timeline-item default_cursor_cs">
                                <span class="time default_cursor_cs"><i class="far fa-clock"></i> 5 mins ago</span>
                                <h3 class="timeline-header border-0 default_cursor_cs"><a href="#">Sarah Young</a> accepted your friend request</h3>
                            </div>
                        </div>
                        <div class="default_cursor_cs">
                            <i class="fas fa-comments bg-warning"></i>
                            <div class="timeline-item">
                                <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>
                                <h3 class="timeline-header default_cursor_cs"><a href="#">Jay White</a> commented on your post</h3>
                                <div class="timeline-body default_cursor_cs">
                                    Comentario!
                                </div>
                                <div class="timeline-footer default_cursor_cs">
                                    <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                                </div>
                            </div>
                        </div>


                        <div class="time-label default_cursor_cs">
                            <span class="bg-success default_cursor_cs">
                                3 Jan. 2014
                            </span>
                        </div>


                        <div class="default_cursor_cs">
                            <i class="fas fa-camera bg-purple"></i>
                            <div class="timeline-item">
                                <span class="time"><i class="far fa-clock"></i> 2 days ago</span>
                                <h3 class="timeline-header default_cursor_cs"><a href="#" class="default_pointer_cs">Mina Lee</a> uploaded new photos</h3>
                                <div class="timeline-body default_cursor_cs">
                                    <img src="https://placehold.it/150x100" alt="..." class="default_cursor_cs">
                                    <img src="https://placehold.it/150x100" alt="...">
                                    <img src="https://placehold.it/150x100" alt="...">
                                    <img src="https://placehold.it/150x100" alt="...">
                                </div>
                            </div>
                        </div>

                        <div>
                            <i class="far fa-clock bg-gray"></i>
                        </div>
                    </div>
                </div>

                 <!--Configuraciones-->
                <div class="tab-pane" id="configuracion">
                    <form class="form-horizontal default_cursor_cs">
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label default_cursor_cs">Nombre</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputName" placeholder="Name" value="<?php echo e(Auth::user()->nombre); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label default_cursor_cs">RPE</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail" placeholder="000000" value="<?php echo e(Auth::user()->rpe); ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label default_cursor_cs">Apellido Materno</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputName2" placeholder="Apellido" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputExperience" class="col-sm-2 col-form-label default_cursor_cs">Apellido Paterno</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="ap_paterno" placeholder="Apellido" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputSkills" class="col-sm-2 col-form-label default_cursor_cs">Correo</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="correo" placeholder="correo@uaslp.mx">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Alberto\Documents\GitHub\proy-escolar2\resources\views/administracion/profile.blade.php ENDPATH**/ ?>