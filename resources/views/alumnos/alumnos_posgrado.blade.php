@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
 <!--
    <h1>Dashboard</h1>
-->
@stop

@section('content')
<div class="w-100 d-flex align-items-center justify-content-end">
    <div>
        <div class=" d-flex flex-row align-items-center justify-content-end">
            <div>
                <button style="border rounded-circle width:min(150px, 100%);" type="button" class="m-1 btn bg-dark" data-toggle="modal" data-target="#buscarAlumno" name=""> Buscar Alumno </button>
            </div>
            <div>
                <button style="border rounded-circle width:min(150px, 100%);" type="button" class="m-1 btn bg-dark"><i class="bi bi-plus"></i></button>
            </div>
        </div>
    </div>
</div>

<nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-datos_generales" type="button" role="tab" aria-controls="nav-alumno" aria-selected="true">Datos Generales</button>
      <button class="nav-link" id="" data-bs-toggle="tab" data-bs-target="#nav-domicilio" type="button" role="tab" aria-controls="nav-domicilio" aria-selected="true">Contacto y Domicilio</button>
      <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-antecedentes" type="button" role="tab" aria-controls="nav-licenciatura" aria-selected="false">Antecedentes Academicos</button>
    </div>
</nav>

<!--Tabs posgrado-->
<div class="tab-content" id="nav-tabContent">
    <!--Tab datos generales-->
    <div class="p-3 tab-pane fade show active" id="nav-datos_generales" role="tabpanel" aria-labelledby="nav-alumno-tab">
        <div class="border border-5 p-3" id="">
            <div class="row">
                <div class="col-1">
                    <img src="https://picsum.photos/200/300" class="img-fluid" alt="">
                </div>
                <div class="col-11">
                    <div class="row">
                        <div class="col-2">
                            <label for="clave_uaslp" class="m-0 form-label">Clave UASLP </label>
                            <input type="text" class="small form-control" id="clave_uaslp" aria-describedby="emailHelp">
                        </div>
                        <div class="col-5">
                            <label for="posgrado" class="m-0 form-label">Posgrado</label>
                            <select id="posgrado" class="form-select form-control" aria-label="posgrado">
                                <option selected>posgrado</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-2">
                            <label for="fecha_nacimiento" class="m-0 form-label">Fecha de Nacimiento</label>
                            <input type="date" class=" form-control" id="fecha_nacimiento" aria-describedby="emailHelp">
                        </div>  
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-2">
                            <label for="apellido_paterno" class="m-0 form-label">Apellido Paterno</label>
                            <input type="text" class=" form-control" id="apellido_paterno" aria-describedby="emailHelp">
                        </div>
                        <div class="col-2">
                            <label for="apellido_materno" class="m-0 form-label">Apellido Materno</label>
                            <input type="text" class=" form-control" id="apellido_materno" aria-describedby="emailHelp">
                        </div>
                        <div class="col-2">
                            <label for="nombres" class="m-0 form-label">Nombres</label>
                            <input type="text" class=" form-control" id="nombres" aria-describedby="emailHelp">
                        </div>
                        <div class="col-3">
                            <label for="nombres" class="m-0 form-label">Nombre</label>
                            <input type="text" class=" form-control" id="nombres" aria-describedby="emailHelp">
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-3">
                    <label for="curp" class="m-0 form-label">CURP</label>
                    <input type="text" class="mid form-control" id="curp" aria-describedby="emailHelp">
                </div>
                <div class="col-2">
                    <label class="m-0">Estado Civil</label>
                    <select id="edo_civil" class="form-select form-control">
                        <option>Soltero/a</option>
                        <option>Casado/a</option>
                        <option>Viudo/a</option>
                        <option>Separado/a</option>
                        <option>Divorciado</option>
                    </select>
                </div>
                <div class="col-2">
                    <label for="sexo" class="m-0 form-label">Genero</label>
                    <select id="sexo" class="form-select form-control" aria-label="sexo">
                        <option value="1">Masculino</option>
                        <option value="2">Femenino</option>
                        <option value="2">Otros</option>
                    </select>
                </div>
                <div class="col-2">
                    <label class="m-0">Estado</label>
                    <select class="form-control form-select">
                        <option></option>
                        <option></option>
                        <option></option>
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-2">
                    <label for="afiliacion_imss" class="m-0 form-label">Número de Seguridad Social (IMSS)</label>
                    <input type="text" class="w-100 m-0 small form-control" id="afiliacion_imss">
                </div>
                <div class="col-2">
                    <label for="fecha_imss" class="m-0 form-label">Fecha Afiliacion NNS</label>
                    <input type="date" class="w-100 m-0 small form-control" id="fecha_imss">
                </div>
                <div class="col-2">
                    <label class="m-0 form-label">Archivo de NSS (Nombre)</label>
                    <input type="text" name="archivo_nss" class="form-control" />
                </div>
                <div class="col-2">
                    <label class="m-0">Habla alguna lengua indigena</label>
                    <div class="row">
                        <div class="col-4">
                            <select class="form-control form-select"> 
                                <option>No</option>
                                <option>Si</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <label class="m-0">Discapacidad</label>
                    <select class="form-control form-select">
                        <option>Ninguna</option>
                        <option>Fisica/Motriz</option>
                        <option>Intelectual</option>
                        <option>Multiple</option>
                        <option>Auditiva:hipoacusia</option>
                        <option>Auditiva/Sordera</option>
                        <option>Visual: baja vision</option>
                        <option>Visual: Ceguera</option>
                        <option>Psicosocial</option>
                        <option>Otras</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-1">
                    <label class="m-0">CVU</label>
                    <input type="text" class="form-control" />
                </div>
                <div class="col-2">
                    <label class="m-0 form-label">RFC</label>
                    <input type="text" name="" class="form-control">
                </div>
                <div class="col-2">
                    <label class="m-0 form-label">Asesor de Tesis</label>
                    <select class="form-control form-select">
                        <option></option>
                        <option></option>
                        <option></option>
                        <option></option>
                    </select>
                </div>
                <div class="col-2">
                    <br>
                    <button class="btn-sm bg-dark">Cambiar Asesor</button>
                </div>      
            </div>
            <br>
            <h3 class="text-center">Contacto de emergencia</h3>
            <hr style="width:100%;color:black" class="border border-5 mt-0">
            <div class="row">
                <div class="col-2">
                    <label class="m-0 form-label">Nombre</label>
                    <input class="form-control" type="text" name="">
                </div>
                <div class="col-2">
                    <label class="m-0 form-label">Parentesco</label>
                    <select class="form-control form-select">
                        <option>Padre</option>
                        <option>Madre</option>
                        <option>Tio/a</option>
                        <option>Hermano/a</option>
                    </select>
                </div>
                <div class="col-2">
                    <label class="m-0 form-label">Telefono</label>
                    <input class="form-control" type="text" name="">
                </div>
                <div class="col-2">
                    <label class="m-0 form-label">Celular</label>
                    <input class="form-control" type="text" name="">
                </div>
            </div>
        </div>
        <div class="mb-2 d-flex flex-sm-row flex-column align-items-center justify-content-end">
            <button disabled id="guardar" style="width:min(150px, 100%);margin-right:10px;margin-bottom:10px;" type="button" class="btn-sm bg-dark">Guardar</button>
            <button disabled id="modificar" style="width:min(150px, 100%);margin-right:10px;margin-bottom:10px;" type="button" class="btn-sm bg-dark">Modificar</button>
        </div>
    </div>
