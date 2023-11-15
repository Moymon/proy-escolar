@extends('adminlte::page')

@section('title', 'Listado de Exámenes')

@section('content_header')
    <h1>Listado de Exámenes</h1>
@stop

@section('content')

<div class="container-xxl">
    <div class="main-body">
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <form id="formFiltroFechas" method="POST" class="m-0 p-0">
                            @csrf
        
                            <div class="mb-3">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="ciclo_escolar">Ciclo escolar</label>
                                        <select name="ciclo_escolar" id="ciclo_escolar" class="form-select form-control">
                                            <option value="" selected>Ciclo Escolar</option>
                                            <option value="2018 - 2019/1">2018 - 2019/I</option>
                                            <option value="2018 - 2019/2">2018 - 2019/II</option>
                                            <option value="2019 - 2020/1">2019 - 2020/I</option>
                                            <option value="2019 - 2020/2">2019 - 2020/II</option>
                                            <option value="2020 - 2021/1">2020 - 2021/I</option>
                                            <option value="2020 - 2021/2">2020 - 2021/II</option>
                                            <option value="2021 - 2022/1">2021 - 2022/I</option>
                                            <option value="2021 - 2022/2">2021 - 2022/II</option>
                                            <option value="2022 - 2023/1">2022 - 2023/I</option>
                                            <option value="2022 - 2023/2">2022 - 2023/II</option>
                                            <option value="2023 - 2024/1">2023 - 2024/I</option>
                                            <option value="2023 - 2024/2">2023 - 2024/II</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <label for="periodo">Periodo</label>
                                        <select name="periodo" id="periodo" class="form-select form-control">
                                            <option value="" selected>Periodo</option>
                                            <option value="EXAMENES A TITULO">EXAMENES A TITULO</option>
                                            <option value="EXAMENES A REGULARIZACION">EXAMENES A REGULARIZACION</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
        
                            <div>
                                <table class="table table-bordered table-striped dataTable dtr-inline tablas_pago" id="tablaFechas">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col">Fechas de Exámenes</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tablaFechasTbody">
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
        
                            <div id="erroresDeTablaFechas" style="display: none;"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <form action="">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>Tipo de Exámen</label>
                                    <input class="form-control" type="text" name="" disabled>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Materia</label>
                                    <input class="form-control" type="text" name="" disabled> 
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Fecha</label>
                                    <input class="form-control" type="text" name="" disabled>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Hora</label>
                                    <input class="form-control" type="text" name="" disabled>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label>Salón</label>
                                    <input class="form-control" type="text" name="" disabled>
                                </div>

                                <div class="form-group col-md-5">
                                    <label>Sinodal Titular</label>
                                    <input class="form-control" type="text" name="" disabled>
                                </div>

                                <div class="form-group col-md-5">
                                    <label>Sinodal Secretario</label>
                                    <input class="form-control" type="text" name="" disabled>
                                </div>
                                <div class="form-group col-md-3 d-flex align-items-end">
                                    <button type="submit" class="w-100 btn btn-primary">Ver Sinodal Secretario</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-body">
                        <table id="archivo" class="table table-bordered table-striped dataTable dtr-inline">
                            <h3 class="text-center">Lista de Alumnos</h3>
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
</div>
@stop

@section('footer')
    <div></div>
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