<div class="modal fade" id="buscarAlumno" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Consultar Alumnos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label class="col-form-label">Búsqueda por</label>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <select class="form-control buscar">
                                            <option>Nombre</option>
                                            <option>Clave Única</option>
                                            <option>Clave Ingeniería</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <input class="form-control buscar" type="text" name="var_buscar" placeholder="nombre/clave única/clave ingeniería" />
                                    </div>
                                    <div class="form-group d-flex align-items-end">
                                        <button class="btn btn-primary w-100 h-100"><i class="fas fa-search"></i></button> 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="table-responsive">
                                        <table id="alumnos" class="table table-bordered table-striped dataTable dtr-inline tabla_alumno">
                                            <thead>
                                                <tr>
                                                    <th>CVE. UASLP</th>
                                                    <th>CVE. Ingeniería</th>
                                                    <th>Nombre</th>
                                                    <th>Carrera</th>
                                                    <th>Seleccionar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="d-flex justify-content-center">
                                                        <button class="btn btn-primary"><i class="fas fa-arrow-alt-circle-left"></i></button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="d-flex justify-content-center">
                                                        <button class="btn btn-primary"><i class="fas fa-arrow-alt-circle-left"></i></button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="d-flex justify-content-center">
                                                        <button class="btn btn-primary"><i class="fas fa-arrow-alt-circle-left"></i></button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="d-flex justify-content-center">
                                                        <button class="btn btn-primary"><i class="fas fa-arrow-alt-circle-left"></i></button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Aceptar</button>
            </div>
        </div>
    </div>
</div>

@section('js')
<script>
    $(document).ready(function () {
        $(".table").DataTable({
            language: {
                emptyTable: "No hay información",
                info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
                lengthMenu: "Mostrar _MENU_ resultados",
                search: "Buscar",
                zeroRecords: "Resultados no encontrados",
                paginate: {
                    first: "Primero",
                    last: "Ultimo",
                    next: "Siguiente",
                    previous: "Anterior",
                },
            },
        });
    });
</script>
@stop