<!--Tab Domicilio-->
    <div class="p-3 tab-pane fade" id="nav-domicilio" role="tabpanel" >
        <div class="border border-5 p-3">
            <h3 class="text-center">Datos de Contacto</h3>
            <hr style="width:100%;color:black" class="border border-5 mt-0">
            <div class="row">
                <div class="col-1">
                    <label for="telefono" class="m-0 form-label">Teléfono</label>
                    <input type="text" class="m-0 form-control" id="telefono" aria-describedby="emailHelp">
                </div>
                <div class="col-1">
                    <label for="celular" class="m-0 form-label">Celular</label>
                    <input type="text" class="m-0 form-control" id="celular" aria-describedby="emailHelp">
                </div>
                <div class="col-2">
                    <label for="correo" class="m-0 form-label">Correo Electrónico Personal</label>
                    <input type="email" class="small form-control" id="correo" aria-describedby="emailHelp">
                </div>
                <div class="col-2">
                    <label for="correo" class="m-0 form-label">Correo Institucional</label>
                    <input type="email_insti" class="small form-control" id="correo" aria-describedby="emailHelp">
                </div>
            </div>
            <br>
            <br>
            <h3 class="text-center">Domicilio Actual</h3>
            <hr style="width:100%;color:black" class="border border-5 mt-0">
            <div class="row">
                <div class="col-2">
                    <label for="calle" class="m-0 form-label">Calle</label>
                    <input type="text" class="small form-control" id="calle" aria-describedby="emailHelp">
                </div>    
                <div class="col-1">
                    <label for="num_ext" class="m-0 form-label">No. Exterior</label>
                    <input type="text" class="small form-control" id="num_ext" aria-describedby="emailHelp">
                </div>
                <div class="col-1">
                    <label for="num_int" class="m-0 form-label">No. Interior</label>
                    <input type="text" class="small form-control" id="num_int" aria-describedby="emailHelp">
                </div>
                <div class="col-2">
                    <label for="colonia" class="m-0 form-label">Colonia</label>
                    <input type="text" class="mid form-control" id="colonia" aria-describedby="emailHelp">
                </div>
                <div class="col-1">
                    <label for="codigo_postal" class="m-0 form-label">Código Postal</label>
                    <input type="text" class=" form-control" id="codigo_postal" aria-describedby="emailHelp">
                </div>
                <div class="col-2">
                    <label class="m-0 form-label">Ciudad</label>
                    <input class="form-control" type="text" name="">
                </div>
                <div class="col-2">
                    <label class="m-0 form-label">Estado</label>
                    <input class="form-control" type="text" name="">
                </div>
            </div>
            <br>
            <br>
            <h3 class="text-center">Domicilio Permanente</h3>
            <hr style="width:100%;color:black" class="border border-5 mt-0">
            <div class="row">
                <div class="col-2">
                    <label for="calle" class="m-0 form-label">Calle</label>
                    <input type="text" class="small form-control" id="calle" aria-describedby="emailHelp" disabled>
                </div>    
                <div class="col-1">
                    <label for="num_ext" class="m-0 form-label">No. Exterior</label>
                    <input type="text" class="small form-control" id="num_ext" aria-describedby="emailHelp" disabled>
                </div>
                <div class="col-1">
                    <label for="num_int" class="m-0 form-label">No. Interior</label>
                    <input type="text" class="small form-control" id="num_int" aria-describedby="emailHelp" disabled>
                </div>
                <div class="col-2">
                    <label for="colonia" class="m-0 form-label">Colonia</label>
                    <input type="text" class="mid form-control" id="colonia" aria-describedby="emailHelp" disabled>
                </div>
                <div class="col-1">
                    <label for="codigo_postal" class="m-0 form-label">Código Postal</label>
                    <input type="text" class=" form-control" id="codigo_postal" aria-describedby="emailHelp" disabled>
                </div>
                <div class="col-2">
                    <label class="m-0 form-label">Ciudad</label>
                    <input class="form-control" type="text" name="" disabled>
                </div>
                <div class="col-2">
                    <label class="m-0 form-label">Estado</label>
                    <input class="form-control" type="text" name="" disabled>
                </div>
            </div>
            <br>
            <br>
            <div class="row d-flex justify-content-end">
                <div class="ml-2 ">
                    <button disabled id="guardar" style="margin-right:10px;margin-bottom:10px;" type="button" class="btn-sm bg-dark">Guardar</button>
                    <button disabled id="modificar" style="margin-right:10px;margin-bottom:10px;" type="button" class="btn-sm bg-dark">Modificar</button>
                </div>
            </div>
            <br>
            <br>
        </div>
        <br>
        <div class="mb-2 d-flex flex-sm-row flex-column align-items-center justify-content-end">
            <button disabled id="guardar" style="width:min(150px, 100%);margin-right:10px;margin-bottom:10px;" type="button" class="btn-sm bg-dark">Guardar</button>
            <button disabled id="modificar" style="width:min(150px, 100%);margin-right:10px;margin-bottom:10px;" type="button" class="btn-sm bg-dark">Modificar</button>
        </div>
    </div>
