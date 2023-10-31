@extends('adminlte::page')
@extends('modalAlumnos')

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
        <div class="row gutters-sm mb-3">
            <div class="col-sm-2 mb-3 d-flex align-items-start justify-content-start pr-0">
                <div style="width: 133px;">
                    <div style="height: 133px;">
                        <img src="https://picsum.photos/200/300" class="img-fluid" alt="" style="width: 133px; height: 133px;">
                    </div>
                </div>
            </div>

            <div class="col-sm-10 mb-3 pl-0">
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label>Clave UASLP</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="cve_unica" name="cve_unica">
                            <button class="btn btn-info"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Ingeniería</label>
                        <input type="number" class="form-control" name="ingenieria" />
                    </div>
                    <div class="form-group col-md-2">
                        <label>Ciclo Escolar</label>
                        <select class="form-control form-select">
                            <option>option 1</option>
                            <option>option 2</option>
                            <option>option 3</option>
                            <option>option 4</option>
                            <option>option 5</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Período</label>
                        <select class="form-control form-select">
                            <option>option 1</option>
                            <option>option 2</option>
                            <option>option 3</option>
                            <option>option 4</option>
                            <option>option 5</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Materias encontradas</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="grp_encontrados" disabled>
                            <button class="btn btn-info" type="button" data-toggle="modal" data-target="#registroExamen">Mostrar</button>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Nombre</label>
                        <input type="text" class="form-control" name="domiclio" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Asesor</label>
                        <input type="text" class="form-control" name="colonia" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <label >Carrera</label>
                        <input type="text" name="cp" class="form-control" disabled>
                    </div>
                </div>
            </div>
        </div>
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

<div class="modal fade" id="registroExamen" tabindex="-1" role="dialog" aria-labelledby="registroExamenModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registroExamenModalLabel">Selección de Exámen</h5>
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
                                        <td width="10px" class="text-center">
                                            <a class="btn btn-info btn-sm"><i class="fas fa-fill-drip"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td width="10px" class="text-center">
                                            <a class="btn btn-info btn-sm"><i class="fas fa-fill-drip"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td width="10px" class="text-center">
                                            <a class="btn btn-info btn-sm"><i class="fas fa-fill-drip"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td width="10px" class="text-center">
                                            <a class="btn btn-info btn-sm"><i class="fas fa-fill-drip"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label>Grupo</label>
                                    <input class="form-control" type="text" name="grupo" disabled />
                                </div>
                                <div class="form-group col-md-1">
                                    <label>Cve.Materia</label>
                                    <input class="form-control" type="text" name="" disabled />
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Materia</label>
                                    <input class="form-control" type="text" name="" disabled />
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Fecha</label>
                                    <input class="form-control" type="text" name="" disabled />
                                </div>
                                <div class="form-group col-md-1">
                                    <label>Hora</label>
                                    <input class="form-control" type="text" name="" disabled />
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Salón</label>
                                    <input class="form-control" type="text" name="" disabled />
                                </div>
                                <div class="form-group col-md-1">
                                    <label>Exámen</label>
                                    <input class="form-control" type="text" name="" disabled />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label>RPE Titular</label>
                                    <input class="form-control" type="text" name="" disabled />
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Sinodal Titular</label>
                                    <input class="form-control" type="text" name="" disabled />
                                </div>
                                <div class="form-group col-md-2">
                                    <label>RPE Secretario</label>
                                    <input class="form-control" type="text" name="" disabled />
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Sinodal Secretario</label>
                                    <input class="form-control" type="text" name="" disabled />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>No. de Recibo</label>
                                    <input class="form-control" type="text" name="" />
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
</div>
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