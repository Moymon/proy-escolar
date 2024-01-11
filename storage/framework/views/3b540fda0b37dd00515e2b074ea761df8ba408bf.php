<div>
    <div class="card">
        <div class="card-body">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('administrador.create')): ?>
                <div class="d-flex align-items-center justify-content-end">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#nuevoUsuario" ><i class="fas fa-user-plus"> </i> </button>
                </div>
            <?php endif; ?>
            <br>
            <br>
            <br>
            <table id="tabla_usuarios" class="table table-bordered table-striped dataTable dtr-inline">
                <thead>
                    <tr>
                        <th>RPE</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('administrador.edit')): ?>
                            <th>Rol(es)</th>
                            <th>Direcion I.P.</th>
                        <?php endif; ?>    
                        <th>Correo</th>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('administrador.edit')): ?>
                            <th>Estatus</th>
                            <th>Editar</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><div >
                                <a href="#" class="seleccionable" data-id="<?php echo e($user->id); ?>"><?php echo e($user->rpe); ?></a></div> </td>
                            <td><?php echo e($user->nombre); ?></td>
                            <td><?php echo e($user->apellido_pa); ?></td>
                            <td><?php echo e($user->apellido_ma); ?></td>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('administrador.edit')): ?>
                                <td>
                                <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="badge badge-secondary">
                                   <h5><?php echo e($rol->name); ?></h5> 
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <td><?php echo e($user->direccion_ip); ?></td>
                            <?php endif; ?>    
                            <td><?php echo e($user->correo); ?></td>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('administrador.edit')): ?>
                                <td><?php echo e($user->estatus); ?></td>
                                <td>
                                    <div class="input-group " >
                                        <div class="col-6">
                                            <button type="button" class="btn btn-info" onclick="verUsuario(<?php echo e($user); ?>)"><i class="fas fa-pencil-alt"></i></button>
                                        </div>
                                        <div class="col-6">
                                            <div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="actualizarRol" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cambiar de Roles</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
        <div class="modal-body">
            <div class="card">
                <div class="card-body">
                    <form >
                        <div class="form-group "> 
                            <div class="d-flex justify-content-around row">
                                <div class="p-2 w-100">
                                    <div class="mb-2 w-100 d-flex flex-row align-items-center justify-content-between">
                                        <h3>Roles asignados</h3>
                                    </div>
                                    <div style="max-height:50vh;overflow:auto;">
                                        <div id="boxRolesAsignados" class="row permisosAsignados w-100 d-flex flex-row align-items-start justify-content-start">
                                        </div>
                                    </div>                   
                                </div>
                                <br>
                                <div class="p-2 w-100">
                                    <h3>Roles</h3>
                                    <div style="max-height:50vh;overflow:auto;">
                                        <div id="boxRolesNoAsignados" class="row permisosNoAsigandos w-100 d-flex flex-row align-items-start justify-content-start"> 
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </form>    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button id="btnGuardarRoles" disabled type="button" class="btn btn-primary">Aceptar</button>
            </div>
        </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirmarRol" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Confirmar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
        <div class="modal-body">
            <div class="card">
                <div class="card-body">
                    <form >
                        <div class="form-group "> 
                            <div class="d-flex justify-content-around row">
                                <div class="p-2 w-100">
                                    <h5>¿Seguro que deseas guardar los cambios?</h5>
                                </div> 
                            </div>
                        </div>
                    </form>    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button id="btnConfirmarRoles" type="button" class="btn btn-primary">Guardar</button>
            </div>
        </div>
        </div>
    </div>
</div>

<div class="modal fade" id="nuevoUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ingresa los datos para el nuevo usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
        <div class="modal-body">
            <form action="/create-user" method="POST">
            <?php echo csrf_field(); ?>
                <div class="card">
                    <div class="card-body">
                        <div class="form-group "> 
                            <div class="d-flex justify-content-around row">
                                <div class="p-2 w-100">
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="form-group" >
                                                <label>RPE</label>
                                                <input class="form-control" type="number" name="rpeNew" required>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group" >
                                                <label>Nombre</label>
                                                <input class="form-control" type="text" name="nombreNew" required>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>Apellido Paterno</label>
                                                <input class="form-control" type="text" name="apellido_paNew" required>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>Apellido Materno</label>
                                                <input class="form-control" type="text" name="apellido_maNew" required>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group" id="direccion_ipNew">
                                                <label>Direccion I.P</label>
                                                <input class="form-control" type="text" name="direccion_ipNew">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>Correo</label>
                                                <input class="form-control" type="text" name="correoNew">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>Rol</label>
                                                <select class="form-control" name="rol_id">
                                                    <option value="0" selected>N/A</option>
                                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($rol->id); ?>"><?php echo e($rol->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button id="btnCrearUsuario" type="submit" class="btn btn-primary">Crear</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
     <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar los campos para actualizacion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
        <div class="modal-body">
            <form action="/edit-users" method="POST">
                <?php echo csrf_field(); ?>
                <div class="card">
                    <div class="card-body">
                        <div id="datosUsuario">
                            <div class="row">
                                <div class="col-2">
                                        <div class="form-group" id="idEdit">
                                            <label>ID</label>
                                        </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group" id="rpeEdit">
                                        <label>RPE</label>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group" id="nombreEdit">
                                        <label>Nombre</label>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group" id="apellido_paEdit">
                                        <label>Apellido Paterno</label>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group" id="apellido_maEdit">
                                        <label>Apellido Materno</label>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group" id="direccion_ipEdit">    <label>Direccion I.P</label>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group" id="correoEdit">
                                        <label>Correo</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button id="btnActualizarUsuario" type="submit" class="btn btn-primary">Guardar</button>
                </div> 
            </form>
        </div>
        </div>
    </div>
</div>

<?php /**PATH C:\Users\Alberto\Documents\GitHub\proy-escolar2\resources\views/livewire/administracionuserindex.blade.php ENDPATH**/ ?>