<!--Tab antecedentes-->
    <div class="p-3 tab-pane fade" id="nav-antecedentes" role="tabpanel" aria-labelledby="nav-licenciatura-tab">
        <div class="border border-5 shadow p-3" id="">
            <h3 class="text-center">Licenciatura</h3>
            <hr style="width:100%;color:black" class="border border-5 mt-0">
            <div class="row">
                <div class="col-3">
                    <label for="universidad" class="m-0 form-label">Universidad</label>
                    <select id="universidad" class="form-select form-control" aria-label="universidad">
                        <option selected>universidad</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                    </select>
                </div>
                <div class="col-4">
                    <label for="escuela_facultad" class="m-0 form-label">Escuela y/o Facultad</label>
                    <select id="escuela_facultad" class="form-select form-control" aria-label="escuela_facultad">
                        <option selected>facultad</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                    </select>
                </div>
                <div class="col-4">
                    <label for="licenciatura" class="m-0 form-label">Licenciatura</label>
                    <select id="licenciatura" class="form-select form-control" aria-label="licenciatura">
                        <option selected>licenciatura</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                    </select>
                </div>
                
            </div>
            <br>
            <div class="row">
                <div class="col-2">
                    <label for="licenciatura" class="m-0 form-label">Número de cédula</label>
                    <input type="text" class="mid form-control" id="licenciatura" aria-describedby="emailHelp">
                </div>
            </div>
            <br>
            <div class="row d-flex justify-content-end">
                
                <div class="ml-2 ">
                    <button disabled id="guardar" style="margin-right:10px;margin-bottom:10px;" type="button" class="btn-sm bg-dark">Guardar</button>
                    <button disabled id="modificar" style="margin-right:10px;margin-bottom:10px;" type="button" class="btn-sm bg-dark">Modificar</button>
                </div>
            </div>
            <h3 class="text-center">Posgrado</h3>
            <hr style="width:100%;color:black" class="border border-5 mt-0">
            <div class="row">
                <div class="col-3">
                    <label for="universidad_posgrado" class="m-0 form-label">Universidad</label>
                    <select id="universidad_posgrado" class="form-select form-control" aria-label="universidad_posgrado">
                        <option selected>universidad posgrado</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                    </select>
                </div>
                <div class="col-3">
                    <label for="escuela_facultad_posgrado" class="m-0 form-label">Escuela y/o Facultad</label>
                    <select id="escuela_facultad_posgrado" class="form-select form-control" aria-label="escuela_facultad_posgrado">
                        <option selected>facultad posgrado</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                    </select>
                </div>   
            </div>
            <br>
            <div class="row">
                <div class="col-3">
                    <label for="posgrado_alumno" class="m-0 form-label">Posgrado</label>
                    <select id="posgrado_alumno" class="form-select form-control" aria-label="posgrado_alumno">
                        <option selected>posgrado</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                    </select>
                </div>
                <div class="col-2">
                    <label for="fecha_titulacion" class="m-0 form-label">Fecha de Titulación</label>
                    <input type="date" class="mid form-control" id="fecha_titulacion" aria-describedby="emailHelp">
                </div>
                <div class="col-1">
                    <label for="libro" class="m-0 form-label">Libro</label>
                    <input type="text" class="mid form-control" id="libro" aria-describedby="emailHelp">
                </div>   
                <div class="col-1">
                    <label for="acta" class="m-0 form-label">Acta</label>
                    <input type="text" class="mid form-control" id="acta" aria-describedby="emailHelp">
                </div>
                <div class="col-2">
                    <div class="m-0">
                        <label for="periodo_posgrado_incio" class="m-0 form-label">Periodo</label>
                        <div class="row">
                            <div class="col-4">
                                <input type="number" class="m-0 form-control" id="periodo_posgrado_incio" aria-describedby="emailHelp" min="1900" max="2099" value="2015">
                            </div>
                            <label class="col-1">-</label>
                            <div class="col-4">
                                <input type="number" class="m-0 form-control" id="periodo_posgrado_fin" aria-describedby="emailHelp" min="1900" max="2099" value="2016">
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <label for="numero_cedeula" class="m-0 form-label">Número de cédula</label>
                    <input type="text" class="mid form-control" id="numero_cedeula" aria-describedby="emailHelp">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-3">
                    <label for="estado_titulacion" class="m-0 form-label">Estado de Titulación</label>
                    <input type="text" class="mid form-control" id="estado_titulacion" aria-describedby="emailHelp">
                </div>
                <div class="col-3">
                    <label for="opcion_titulacion" class="m-0 form-label">Opción de Titulación</label>
                    <select id="opcion_titulacion" class="form-select form-control" aria-label="opcion_titulacion">
                        <option selected>opcion titulacion</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="row d-flex justify-content-end">
                <div class="mr-5">
                    <button  id="nuevo_pos" type="button" class="btn bg-dark"><i class="fas fa-folder-plus" data-toggle="modal" data-target="#nuevoPosgrado"></i></button>
                </div>
            </div>
            <br>
            <div class="table-responsive">
                <table class="table table-bordered table-striped dataTable dtr-inline tabla_posgrado">
                    <thead>
                        <tr>
                            <th>Nivel</th>
                            <th>Posgrado</th>
                            <th>Facultad</th>
                            <th>Universidad</th>
                            <th>Edicion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-center" width="10px"><a href="#" class="m-0 btn btn-info"> <i class="fas fa-pencil-alt"></i></a></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-center" width="10px"><a href="#" class="m-0 btn btn-info"> <i class="fas fa-pencil-alt"></i></a></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-center" width="10px"><a href="#" class="m-0 btn btn-info"> <i class="fas fa-pencil-alt"></i></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!--Modal nuevo pos-->
