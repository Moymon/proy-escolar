@extends('adminlte::page')

@section('title', 'Listado de Exámenes')

@section('content_header')
    <h1>Listado de Exámenes</h1>
@stop

@section('content')

<div class="row">
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <label>Ciclo Escolar</label>
                        <select class="form-control">
                            <option>2022-2023/I</option>
                            <option>2021-2022/I</option>
                            <option>2020-2021/I</option>
                            <option>2019-2020/I</option>
                            <option>2018-2019/I</option>
                        </select> 
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-8">
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
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="" class="table table-bordered table-striped dataTable dtr-inline">
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
                </div>
                <br> 
            </div>
        </div>   
    </div>
    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <div class="row">
                   <div class="col-2">
                        <label>Tipo de Exámen</label>
                        <input class="form-control" type="text" name="" disabled>
                    </div>
                    <div class="col-3">
                        <label>Materia</label>
                        <input class="form-control" type="text" name="" disabled>               
                    </div>
                    <div class="col-2">
                        <label>Fecha</label>
                        <input class="form-control" type="text" name="" disabled>
                    </div>
                    <div class="col-3">
                        <label>Hora</label>
                        <input class="form-control" type="text" name="" disabled>
                    </div>
                    
                </div>
                <br>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label>Salón</label>
                            <input class="form-control" type="text" name="" disabled>
                        </div>
                    </div>
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
        <br>
        <div class="card">
            <div class="card-body">
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
</div>
@stop

@section('css')
@stop

@section('js')
<script type="text/javascript">
        $(document).ready(function (){
        $('#archivo').DataTable({
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