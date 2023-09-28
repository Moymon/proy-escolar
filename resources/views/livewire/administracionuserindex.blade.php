<div>
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-end">
                <button class="btn btn-primary" data-toggle="modal" data-target="#nuevoUsuario" ><i class="fas fa-user-plus"> </i> </button>
            </div>
            <table id="tabla_usuarios" class="table table-striped">
                <thead>
                    <tr>
                        <th>RPE</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Rol(es)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td><div >
                                <a href="#" class="seleccionable" data-id="{{$user->id}}">{{$user->rpe}}</a></div> </td>
                            <td>{{$user->nombre}}</td>
                            <td>{{$user->apellido_pa}}</td>
                            <td>{{$user->apellido_ma}}</td>
                            
                                <td>
                                @foreach ($user->roles as $rol)
                                <div class="badge badge-secondary">
                                   <h5>{{$rol->name}}</h5> 
                                </div>
                                @endforeach
                                </td>
                            <td  >
                                <div class="input-group " >
                                    <!--
                                    <div class="col-6">
                                        <a class="btn btn-info" href="{{route('catalogo.usuarios.edit',$user)}}"><i class="fas fa-pencil-alt"></i></a>
                                    </div>

                                    <div class="col-6">
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#actualizarRol" ><i class="fas fa-pencil-alt"></i></button>
                                    </div> --->
                                    <div class="col-6">
                                        <div >
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
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
    <div class="modal-dialog modal-dialog-centered modal" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ingresa los datos para el nuevo usuario</h5>
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
                <button id="btnGuardarUsuario" type="button" class="btn btn-primary">Guardar</button>
            </div>
        </div>
        </div>
    </div>
</div>