<div class="modal fade" id="nuevoPosgrado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ingrese los datos del Posgrado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-3">
                <label for="posgrado_alumno" class="m-0 form-label">Posgrado</label>
                <select id="posgrado_alumno" class="form-select form-control" aria-label="posgrado_alumno">
                    <option selected>posgrado</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                </select>
            </div>
            <div class="col-2">
                <label for="fecha_titulacion" class="m-0 form-label">Fecha de Titulación</label>
                <input type="date" class="mid form-control" id="fecha_titulacion" aria-describedby="emailHelp">
            </div>
            <div class="col-1">
                <label for="libro" class="m-0 form-label">Libro</label>
                <input type="text" class="mid form-control" id="libro" aria-describedby="emailHelp">
            </div>   
            <div class="col-1">
                <label for="acta" class="m-0 form-label">Acta</label>
                <input type="text" class="mid form-control" id="acta" aria-describedby="emailHelp">
            </div>
            <div class="col-3">
                <div class="m-0">
                    <label for="periodo_posgrado_incio" class="m-0 form-label">Periodo</label>
                    <div class="row">
                        <div class="col-5">
                            <input type="number" class="m-0 form-control" id="periodo_posgrado_incio" aria-describedby="emailHelp" min="1900" max="2099" value="2015">
                        </div>
                        <label class="col-1">-</label>
                        <div class="col-5">
                            <input type="number" class="m-0 form-control" id="periodo_posgrado_fin" aria-describedby="emailHelp" min="1900" max="2099" value="2016">
                        </div> 
                    </div>
                </div>
            </div>
            <div class="col-2">
                <label for="numero_cedeula" class="m-0 form-label">Número de cédula</label>
                <input type="text" class="mid form-control" id="numero_cedeula" aria-describedby="emailHelp">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-3">
                <label for="estado_titulacion" class="m-0 form-label">Estado de Titulación</label>
                <input type="text" class="mid form-control" id="estado_titulacion" aria-describedby="emailHelp">
            </div>
            <div class="col-3">
                <label for="opcion_titulacion" class="m-0 form-label">Opción de Titulación</label>
                <select id="opcion_titulacion" class="form-select form-control" aria-label="opcion_titulacion">
                    <option selected>opcion titulacion</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                </select>
            </div>
        </div>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>     
        label{
            font-weight: 400!important;
        }
    </style>
@stop

@section('js')
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

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