@extends('adminlte::page')

@section('title', 'Listado de Exámenes')

@section('content_header')
    <h1>Listado de Exámenes</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label>Ciclo Escolar</label>
                <br>
                <select class="form-control">
                    <option>2022-2023/I</option>
                    <option>2021-2022/I</option>
                    <option>2020-2021/I</option>
                    <option>2019-2020/I</option>
                    <option>2018-2019/I</option>
                </select>
            </div>
            <div class="form-group">
                <label>Período</label>
                <br>
                <select class="form-control">
                    <option>EXÁMENES A TÍTULO</option>
                    <option>EXÁMENES A TÍTULO</option>
                    <option>EXÁMENES A TÍTULO</option>
                    <option>EXÁMENES A TÍTULO</option>
                    <option>EXÁMENES A TÍTULO</option>
                </select>
            </div>
            <div class="form-group">
                <div class="d-flex justify-content-end">
                    <div class="col-2">
                        <button class="btn bg-gradient-secondary">Listar Fechas</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div id="table_fechas" >
                <div class="table-responsive">
                    <table id="tabla_fechas" class="table table-bordered table-striped dataTable dtr-inline">
                        <thead>
                            <tr>
                                <th>Fechas de Exámenes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>    
                </div>
            </div>
            <div class="form-group">
                <div class="d-flex justify-content-end">
                    <div class="col-3">
                       <button class="btn bg-gradient-secondary form-control">Listar Exámenes</button> 
                    </div>
                </div>
            </div>                
        </div>
      </div>
      <div class="row">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label>Tipo de Exámen</label>
                            <input class="form-control" type="text" name="" disabled>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Materia</label>
                            <input class="form-control" type="text" name="" disabled>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label>Fecha</label>
                            <input class="form-control" type="text" name="" disabled>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Hora</label>
                            <input class="form-control" type="text" name="" disabled>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label>Salón</label>
                            <input class="form-control" type="text" name="" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label>Sinodal Titular</label>
                            <input class="form-control" type="text" name="" disabled>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>Sinodal Secretario</label>
                            <input class="form-control" type="text" name="" disabled>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <br>
                            <button class="btn bg-gradient-secondary form-control">Ver Sinodal Secretario</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 table-responsive">
            <table id="archivo" class="table table-bordered table-striped dataTable dtr-inline">
                <h1>Lista de Alumnos</h1>
                <thead>
                    <tr>
                        <th class="sorting sorting_asc" aria-sort="ascending" aria-label="Rendering engine: active to sort column descending" tabindex="0" rowspan="1" colspan="1" >
                            UASLP
                        </th>
                        <th class="sorting sorting_asc" tabindex="0" rowspan="1" colspan="1" >Nombre
                        </th>
                        <th class="sorting sorting_asc" tabindex="0" rowspan="1" colspan="1" >Recibo
                        </th>
                        <th class="sorting sorting_asc" tabindex="0" rowspan="1" colspan="1" >Salón
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th rowspan="1" colspan="1">UASLP</th>
                        <th rowspan="1" colspan="1">Nombre</th>
                        <th rowspan="1" colspan="1">Recibo</th>
                        <th rowspan="1" colspan="1">Salón</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>    
</div>



@stop

@section('css')
@stop

@section('js')

@stop