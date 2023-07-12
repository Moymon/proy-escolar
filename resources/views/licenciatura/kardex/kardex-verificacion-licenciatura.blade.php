@extends('adminlte::page')

@section('title', 'Verificacion')

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-6">
            <h1>Impresión de Verificación de Kardex</h1>
        </div>
    </div>
</div>
@stop

@section('content')
    <div class="row">
        <div class="col-1">
            <label class="m-0">Ciclo Escolar: </label>
        </div>
        <div class="col-2">
            <select class="m-0 form-control form-select">
                <option></option>
                <option></option>
                <option></option>
                <option></option>
                <option></option>
            </select>
        </div>
        <div class="col-2">
            <button type="button" class="btn-sm bg-dark">Buscar</button>
        </div>
    </div>

    <br><br><br>

    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-impresion" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Kardex para impresión</button>
          <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-correciones" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Correciones en el Kardex</button>
          <button class="nav-link" id="nav-contact-tab" data-toggle="tab" data-target="#nav-consultas" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Consultas en la Verificación</button>
        </div>
    </nav>

    <!--tabs-->
    <div class="tab-content">
        <!--impresion-->
        <div class="p-3 tab-pane fade show active" id="nav-impresion" role="tabpanel" aria-labelledby="nav-home-tab">
            <table class="table table-bordered table-striped dataTable dtr-inline tablas_kardex">
                <thead>
                    <tr>
                        <th>Folio</th>
                        <th>Cve. UASLP</th>
                        <th>Nombre</th>
                        <th>Carrera</th>
                        <th>Correcta</th>
                        <th>Asesor</th>
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
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
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
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div> 

        <!--correcciones-->
        <div class="p-3 tab-pane fade show" id="nav-correciones" role="tabpanel" aria-labelledby="nav-home-tab">
            <table class="table table-bordered table-striped dataTable dtr-inline tablas_kardex"> 
                <thead>
                    <tr>
                        <th>Folio</th>
                        <th>Cve. UASLP</th>
                        <th>Nombre</th>
                        <th>Carrera</th>
                        <th>Correcta</th>
                        <th >Edición</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td width="10px"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td width="10px"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td width="10px"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td width="10px"></td>
                    </tr>
                </tbody>
            </table>
            <br>
            <div class="row">
                <div class="col-6">
                    <div class="row">
                        <div class="col-6">
                            <label class="form-label">Detalle del Alumno:</label>
                            <textarea class="form-control" rows="5"></textarea>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Aclaración:</label>
                            <textarea class="form-control" rows="5"></textarea> 
                        </div>        
                    </div>
                </div>
                <div class="col-6">
                    <div class="row">
                        <div class="col-3">
                            <label class="form-label">Kardex Corregido:</label>
                            <select class="form-control form-select">
                                <option></option>
                                <option></option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Estatus de la corrección:</label>
                            <select class="form-control form-select">
                                <option></option>
                                <option></option>
                            </select>
                        </div>  
                    </div>
                </div>
            </div>
            <br>
            <div class="d-flex justify-content-end">
                <button type="button" class="btn-sm bg-dark m-1">Guardar</button>
                <button type="button" class="btn-sm bg-dark m-1">Modificar Kardex</button>
            </div>
        </div> 

        <!--consultas-->
        <div class="p-3 tab-pane fade show" id="nav-consultas" role="tabpanel" aria-labelledby="nav-home-tab">
            <br>
                <div class="row">
                    <div class="col-1">
                        <label class="form-label">Clave UASLP:</label>
                        <div class="input-group-append">
                           <input class="form-control" type="" name=""> 
                           <button class="btn btn-info"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                    <div class="col-2">
                        <label class="form-label">Nombre</label>
                        <input class="form-control" type="" name="" disabled>
                    </div>
                    <div class="col-2">
                        <label class="form-label">Clave Ingenieria:</label>
                        <input class="form-control" type="" name="" disabled>
                    </div>
                    <div class="col-2">
                        <label class="form-label">Ciclo Escolar</label>
                        <input class="form-control" type="" name="" disabled>
                    </div>
                    <div class="col-2">
                        <label class="form-label">Carrera</label>
                        <input class="form-control" type="" name="" disabled>
                    </div>
                </div>
            <br>
            <table class="table table-bordered table-striped dataTable dtr-inline tablas_kardex">
                <thead> 
                    <tr>
                        <th>Folio</th>
                        <th>Carrera</th>
                        <th>Fecha y Hora</th>
                        <th>Correcta</th>
                        <th>Fecha y Hora Imp</th>
                        <th>Ciclo</th>
                        <th>Detalles</th>
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
                        <td class="text-center" width="10px">Ver más <button class="btn-sm btn-info" onclick="detalles()"><i class="fas fa-list"></i></button></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-center" width="10px">Ver más <button class="btn-sm btn-info"><i class="fas fa-list"></i></button></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-center" width="10px">Ver más <button class="btn-sm btn-info"><i class="fas fa-list"></i></button></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-center" width="10px">Ver más <button class="btn-sm btn-info"><i class="fas fa-list"></i></button></td>
                    </tr>
                </tbody>
            </table> 
            <br>
        </div>  
    </div>




    <!--Modal detalles-->
    <div class="modal fade" id="modalDetalles" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Detalles</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
                <div class="col-2">
                    <label class="form-label">Folio</label>
                    <input class="form-control" type="" name="" disabled>
                </div>
                <div class="col-2">
                    <label class="form-label">Número IP</label>
                    <input class="form-control" type="" name="" disabled>
                </div>
                <div class="col-2">
                    <label class="form-label">Estatus</label>
                    <input class="form-control" type="" name="" disabled>
                </div>
                <div class="col-2">
                    <label class="form-label">Fecha y Hora del estatus</label>
                    <input class="form-control" type="datetime-local" name="" disabled>
                </div>
                <div class="col-2">
                    <label class="form-label">Para Impresión</label>
                    <input class="form-control" type="" name="" disabled>
                </div>
                <div class="col-2">
                    <label class="form-label">Declaró correcta</label>
                    <input class="form-control" type="" name="" disabled>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-3">
                    <label class="form-label">Fecha y Hora de la verificación</label>
                    <input class="form-control" type="datetime-local" name="" disabled>
                </div>
                <div class="col-2">
                    <label class="form-label">Corregido</label>
                    <input class="form-control" type="text" name="" disabled>
                </div>
                <div class="col-3">
                     <label class="form-label">Fecha y Hora de la impresión</label>
                     <input class="form-control" type="datetime-local" name="" disabled>
                </div>
            </div>    
            <br>
            <div class="row">
                <div class="col-6">
                    <label class="form-label">Detalle del Alumno</label>
                    <textarea class="form-control" rows="5" disabled></textarea>
                </div>
                <div class="col-6">
                    <label class="form-label">Detalle Facultad</label>
                    <textarea class="form-control" rows="5" disabled></textarea>
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
@stop

@section('css')
@stop

@section('js')
<script>
 $(document).ready(function (){
        $('.tablas_kardex').DataTable({
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
        });
    });
 function detalles() {
        // body...
        $('#modalDetalles').modal('show');
    }   
</script>
@stop