@extends('adminlte::page')
@section('title', 'Exámenes a Título')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-6">
                <h1>Exámenes a Título</h1>
            </div>
            <div class="col-6">
                <div class="d-flex justify-content-end">
                    <button class="btn btn-block bg-gradient-primary form-control col-3" data-toggle="modal" data-target="#buscarAlumno" name=""> Buscar Alumno </button>
                </div>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-1">
                    <img src="https://picsum.photos/200/300" class="img-fluid" alt="" />
                </div>
                <div class="col-11">
                    <div class="row">
                        <div class="col-2 m-1">
                            <label>Clave UASLP</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="cve_unica" name="cve_unica" />
                                <button class="btn btn-info"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                        <div class="col-2 m-1">
                            <label>Ingeniería</label>
                            <input type="number" class="form-control" name="ingenieria" />
                        </div>
                        <div class="col-2 m-1">
                            <label>Ciclo Escolar</label>
                            <select class="form-control">
                                <option>option 1</option>
                                <option>option 2</option>
                                <option>option 3</option>
                                <option>option 4</option>
                                <option>option 5</option>
                            </select>
                        </div>
                        <div class="col-3 m-1">
                            <label>Nombre</label>
                            <input type="text" class="form-control" name="domiclio" disabled />
                        </div>
                        <div class="col-3 m-1">
                            <label>Asesor</label>
                            <input type="text" class="form-control" name="colonia" disabled />
                        </div>
                        <div class="col-3 m-1">
                            <label>Carrera</label>
                            <input type="text" name="cp" class="form-control" disabled />
                        </div>
                        <div class="col-2 m-1">
                            <label>Materias Encontradas</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="grp_encontrados" disabled />
                                <button class="btn btn-info" type="button" data-toggle="modal" data-target="#registroExamen">Mostrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br />
            <br />
            <div class="row">
                <div class="col-12 table-responsive">
                    <table id="archivo" class="table table-bordered table-striped dataTable dtr-inline">
                        <thead>
                            <tr>
                                <th class="sorting sorting_asc" aria-sort="ascending" aria-label="Rendering engine: active to sort column descending" tabindex="0" rowspan="1" colspan="1">Clave</th>
                                <th class="sorting sorting_asc" tabindex="0" rowspan="1" colspan="1">Materia</th>
                                <th class="sorting sorting_asc" tabindex="0" rowspan="1" colspan="1">Fecha</th>
                                <th class="sorting sorting_asc" tabindex="0" rowspan="1" colspan="1">Hora</th>
                                <th class="sorting sorting_asc" tabindex="0" rowspan="1" colspan="1">Salón</th>
                                <th class="sorting sorting_asc" tabindex="0" rowspan="1" colspan="1">Tipo Ex</th>
                                <th class="sorting sorting_asc" tabindex="0" rowspan="1" colspan="1">No. Recibo</th>
                                <th class="sorting sorting_asc" tabindex="0" rowspan="1" colspan="1">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td width="10">
                                    <button class="m-1 btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></button><button class="m-1 btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td width="10px">
                                    <button class="m-1btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></button><button class="m-1 btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1">Clave</th>
                                <th rowspan="1" colspan="1">Materia</th>
                                <th rowspan="1" colspan="1">Fecha</th>
                                <th rowspan="1" colspan="1">Hora</th>
                                <th rowspan="1" colspan="1">Salón</th>
                                <th rowspan="1" colspan="1">Tipo Ex</th>
                                <th rowspan="1" colspan="1">No. Recibo</th>
                                <th rowspan="1" colspan="1">Opciones</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!----Modal registro---->
    <div class="modal fade" id="registroExamen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Selección de Exámen</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="card">
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Grupo</th>
                                <th>Materia</th>
                                <th>Ex. Ordinario</th>
                                <th>Ex. Extraordinario</th>
                                <th>Completar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td width="10px" class="text-center"><a class="btn btn-info btn-sm"><i class="fas fa-fill-drip"></i></a></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td width="10px" class="text-center"><a class="btn btn-info btn-sm"><i class="fas fa-fill-drip"></i></a></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td width="10px" class="text-center"><a class="btn btn-info btn-sm"><i class="fas fa-fill-drip"></i></a></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td width="10px" class="text-center"><a class="btn btn-info btn-sm"><i class="fas fa-fill-drip"></i></a></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-2">
                            <div class="form-group">
                                <label>Grupo</label>
                                <br>
                                <input class="form-control" type="text" name="grupo" disabled>
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="form-group">
                                <label>Cve.Materia</label>
                                <br>
                                <input class="form-control" type="text" name="" disabled>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>Materia</label>
                                <br>
                                <input class="form-control" type="text" name="" disabled>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label>Fecha</label>
                                <br>
                                <input class="form-control" type="text" name="" disabled>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label>Hora</label>
                                <br>
                                <input class="form-control" type="text" name="" disabled>
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="form-group">
                                <label>Salón</label>
                                <br>
                                <input class="form-control" type="text" name="" disabled>
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="form-group">
                                <label>Exámen</label>
                                <br>
                                <input class="form-control" type="text" name="" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label>RPE Titular</label>
                                <br>
                                <input class="form-control" type="text" name="" disabled>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label>Sinodal Titular</label>
                                <br>
                                <input class="form-control" type="text" name="" disabled>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label>RPE Secretario</label>
                                <br>
                                <input class="form-control" type="text" name="" disabled>
                            </div>    
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label>Sinodal Secretario</label>
                                <br>
                                <input class="form-control" type="text" name="" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label>No. de Recibo</label>
                                <br>
                                <input class="form-control" type="text" name="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary">Registrar Examen</button>
        </div>
        </div>
    </div>
    </div>
    
    @include('modalAlumnos')
@stop

@section('css')
@stop

@section('js')
    <script type="text/javascript">
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
@stop