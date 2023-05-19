@extends('adminlte::page')


@section('title', 'Dashboard')

@section('content_header')
    <!--
        <h1>Dashboard</h1>
    -->
@stop

@section('content')

<div class="w-100 d-flex align-items-center justify-content-end">
    <div class="w-100 d-flex flex-row align-items-center">
        <div class="w-50 d-flex flex-sm-row flex-column">
            <button data-toggle="modal" data-target="#modal_horario_calificaciones" id="horario_calificaciones" style="width:min(150px, 100%);margin-right:10px;margin-bottom:10px;" type="button" class="btn-sm bg-dark">Horario y Calificaciones</button>
            <button data-toggle="modal" data-target="#modal_bitacora_portal_alumnos" id="bitacora_portal_alumnos" style="width:min(150px, 100%);margin-right:10px;margin-bottom:10px;" type="button" class="btn-sm bg-dark">Bitácora del Portal de Alumnos</button>
            <button disabled id="imprimir_portada" style="width:min(150px, 100%);margin-right:10px;margin-bottom:10px;" type="button" class="btn-sm bg-dark"><i class="bi bi-printer-fill" style="margin-right: 10px"></i>Imprimir Portada</button>
        </div> 

        <div class="w-50 d-flex flex-row align-items-center justify-content-end">
            <div>
                <form id="busquedaAlumno" class="input-group rounded" style="margin-right: 10px">
                    @csrf
                    <div class="d-flex flex-row align-items-end">
                        <input name="clave_unicaSearch" type="search" class="form-control rounded" placeholder="Buscar" aria-label="Search" aria-describedby="search-addon" />
                        <button type="submit" class="input-group-text border-0 h-100" id="search-addon">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>

            <div>
                <button style="border rounded-circle width:min(150px, 100%);" type="button" class="btn-sm bg-dark"><i class="bi bi-plus"></i></button>
            </div>
        </div>
    </div>
</div>

<nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Alumno</button>
      <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Contacto</button>
      <button class="nav-link" id="nav-contact-tab" data-toggle="tab" data-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Academico</button>
    </div>
</nav>

