@extends('adminlte::page')
@section('title', 'Fechas de Exámenes')

@section('content_header')
    <h1>Fechas de Exámenes</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        <div class="form-row mb-3">
            <div class="form-group col-md-4">
                <label>Área Académica</label>
                <select class="form-control">
                    <option>Departamento Fisico Matematico</option>
                    <option>Departamento Fisico Matematico</option>
                    <option>Departamento Fisico Matematico</option>
                    <option>Departamento Fisico Matematico</option>
                    <option>Departamento Fisico Matematico</option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label>Ciclo Escolar</label>
                <select class="form-control">
                    <option>2017-2018/I</option>
                    <option></option>
                    <option></option>
                    <option></option>
                    <option></option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label>Periodo</label>
                <select class="form-control">
                    <option>Exámenes a Título</option>
                    <option></option>
                    <option></option>
                    <option></option>
                    <option></option>
                </select>
            </div>
            <div class="form-group col-md-2 d-flex align-items-end justify">
                <button class="btn btn-primary form-control w-100">Buscar</button>
            </div>
        </div>
        <div>
            <table id="archivo" class="table table-bordered table-striped dataTable dtr-inline">
                <div class="row">
                    <div class="col-2">
                        <h6>Exámen programado</h6>
                    </div>
                    <div class="col-2">
                        <h6>Exámen NO programado</h6>
                    </div>
                </div>
                <thead>
                    <tr>
                        <th class="sorting sorting_asc" aria-sort="ascending" aria-label="Rendering engine: active to sort column descending" tabindex="0" rowspan="1" colspan="1">
                            Clave
                        </th>
                        <th class="sorting sorting_asc" tabindex="0" rowspan="1" colspan="1">Materia</th>
                        <th class="sorting sorting_asc" tabindex="0" rowspan="1" colspan="1">Fecha</th>
                        <th class="sorting sorting_asc" tabindex="0" rowspan="1" colspan="1">Salón</th>
                        <th class="sorting sorting_asc" tabindex="0" rowspan="1" colspan="1">Hora</th>
                        <th class="sorting sorting_asc" tabindex="0" rowspan="1" colspan="1">Ex. Prog</th>
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
                        <td class="d-flex justify-content-around">
                            <button class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></button><button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="d-flex justify-content-around">
                            <button class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></button><button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th rowspan="1" colspan="1">Clave</th>
                        <th rowspan="1" colspan="1">Materia</th>
                        <th rowspan="1" colspan="1">Fecha</th>
                        <th rowspan="1" colspan="1">Salón</th>
                        <th rowspan="1" colspan="1">Hora</th>
                        <th rowspan="1" colspan="1">Ex. Prog</th>
                        <th rowspan="1" colspan="1">Opciones</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div>
            <table id="materias" class="table table-bordered table-striped dataTable dtr-inline">
                <thead>
                    <tr>
                        <th>Clave</th>
                        <th>Materia</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-6 d-flex align-items-center justify-content-between">
                    <div class="w-25">
                        <button class="w-100 btn bg-gradient-secondary form-control">Agregar</button>
                    </div>
                    <div class="w-25">
                        <button class="w-100 btn bg-gradient-secondary form-control">Eliminar</button>
                    </div>
                    <div class="w-25">
                        <button class="w-100 btn bg-gradient-secondary form-control">Limpiar</button>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Fecha:</label>
                            <select class="form-control">
                                <option></option>
                                <option></option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Hora:</label>
                            <select class="form-control">
                                <option></option>
                                <option></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12 d-flex align-items-end justify">
                            <button class="btn btn-light w-100 border">Modificar parámetros</button>
                        </div>
                    </div>
                </div>
            </div>

            <!--Fin del row abajo de la tabla de materias-->
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <button class="btn bg-gradient-secondary form-control">Agregar Materias</button>
                    </div>
                </div>
                <!--Fin boton agregar materias-->
                <div class="col-sm-2">
                    <div class="form-group">
                        <button class="btn bg-gradient-secondary form-control">Cambiar fechas</button>
                    </div>
                </div>
                <!--Fin boton cambiar fechas-->
                <div class="col-sm-2">
                    <div class="form-group">
                        <button class="btn bg-gradient-secondary form-control">Cambiar salones</button>
                    </div>
                </div>
                <!--Fin boton Cambiar Salones-->
                <div class="col-sm-2">
                    <div class="form-group">
                        <button class="btn bg-gradient-secondary form-control">Cambiar horarios</button>
                    </div>
                </div>
                <!--Fin boton Cambiar horarios-->
                <div class="col-sm-2">
                    <div class="form-group">
                        <button class="btn bg-gradient-secondary form-control">Imprimir</button>
                    </div>
                </div>
                <!--Fin boton imprimir-->
                <div class="col-sm-2">
                    <div class="form-group">
                        <button class="btn bg-gradient-secondary form-control">Imprimir Sinodales</button>
                    </div>
                </div>
                <!--Fin boton Imprimir Sinodales-->
                <div class="col-sm-2">
                    <div class="form-group">
                        <button class="btn bg-gradient-secondary form-control">Exportar XLS</button>
                    </div>
                </div>
                <!--Fin boton Exportar XLS-->
            </div>
            <!--Fin del row de los ultimos botones-->
        </div>
        <!--Div de tabla responsiva-->
    </div>
    <!--Fin Card Body-->
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