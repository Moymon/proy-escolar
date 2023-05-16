@extends('adminlte::page')
@section('title', 'Fechas de Exámenes')

@section('content_header')
    <h1>Fechas de Exámenes</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-3">
                <div class="form-group">
                    <label>Área Académica</label>
                    <br>
                    <select class="form-control">
                        <option>Departamento Fisico Matematico</option>
                        <option>Departamento Fisico Matematico</option>
                        <option>Departamento Fisico Matematico</option>
                        <option>Departamento Fisico Matematico</option>
                        <option>Departamento Fisico Matematico</option>
                    </select>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label>Ciclo Escolar</label>
                    <br>
                    <select class="form-control">
                        <option>2017-2018/I</option>
                        <option></option>
                        <option></option>
                        <option></option>
                        <option></option>
                    </select>
                </div>                
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label>Periodo</label>
                    <br>
                    <select class="form-control">
                        <option>Exámenes a Título</option>
                        <option></option>
                        <option></option>
                        <option></option>
                        <option></option>
                    </select>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-light form-control">Buscar</button>
                    </div>  
                </div>        
            </div>
        </div>
        <br>
        <br>
        <div class="row">
            <div class="col-12 table-responsive">
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
                            <th class="sorting sorting_asc" aria-sort="ascending" aria-label="Rendering engine: active to sort column descending" tabindex="0" rowspan="1" colspan="1" >
                            Clave
                            </th>
                            <th class="sorting sorting_asc" tabindex="0" rowspan="1" colspan="1" >Materia
                            </th>
                            <th class="sorting sorting_asc" tabindex="0" rowspan="1" colspan="1" >Fecha
                            </th>
                            <th class="sorting sorting_asc" tabindex="0" rowspan="1" colspan="1" >Salón
                            </th>
                            <th class="sorting sorting_asc" tabindex="0" rowspan="1" colspan="1" >Hora
                            </th>
                            <th class="sorting sorting_asc" tabindex="0" rowspan="1" colspan="1" >Ex. Prog
                            </th>
                            <th class="sorting sorting_asc" tabindex="0" rowspan="1" colspan="1" >Opciones
                            </th>
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
                            <td class="d-flex justify-content-around"><button class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></button><button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="d-flex justify-content-around"><button class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></button><button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button></td>
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
        <div class="row">
            <div class="card col-12">
                <div class="card-body">
                    <div class="table-responsive">
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
                            <div class="col-6">
                                <div class="form-group">
                                    <button class="btn btn-light form-control">Agregar</button>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-light form-control">Eliminar</button>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-light form-control">Limpiar</button>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Fecha:</label>
                                    <select class="form-control">
                                        <option></option>
                                        <option></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Hora:</label>
                                    <select class="form-control">
                                        <option></option>
                                        <option></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-light form-control">Modificar parámetros</button>
                                </div>
                            </div>
                        </div><!--Fin del row abajo de la tabla de materias-->
                        <div class="row">
                            <div class="col-2">
                                <div class="form-group">
                                    <button class="btn btn-light form-control">Agregar Materias</button>
                                </div>
                            </div> <!--Fin boton agregar materias-->
                            <div class="col-2">
                                <div class="form-group">
                                    <button class="btn btn-light form-control">Cambiar fechas</button>
                                </div>
                            </div> <!--Fin boton cambiar fechas-->
                            <div class="col-2">
                                <div class="form-group">
                                    <button class="btn btn-light form-control">Cambiar salones</button>
                                </div>
                            </div> <!--Fin boton Cambiar Salones-->
                            <div class="col-2">
                                <div class="form-group">
                                    <button class="btn btn-light form-control">Cambiar horarios</button>
                                </div>
                            </div> <!--Fin boton Cambiar horarios-->
                            <div class="col-2">
                                <div class="form-group">
                                    <button class="btn btn-light form-control">Imprimir</button>
                                </div>
                            </div> <!--Fin boton imprimir-->
                            <div class="col-2">
                                <div class="form-group">
                                    <button class="btn btn-light form-control">Imprimir Sinodales</button>
                                </div>
                            </div> <!--Fin boton Imprimir Sinodales-->
                            <div class="col-2">
                                <div class="form-group">
                                    <button class="btn btn-light form-control">Exportar XLS</button>
                                </div>
                            </div> <!--Fin boton Exportar XLS-->
                        </div><!--Fin del row de los ultimos botones-->
                    </div><!--Div de tabla responsiva-->
                </div><!--Fin Card Body-->
            </div> <!--Fin Card donde todo va-->
        </div>
    </div>    
</div>



@stop

@section('css')
@stop

@section('js')

@stop