<div class="tab-content" id="nav-tabContent">

    <div class="p-3 tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <div class="w-100 row p-0 m-0 h-100" id="">

            <div class="border border-5 shadow p-3 mb-3 col-12 d-flex flex-sm-row flex-column align-items-center justify-content-around">
                <div style="height:150px;width:min(150px, 100%)!important;" class="me-2">
                    <img src="{{ asset('img/usuario.svg')}}" alt="">

                </div>
                <div class="row m-0 p-0 w-75">

                    <div class="col-sm-6 col-12">
                        <label for="clave_uaslp" class="m-0 form-label">Clave UASLP</label>
                        <input type="text" class="small form-control" id="clave_uaslp">
                    </div>

                    <div class="col-sm-6 col-12">
                        <label for="clave_ingenieria" class="m-0 form-label">Clave Ingeniería</label>
                        <input type="text" class="mid form-control" id="clave_ingenieria">
                    </div>

                    <div class="col-sm-6 col-12">
                        <label for="carrera" class="m-0 form-label">Carrera</label>
                        <select id="carrera" class="form-select form-control" aria-label="Carrera">
                            <option selected>Carrera</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>

                    <div class="col-sm-6 col-12">
                        <label for="ciclo_escolar" class="m-0 form-label">Ciclo Escolar</label>
                        <input type="text" class=" form-control" id="ciclo_escolar">
                    </div>

                    <hr style="width:100%;color:black" class="border border-5 mt-1 mb-1">


                    <div class="col-sm-6 col-12">
                        <label for="nombre" class="m-0 form-label">Nombre</label>
                        <input type="text" class=" form-control" id="nombre">
                    </div>

                    <div class="col-sm-6 col-12">
                        <label for="nombres" class="m-0 form-label">Nombres</label>
                        <input type="text" class=" form-control" id="nombres">
                    </div>

                    <div class="col-sm-6 col-12">
                        <label for="apellido_paterno" class="m-0 form-label">Apellido Paterno</label>
                        <input type="text" class=" form-control" id="apellido_paterno">
                    </div>
                    <div class="col-sm-6 col-12">
                        <label for="apellido_materno" class="m-0 form-label">Apellido Materno</label>
                        <input type="text" class=" form-control" id="apellido_materno">
                    </div>


                    <div class="col-sm-6 col-12">
                        <label for="sexo" class="m-0 form-label">Sexo</label>
                        <select id="sexo" class="form-select form-control" aria-label="sexo">
                            <option selected>sexo</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                        </select>
                    </div>

                    <div class="col-sm-6 col-12">
                        <label for="fecha_nacimiento" class="m-0 form-label">Fecha de Nacimiento</label>
                        <input type="date" class=" form-control" id="fecha_nacimiento">
                    </div>

                    <div class="col-sm-6 col-12">
                        <label for="curp" class="m-0 form-label">Curp</label>
                        <input type="text" class="mid form-control" id="curp">
                    </div>
                </div>
            </div>


            <div class="border border-5 shadow p-3 mb-3 col-lg-6 col-12 m-0 d-flex align-items-center justify-content-around">
                <div class="row w-75">
                    <div class="col-12">
                        <label for="situacion" class="m-0 form-label">Situación</label>
                        <input type="text" class=" form-control" id="situacion">
                    </div>

                    <div class="col-sm-6 col-12">
                        <label for="fecha_situacion" class="m-0 form-label">Fecha de la Situación</label>
                        <input type="date" class="mid form-control" id="fecha_situacion">
                    </div>

                    <div class="col-12">
                        <label for="condicion" class="m-0 form-label">Condición</label>
                        <input type="text" class="small form-control" id="condicion">
                    </div>
                </div>
            </div>

            <div class="border border-5 shadow p-3 mb-3 col-lg-6 col-12 row m-0 d-flex flex-column align-items-center justify-content-around">
                <div class="d-flex flex-sm-row flex-column align-items-center justify-content-around">
                    <div class="row m-0 p-0 w-75">
                        <div class="w-auto col-12">
                            <label for="afiliacion_imss" class="m-0 form-label">No. de Afiliación IMSS</label>
                            <input type="text" class="w-100 m-0 small form-control" id="afiliacion_imss">
                        </div>
  
                        <div class="col-12">
                            <label for="unidad_medicina" class="m-0 form-label">Unidad de Medicina Familiar</label>
                            <input type="text" class="small form-control" id="unidad_medicina">
                        </div>
                    </div>
                </div>
            </div>
            <div class="border border-5 shadow p-3 mb-3 col-lg-6 col-12 row m-0 d-flex flex-column">
                
                    <div class="d-flex flex-column align-items-center justify-content-center">
                        <div style="height:150px;width:min(150px, 100%)!important;display:block!important;" class="me-2">
                            <img src="{{ asset('img/usuario.svg')}}" alt="">
                        </div>

                        <div class="d-flex flex-column align-items-center justify-content-center" style="width: min(250px, 100%)">
                            <label for="nombre_asesor" class="m-0 form-label">Nombre del Asesor</label>
                            <select id="nombre_asesor" class="form-select form-control" aria-label="nombre_asesor">
                                <option selected>nombre_asesor</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                            </select>
                            <button id="cambio_asesor" style="width:min(150px, 100%);margin-right:10px;margin-bottom:10px;" type="button" class="mt-1 btn-sm bg-dark">Cambio Asesor</button>
                        </div>
                    </div>
                
            </div>
        </div>
        <div class="mb-2 d-flex flex-sm-row flex-column align-items-center justify-content-start">
            <button disabled id="guardar" style="width:min(150px, 100%);margin-right:10px;margin-bottom:10px;" type="button" class="btn-sm bg-dark">Guardar</button>
            <button disabled id="modificar" style="width:min(150px, 100%);margin-right:10px;margin-bottom:10px;" type="button" class="btn-sm bg-dark">Modificar</button>
        </div>
    </div>

    <div class="p-3 tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
        <div class="w-100 row p-0 m-0 h-100" id="">


            <div class="border border-5 shadow p-3 mb-3 col-lg-6 col-12 m-0 d-flex align-items-center justify-content-around">
                <div class="row m-0 p-0 w-75">

                    <div class="col-sm-6 col-12">
                        <label for="calle_numero" class="m-0 form-label">Calle y No.</label>
                        <input type="text" class="small form-control" id="calle_numero">
                    </div>

                    <div class="col-sm-6 col-12">
                        <label for="colonia" class="m-0 form-label">Colonia</label>
                        <input type="text" class="mid form-control" id="colonia">
                    </div>

                    <div class="col-sm-6 col-12">
                        <label for="codigo_postal" class="m-0 form-label">Código Postal</label>
                        <input type="text" class=" form-control" id="codigo_postal">
                    </div>

                    <div class="col-12">
                        <label for="ciudad_municipio" class="m-0 form-label">Ciudad y/o Municipio</label>
                        <input type="text" class=" form-control" id="ciudad_municipio">
                    </div>
                    
                    <div class=" col-12">
                        <label for="estado" class="m-0 form-label">Estado</label>
                        <input type="text" class=" form-control" id="estado">
                    </div>
                </div>
            </div>

            <div class="border border-5 shadow p-3 mb-3 col-lg-6 col-12 m-0 d-flex align-items-center justify-content-around">
                <div class="row m-0 p-0 w-75">

                    <div class="col-sm-6 col-12">
                        <label for="telefono" class="m-0 form-label">Teléfono</label>
                        <input type="text" class="small form-control" id="telefono">
                    </div>

                    <div class="col-sm-6 col-12">
                        <label for="celular" class="m-0 form-label">Teléfono Celular</label>
                        <input type="text" class="mid form-control" id="celular">
                    </div>

                    <div class=" col-12">
                        <label for="correo_personal" class="m-0 form-label">Correo Electrónico Personal</label>
                        <input type="email" class=" form-control" id="correo_personal">
                    </div>
                </div>
            </div>

            <h3 class="text-center">Tutor</h3>
            <hr style="width:100%;color:black" class="border border-5 mt-0">

            <div class="border border-5 shadow p-3 mb-3 col-12 m-0 d-flex align-items-center justify-content-around">
                <div class="row m-0 p-0 w-75">

                    <div class="col-sm-6 col-12">
                        <label for="padre" class="m-0 form-label">Padre o tutor</label>
                        <input type="text" class="small form-control" id="padre">
                    </div>

                    <div class="col-sm-6 col-12">
                        <label for="madre" class="m-0 form-label">Madre</label>
                        <input type="text" class="mid form-control" id="madre">
                    </div>
                </div>
            </div>

            <div class="border border-5 shadow p-3 mb-3 col-lg-6 col-12 m-0 d-flex align-items-center justify-content-around">
                <div class="row m-0 p-0 w-75">

                    <div class="col-sm-6 col-12">
                        <label for="calle_numero_tutor" class="m-0 form-label">Calle y No.</label>
                        <input type="text" class="small form-control" id="calle_numero_tutor">
                    </div>

                    <div class="col-sm-6 col-12">
                        <label for="colonia_tutor" class="m-0 form-label">Colonia</label>
                        <input type="text" class="mid form-control" id="colonia_tutor">
                    </div>

                    <div class="col-sm-6 col-12">
                        <label for="codigo_postal_tutor" class="m-0 form-label">Código Postal</label>
                        <input type="text" class=" form-control" id="codigo_postal_tutor">
                    </div>

                    <div class="col-12">
                        <label for="ciudad_municipio_tutor" class="m-0 form-label">Ciudad y/o Municipio</label>
                        <input type="text" class=" form-control" id="ciudad_municipio_tutor">
                    </div>
                    
                    <div class=" col-12">
                        <label for="estado_tutor" class="m-0 form-label">Estado</label>
                        <input type="text" class=" form-control" id="estado_tutor">
                    </div>
                </div>
            </div>

            <div class="border border-5 shadow p-3 mb-3 col-lg-6 col-12 m-0 d-flex align-items-center justify-content-around">
                <div class="row m-0 p-0 w-75">

                    <div class="col-sm-6 col-12">
                        <label for="telefono_tutor" class="m-0 form-label">Teléfono</label>
                        <input type="text" class="small form-control" id="telefono_tutor">
                    </div>

                    <div class="col-sm-6 col-12">
                        <label for="celular_tutor" class="m-0 form-label">Teléfono Celular</label>
                        <input type="text" class="mid form-control" id="celular_tutor">
                    </div>

                    <div class=" col-12">
                        <label for="correo_personal_tutor" class="m-0 form-label">Correo Electrónico Personal</label>
                        <input type="email" class=" form-control" id="correo_personal_tutor">
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-2 d-flex flex-sm-row flex-column align-items-center justify-content-start">
            <button disabled id="guardar" style="width:min(150px, 100%);margin-right:10px;margin-bottom:10px;" type="button" class="btn-sm bg-dark">Guardar</button>
            <button disabled id="modificar" style="width:min(150px, 100%);margin-right:10px;margin-bottom:10px;" type="button" class="btn-sm bg-dark">Modificar</button>
        </div>
    </div>


    <div class="p-3 tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
        <div class="w-100 row p-0 m-0 h-100" id="">


            <div class="border border-5 shadow p-3 mb-3 col-lg-6 col-12 m-0 d-flex align-items-center justify-content-around">
                <div class="row m-0 p-0 w-75">

                    <div class="col-sm-6 col-12">
                        <label for="secundaria" class="m-0 form-label">Secundaria</label>
                        <input type="text" class="small form-control" id="secundaria">
                    </div>

                    <div class="col-sm-6 col-12">
                        <label for="ciudad_secundaria" class="m-0 form-label">Ciudad</label>
                        <input type="text" class=" form-control" id="ciudad_secundaria">
                    </div>

                    <hr style="width:100%;color:black" class="border border-5 mt-1 mb-1">

                    <div class="col-12">
                        <label for="bachillerato" class="m-0 form-label">Bachillerato</label>
                        <input type="text" class=" form-control" id="bachillerato">
                    </div>

                    <div class="col-sm-6 col-12">
                        <label for="ciudad_bachillerato" class="m-0 form-label">Ciudad</label>
                        <input type="text" class=" form-control" id="ciudad_bachillerato">
                    </div>
                    
                    <div class="col-sm-6 col-12">
                        <label for="estado_bachillerato" class="m-0 form-label">Estado</label>
                        <input type="text" class=" form-control" id="estado_bachillerato">
                    </div>

                    <div class="col-sm-6 col-12">
                        <div class="d-flex flex-column">
                            <label for="periodo_bachillerato_incio" class="m-0 form-label">Periodo</label>
                            <div class="d-flex flex-column">
                                <div class="">
                                    <input type="date" class="mid form-control" id="periodo_bachillerato_incio">
                                </div>
                                <div class="">
                                    <input type="date" class="mid form-control" id="periodo_bachillerato_fin">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>

            <div class="border border-5 shadow p-3 mb-3 col-lg-6 col-12 m-0 d-flex align-items-center justify-content-around">
                <div class="row m-0 p-0 w-75">

                    <div class="col-sm-6 col-12" style="margin-right: 10px;">
                        <label for="fecha_pasante" class="m-0 form-label">Fecha de Pasante</label>
                        <input type="text" class="small form-control" id="fecha_pasante">
                    </div>

                    <div class="col-sm-6 col-12" >
                        <div class="d-flex flex-column">
                            <label for="periodo_pasante_incio" class="m-0 form-label">Periodo</label>
                            <div class="d-flex flex-column">
                                <div class="">
                                    <input type="date" class="mid form-control" id="periodo_pasante_incio">
                                </div>
                                <div class="">
                                    <input type="date" class="mid form-control" id="periodo_pasante_fin">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-6">
                        <div class="w-100 p-3 d-flex align-items-center justofy-content-center">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                            <label class="form-check-label" for="flexCheckChecked">
                               Portal del egresado
                            </label>
                        </div>
                    </div>


                    <div class="col-sm-6 col-12">
                        <label for="fecha_titulacion" class="m-0 form-label">Fecha de Titulación</label>
                        <input type="text" class="mid form-control" id="fecha_titulacion">
                    </div>

                    <div class="col-sm-2 col-6">
                        <label for="libro" class="m-0 form-label">Libro</label>
                        <input type="text" class="mid form-control" id="libro">
                    </div>

                    <div class="col-sm-2 col-6">
                        <label for="acta" class="m-0 form-label">Acta</label>
                        <input type="text" class="mid form-control" id="acta">
                    </div>

                    <div class="col-sm-6 col-12">
                        <label for="ciclo_escolar_horario" class="m-0 form-label">Estado de Titulación </label>
                        <input type="text" class=" form-control" id="estado:_titulacion">
                    </div>
                    <div class="col-sm-6 col-12">
                        <label for="opcion_titulacion" class="m-0 form-label">Opción de Titulación</label>
                        <select id="opcion_titulacion" class="form-select form-control" aria-label="opcion_titulacion">
                            <option selected>titulacion</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-2 d-flex flex-sm-row flex-column align-items-center justify-content-start">
            <button disabled id="guardar" style="width:min(150px, 100%);margin-right:10px;margin-bottom:10px;" type="button" class="btn-sm bg-dark">Guardar</button>
            <button disabled id="modificar" style="width:min(150px, 100%);margin-right:10px;margin-bottom:10px;" type="button" class="btn-sm bg-dark">Modificar</button>
        </div>
    </div>
