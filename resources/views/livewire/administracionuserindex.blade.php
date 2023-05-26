<div>
    <div class="card">
        <div class="card-body">
            <div class="card-header">
                    <input wire:model="search" class="form-control" type="text" placeholder="Ingresa nombre o rpe">    
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>RPE</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->rpe}}</td>
                            <td>{{$user->nombre}}</td>
                            <td>{{$user->apellido_pa}}</td>
                            <td>{{$user->apellido_ma}}</td>
                            <td>
                                <div class="input-group">
                                    <div class="col-6">
                                        <a class="btn btn-info" href="{{route('catalogo.usuarios.edit',$user)}}"><i class="fas fa-pencil-alt"></i></a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{$users->links()}}
        </div>
    </div>
</div>
