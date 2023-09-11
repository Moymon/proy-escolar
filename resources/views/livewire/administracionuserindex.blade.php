<div>
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-end">
                <button class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">Agregar usuario</button>
            </div>
            <table id="tabla_usuarios" class="table table-striped">
                <thead>
                    <tr>
                        <th>RPE</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Rol</th>
                        <th>Permisos</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        @foreach($user->roles as $rol)
                            @if ($loop->first)
                                <tr class="">
                                    <td>{{$user->rpe}}</td>
                                    <td>{{$user->nombre}}</td>
                                    <td>{{$user->apellido_pa}}</td>
                                    <td>{{$user->apellido_ma}}</td>
                                    
                                    <td>{{$rol->name}}</td>
                                    
                                    <td>
                                        @foreach($rol->permissions as $permission)
                                            <div class="badge badge-secondary">
                                                <h6>{{$permission->name}}</h6>
                                            </div>
                                        @endforeach
                                    </td>
                                    
                                    <td>
                                        <div class="input-group">
                                            <div class="col-6">
                                                <a class="btn btn-info" href="{{route('catalogo.usuarios.edit',$user)}}"><i class="fas fa-pencil-alt"></i></a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <td style="color:transparent;">{{$user->rpe}}</td>
                                    <td style="color:transparent;">{{$user->nombre}}</td>
                                    <td style="color:transparent;">{{$user->apellido_pa}}</td>
                                    <td style="color:transparent;">{{$user->apellido_ma}}</td>
                                    
                                    <td>{{$rol->name}}</td>
                                    
                                    <td>
                                        @foreach($rol->permissions as $permission)
                                            <div class="badge badge-secondary">
                                                <h6>{{$permission->name}}</h6>
                                            </div>
                                        @endforeach
                                    </td>
                                    
                                    <td style="color:transparent;">
                                        <div style="display:none;" class="input-group">
                                            <div class="col-6">
                                                <a class="btn btn-info" href="{{route('catalogo.usuarios.edit',$user)}}"><i class="fas fa-pencil-alt"></i></a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{$users->links()}}
        </div>
    </div>
</div>
  
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form class="m-0 p-0" method="POST" action="{{route('createUsers')}}">
            @csrf
            <div class ="row">
                <div class="mb-3 col-6">
                    <label for="inputRPE1" class="form-label">RPE</label>
                    <input name="rpe" type="number" class="form-control" id="inputRPE1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3 col-6">
                    <label for="inputNombre" class="form-label">Nombre</label>
                    <input name="nombre" type="text" class="form-control" id="inputNombre">
                </div>
                <div class="mb-3 col-6">
                    <label for="inputApellidoMaterno" class="form-label">Apellido Materno</label>
                    <input name="apellido_ma" type="text" class="form-control" id="inputApellidoMaterno">
                </div>
                <div class="mb-3 col-6">
                    <label for="inputApellidoPaterno" class="form-label">Apellido Paterno</label>
                    <input name="apellido_pa" type="text" class="form-control" id="inputApellidoPaterno">
                </div>
            </div>

            <div class="mt-3">
                <h5 class="text-center">Roles</h5>
                <div class="w-100 d-flex flex-row align-items-center justify-content-start">
                    @foreach ($roles as $rol)
                        <div class="mb-3 form-check" style="margin-right:30px;">
                            <input value="{{$rol->name}}" name="rol" type="checkbox" class="form-check-input rol-checkbox w-50 h-50" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">{{$rol->name}}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="w-100 d-flex flex-row align-items-center justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
    </div>
</div>
</div>