</div>


<div class="modal fade" id="modal_horario_calificaciones" tabindex="-1" aria-labelledby="modal_horario_calificacionesLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_horario_calificacionesLabel">Horario y Calificaciones Parciales</h5>
        <button type="button" class="" styke="border:none;background-color:transparent;" data-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg"></i></button>
      </div>
      <div class="modal-body">
        <form class="w-100 d-flex align-items-center justify-content-start">
            <div class=" d-flex flex-sm-row flex-column border border-1 w-100 p-3">
                <div class="d-flex flex-wrap">
                    <div class="" style="margin-right: 10px">
                        <label for="clave_uaslp_horario" class="m-0 form-label">Clave UASLP</label>
                        <input type="text" class=" form-control" id="clave_uaslp_horario">
                    </div>
                    <div class="" style="margin-right: 10px">
                        <label for="clave_ingenieria_horario" class="m-0 form-label">Clave Ingeniería</label>
                        <input type="text" class=" form-control" id="clave_ingenieria_horario">
                    </div>
                    <div class="" style="margin-right: 10px">
                        <label for="nombre_horario" class="m-0 form-label">Nombre</label>
                        <input type="text" class=" form-control" id="nombre_horario">
                    </div>
                    <div class="" style="margin-right: 10px">
                        <label for="ciclo_escolar_horario" class="m-0 form-label">Ciclo Escolar</label>
                        <select id="ciclo_escolar_horario" class="form-select form-control" aria-label="Default select example">
                            <option selected>ciclo escolar</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
                <div class="d-flex align-items-end justify-content-start mt-1">
                    <button id="buscar" style="width:min(150px, 100%);margin-right:10px;margin-bottom:10px;" type="button" class="px-5 m-0 btn-sm bg-dark">Buscar</button>
                </div>
            </div>
        </form>

        <div class="p-3 w-100">
            <div style="height: 200px;overflow:scroll;">
                <table class="table table-bordered ">
                    <thead class="table-primary">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Grupo</th>
                        <th scope="col">Clave</th>
                        <th scope="col">Créditos</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Hora</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Materia</th>

                        <th scope="col">Lun</th>
                        <th scope="col">Mar</th>
                        <th scope="col">Mié</th>
                        <th scope="col">Jue</th>
                        <th scope="col">Vie</th>
                        <th scope="col">Sáb</th>
                        <th scope="col">Salón</th>
                        <th scope="col">RPE</th>
                        <th scope="col">Profesor</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>282002</td>
                        <td>2820</td>
                        <td>0</td>
                        <td>IN</td>
                        <td>2018/01/15</td>
                        <td>13:53:48</td>
                        <td>L</td>
                        <td  >Laboratorio de Redes A</td>

                        <td>0</td>
                        <td>13</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        
                        <td>H-LR</td>
                        <td>24665</td>
                        <td >AVALOS MORALES ERENDIRA MAGDALENA</td>
                      </tr>

                      <tr>
                        <th scope="row">1</th>
                        <td>282002</td>
                        <td>2820</td>
                        <td>0</td>
                        <td>IN</td>
                        <td>2018/01/15</td>
                        <td>13:53:48</td>
                        <td>L</td>
                        <td  >Laboratorio de Redes A</td>

                        <td>0</td>
                        <td>13</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        
                        <td>H-LR</td>
                        <td>24665</td>
                        <td >AVALOS MORALES ERENDIRA MAGDALENA</td>
                      </tr>


                      <tr>
                        <th scope="row">1</th>
                        <td>282002</td>
                        <td>2820</td>
                        <td>0</td>
                        <td>IN</td>
                        <td>2018/01/15</td>
                        <td>13:53:48</td>
                        <td>L</td>
                        <td  >Laboratorio de Redes A</td>

                        <td>0</td>
                        <td>13</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        
                        <td>H-LR</td>
                        <td>24665</td>
                        <td >AVALOS MORALES ERENDIRA MAGDALENA</td>
                      </tr>


                      <tr>
                        <th scope="row">1</th>
                        <td>282002</td>
                        <td>2820</td>
                        <td>0</td>
                        <td>IN</td>
                        <td>2018/01/15</td>
                        <td>13:53:48</td>
                        <td>L</td>
                        <td  >Laboratorio de Redes A</td>

                        <td>0</td>
                        <td>13</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        
                        <td>H-LR</td>
                        <td>24665</td>
                        <td >AVALOS MORALES ERENDIRA MAGDALENA</td>
                      </tr>


                      <tr>
                        <th scope="row">1</th>
                        <td>282002</td>
                        <td>2820</td>
                        <td>0</td>
                        <td>IN</td>
                        <td>2018/01/15</td>
                        <td>13:53:48</td>
                        <td>L</td>
                        <td  >Laboratorio de Redes A</td>

                        <td>0</td>
                        <td>13</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        
                        <td>H-LR</td>
                        <td>24665</td>
                        <td >AVALOS MORALES ERENDIRA MAGDALENA</td>
                      </tr>


                      <tr>
                        <th scope="row">1</th>
                        <td>282002</td>
                        <td>2820</td>
                        <td>0</td>
                        <td>IN</td>
                        <td>2018/01/15</td>
                        <td>13:53:48</td>
                        <td>L</td>
                        <td  >Laboratorio de Redes A</td>

                        <td>0</td>
                        <td>13</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        
                        <td>H-LR</td>
                        <td>24665</td>
                        <td >AVALOS MORALES ERENDIRA MAGDALENA</td>
                      </tr>
                    </tbody>
                  </table>
            </div>
        </div>

        <div class="p-3 w-100">
            <div style="height: 200px;overflow:scroll;">
                <table class="table table-bordered ">
                    <thead class="table-primary">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Grupo</th>
                        <th scope="col">Clave</th>
                        <th scope="col">Créditos</th>
                        <th scope="col">Materia</th>

                        <th scope="col">P1</th>
                        <th scope="col">F1</th>
                        <th scope="col">P2</th>
                        <th scope="col">F2</th>
                        <th scope="col">P3</th>
                        <th scope="col">F3</th>
                        <th scope="col">P4</th>
                        <th scope="col">F4</th>
                        <th scope="col">P5</th>
                        <th scope="col">F5</th>
                        <th scope="col">LAB</th>
                        <th scope="col">EO</th>
                        <th scope="col">Fecha EO</th>
                        <th scope="col">EE</th>
                        <th scope="col">Fecha EE</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>282002</td>
                        <td>2820</td>
                        <td>0</td>
                        <td  >Laboratorio de Redes A</td>

                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        
                        <td></td>
                        <td></td>
                        <td></td>

                        <td></td>
                        <td></td>
                      </tr>

                      <tr>
                        <th scope="row">1</th>
                        <td>282002</td>
                        <td>2820</td>
                        <td>0</td>
                        <td  >Laboratorio de Redes A</td>

                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        
                        <td></td>
                        <td></td>
                        <td></td>

                        <td></td>
                        <td></td>
                      </tr>


                      <tr>
                        <th scope="row">1</th>
                        <td>282002</td>
                        <td>2820</td>
                        <td>0</td>
                        <td  >Laboratorio de Redes A</td>

                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        
                        <td></td>
                        <td></td>
                        <td></td>

                        <td></td>
                        <td></td>
                      </tr>


                      <tr>
                        <th scope="row">1</th>
                        <td>282002</td>
                        <td>2820</td>
                        <td>0</td>
                        <td  >Laboratorio de Redes A</td>

                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        
                        <td></td>
                        <td></td>
                        <td></td>

                        <td></td>
                        <td></td>
                      </tr>


                      <tr>
                        <th scope="row">1</th>
                        <td>282002</td>
                        <td>2820</td>
                        <td>0</td>
                        <td  >Laboratorio de Redes A</td>

                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        
                        <td></td>
                        <td></td>
                        <td></td>

                        <td></td>
                        <td></td>
                      </tr>



                      <tr>
                        <th scope="row">1</th>
                        <td>282002</td>
                        <td>2820</td>
                        <td>0</td>
                        <td  >Laboratorio de Redes A</td>

                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        
                        <td></td>
                        <td></td>
                        <td></td>

                        <td></td>
                        <td></td>
                      </tr>



                      <tr>
                        <th scope="row">1</th>
                        <td>282002</td>
                        <td>2820</td>
                        <td>0</td>
                        <td  >Laboratorio de Redes A</td>

                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
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
        </div>


        <div class=" d-flex flex-row align-items-center justify-content-between border border-1 w-100 p-3">
            <div class="d-flex flex-row align-items-center">
                <div class="d-flex align-items-end justify-content-start mt-1" style="margin-right: 10px;">
                    <button id="imprimir" style="width:min(150px, 100%);margin-right:10px;margin-bottom:10px;" type="button" class="px-5 m-0 btn-sm bg-dark">Imprimir</button>
                </div>
                <div class="d-flex align-items-end justify-content-start mt-1">
                    <button id="exportar" style="width:min(150px, 100%);margin-right:10px;margin-bottom:10px;" type="button" class="px-5 m-0 btn-sm bg-dark">Exportar</button>
                </div>
            </div>
            <div class="d-flex align-items-end justify-content-start mt-1">
                <button id="salir" style="width:min(150px, 100%);margin-right:10px;margin-bottom:10px;" type="button" class="px-5 m-0 btn-sm bg-dark" class="btn-close" data-dismiss="modal" aria-label="Close">Salir</button>
            </div>
        </div>

      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_bitacora_portal_alumnos" tabindex="-1" aria-labelledby="modal_bitacora_portal_alumnosLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Bitácora del Portal de Alumnos</h5>
          <button type="button" class="" styke="border:none;background-color:transparent;" data-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg"></i></button>
        </div>
        <div class="modal-body">
          
          <div class="p-3 w-100">
            <div style="height: 500px;overflow:scroll;">
                <table class="table table-bordered ">
                    <thead class="table-primary">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Folio</th>
                        <th scope="col">Dirección IP</th>
                        <th scope="col">Fecha y Hora</th>
                        <th scope="col">Operación</th>
                        <th scope="col">Observación</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td >13055502</td>
                        <td >148.224.51.112</td>
                        <td >2018/01/22 07:29:48</td>
                        <td >CERRAR SESION</td>
                        <td >Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                        
                      </tr>

                      <tr>
                        <th scope="row">1</th>
                        <td >13055502</td>
                        <td >148.224.51.112</td>
                        <td >2018/01/22 07:29:48</td>
                        <td >CERRAR SESION</td>
                        <td >Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                        
                      </tr>

                      <tr>
                        <th scope="row">1</th>
                        <td >13055502</td>
                        <td >148.224.51.112</td>
                        <td >2018/01/22 07:29:48</td>
                        <td >CERRAR SESION</td>
                        <td >Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                        
                      </tr>


                      <tr>
                        <th scope="row">1</th>
                        <td >13055502</td>
                        <td >148.224.51.112</td>
                        <td >2018/01/22 07:29:48</td>
                        <td >CERRAR SESION</td>
                        <td >Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                        
                      </tr>


                      <tr>
                        <th scope="row">1</th>
                        <td >13055502</td>
                        <td >148.224.51.112</td>
                        <td >2018/01/22 07:29:48</td>
                        <td >CERRAR SESION</td>
                        <td >Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                        
                      </tr>


                      <tr>
                        <th scope="row">1</th>
                        <td >13055502</td>
                        <td >148.224.51.112</td>
                        <td >2018/01/22 07:29:48</td>
                        <td >CERRAR SESION</td>
                        <td >Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                        
                      </tr>


                      <tr>
                        <th scope="row">1</th>
                        <td >13055502</td>
                        <td >148.224.51.112</td>
                        <td >2018/01/22 07:29:48</td>
                        <td >CERRAR SESION</td>
                        <td >Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                        
                      </tr>

                      <tr>
                        <th scope="row">1</th>
                        <td >13055502</td>
                        <td >148.224.51.112</td>
                        <td >2018/01/22 07:29:48</td>
                        <td >CERRAR SESION</td>
                        <td >Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                        
                      </tr>

                      <tr>
                        <th scope="row">1</th>
                        <td >13055502</td>
                        <td >148.224.51.112</td>
                        <td >2018/01/22 07:29:48</td>
                        <td >CERRAR SESION</td>
                        <td >Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                        
                      </tr>


                      <tr>
                        <th scope="row">1</th>
                        <td >13055502</td>
                        <td >148.224.51.112</td>
                        <td >2018/01/22 07:29:48</td>
                        <td >CERRAR SESION</td>
                        <td >Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                        
                      </tr>


                      <tr>
                        <th scope="row">1</th>
                        <td >13055502</td>
                        <td >148.224.51.112</td>
                        <td >2018/01/22 07:29:48</td>
                        <td >CERRAR SESION</td>
                        <td >Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                        
                      </tr>


                      <tr>
                        <th scope="row">1</th>
                        <td >13055502</td>
                        <td >148.224.51.112</td>
                        <td >2018/01/22 07:29:48</td>
                        <td >CERRAR SESION</td>
                        <td >Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                        
                      </tr>


                      <tr>
                        <th scope="row">1</th>
                        <td >13055502</td>
                        <td >148.224.51.112</td>
                        <td >2018/01/22 07:29:48</td>
                        <td >CERRAR SESION</td>
                        <td >Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                        
                      </tr>
                    </tbody>
                  </table>
            </div>
          </div>
          
          <div class=" d-flex flex-row align-items-center justify-content-end border border-1 w-100 p-3">
              <div class="">
                  <button id="salir" style="width:min(150px, 100%);margin-right:10px;margin-bottom:10px;" type="button" class="px-5 m-0 btn-sm bg-dark" class="btn-close" data-dismiss="modal" aria-label="Close">Salir</button>
              </div>
          </div>
  
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>        
        label{
            font-weight: 400!important;
        }
        td, th{
            white-space: nowrap;
        }
    </style>
@stop

@section('js')
   
@stop