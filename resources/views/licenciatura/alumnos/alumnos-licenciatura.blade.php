@extends('adminlte::page')
@extends('modalAlumnos')
@extends('subirFotoPerfil')

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
      <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-datos_generales" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Datos Generales</button>
      <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-domicilio" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Contacto y Domicilio</button>
      <button class="nav-link" id="nav-contact-tab" data-toggle="tab" data-target="#nav-academico" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Antecedente Academico</button>
      <button class="nav-link" id="nav-contact-tab" data-toggle="tab" data-target="#nav-egreso" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Datos de Egreso</button>
    </div>
</nav>

<!--Tabs-->
<div class="tab-content" id="nav-tabContent">
    <!--Tab alumno-->
    <div class="p-3 tab-pane fade show active" id="nav-datos_generales" role="tabpanel" aria-labelledby="nav-home-tab">
        <div class="border border-5 p-3">
            <div class="row">
                <div class="col-1">
                    <div class="input-group">
                        <img src="{{$url_img_perfil}}" class="img-fluid" alt="">
                        <div class="container custom-image-css" data-toggle="modal" data-target="#modalSubirImagen">
                            <label ><i class="fas fa-camera"></i></label>
                        </div>
                    </div>
                </div>
                <div class="col-11">
                    <div class="row"> 
                        <div class="col-2">
                            <div class="">
                                <label for="clave_uaslp" class="form-label">Clave UASLP:</label>
                                <input type="text" class="form-control" id="clave_uaslp">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="">
                                <label for="clave_ingenieria" class="form-label">Clave Ingeniería</label>
                                <input type="text" class="form-control" id="clave_ingenieria">
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="carrera" class="form-label">Carrera</label>
                            <select id="carrera" class="form-select form-control" aria-label="Carrera">
                                <option selected>Carrera</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-2">
                            <label for="ciclo_escolar" class="form-label">Ciclo Escolar</label>
                            <input type="text" class=" form-control" id="ciclo_escolar">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <!---<div class="col-1"></div>---->
                        <div class="col-3">
                            <label for="situacion" class="m-0 form-label">Situación</label>
                            <input type="text" class=" form-control" id="situacion">
                        </div>
                        <div class="col-2">
                            <label for="fecha_situacion" class="m-0 form-label">Fecha de la Situación</label>
                            <input type="date" class="mid form-control" id="fecha_situacion">
                        </div>
                        <div class="col-2">
                            <label for="conducta" class="m-0 form-label">Conducta</label>
                            <input type="text" class="mid form-control" name="conducta">
                        </div>
                        <div class="col-3">
                            <label for="condicion" class="m-0 form-label">Condición</label>
                            <input type="text" class="small form-control" id="condicion">
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-4">
                    <label for="nombre" class="m-0 form-label">Nombre</label>
                    <input type="text" class=" form-control" id="nombre">
                </div>
                <div class="col-2">
                    <label for="nombres" class="m-0 form-label">Nombres</label>
                    <input type="text" class=" form-control" id="nombres">
                </div>
                <div class="col-2">
                    <label for="apellido_paterno" class="m-0 form-label">Apellido Paterno</label>
                    <input type="text" class=" form-control" id="apellido_paterno">
                </div>
                <div class="col-3">
                    <label for="apellido_materno" class="m-0 form-label">Apellido Materno</label>
                    <input type="text" class=" form-control" id="apellido_materno">
                </div>
            </div>
            <br>
            <div class="row">
                
                <div class="col-1">
                    <label for="sexo" class="m-0 form-label">Genero</label>
                    <select id="sexo" class="form-select form-control" aria-label="sexo">
                        <option selected>sexo</option>
                        <option value="1">Masculino</option>
                        <option value="2">Femenino</option>
                        <option value="3">Otro</option>
                    </select>
                </div>
                <div class="col-2">
                    <label for="fecha_nacimiento" class="m-0 form-label">Fecha de Nacimiento</label>
                    <input type="date" class=" form-control" id="fecha_nacimiento">
                </div>
                <div class="col-3">
                    <label for="curp" class="m-0 form-label">CURP</label>
                    <input type="text" class="mid form-control" id="curp">
                </div>
                <div class="col-3">
                    <label for="nombre_asesor" class="m-0 form-label">Nombre del Asesor</label>
                    <select id="nombre_asesor" class="form-select form-control" aria-label="nombre_asesor">
                        <option selected>nombre_asesor</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                    </select>
                </div>
                <div class="col-2">
                    <br>
                    <button id="cambio_asesor" style="width:min(150px, 100%);margin-right:10px;margin-bottom:10px;" type="button" class="form-control m-0 btn-sm bg-dark">Cambio de Asesor</button>
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
                    <label class="m-0 form-label">Estado Civil</label>
                    <select class="form-control form-select">
                        <option>Soltero/a</option>
                        <option>Casado/a</option>
                        <option>Divorciado/a</option>
                        <option>Viudo/a</option>
                        <option>Separado/a</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-2">
                    <label>Habla alguna lengua indigena</label>
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
        <br>
        <div class="mb-2 d-flex flex-sm-row flex-column align-items-center justify-content-end">
            <button disabled id="guardar" style="width:min(150px, 100%);margin-right:10px;margin-bottom:10px;" type="button" class="btn-sm bg-dark">Guardar</button>
            <button disabled id="modificar" style="width:min(150px, 100%);margin-right:10px;margin-bottom:10px;" type="button" class="btn-sm bg-dark">Modificar</button>
        </div>
    </div>

    <!--Tab Domicilio y Tutor-->
    <div class="p-3 tab-pane fade" id="nav-domicilio" role="tabpanel" aria-labelledby="nav-profile-tab">
        <div class="border border-5 shadow p-3">
            <h3 class="text-center">Datos de Contacto</h3>
            <hr style="width:100%;color:black" class="border border-5 mt-0">
            <div class="row">
                <div class="col-1">
                    <label for="telefono" class="m-0 form-label">Teléfono</label>
                    <input type="text" class="small form-control" id="telefono">
                </div>
                <div class="col-1">
                    <label for="celular" class="m-0 form-label">Celular</label>
                    <input type="text" class="mid form-control" id="celular">    
                </div>
                <div class="col-2">
                    <label for="correo_alterno" class="m-0 form-label">Correo Alterno</label>
                    <input type="email" class="form-control" id="correo_alterno">
                </div>
                <div class="col-2">
                    <label for="correo_uaslp" class="m-0 form-label">Correo institucional</label>
                    <input type="email" class="form-control" id="correo_uaslp">
                </div>
            </div>
            <br>
            <h3 class="text-center">Domicilio Actual</h3>
            <hr style="width:100%;color:black" class="border border-5 mt-0">
            <div class="row">
                <div class="col-2">
                    <label for="calle" class="m-0 form-label">Calle</label>
                    <input type="text" class="small form-control" id="calle">    
                </div>
                <div class="col-1">
                    <label for="num_ext" class="m-0 form-label">No. Exterior</label>
                    <input type="number" class="small form-control" id="num_ext">
                </div>
                <div class="col-1">
                    <label for="num_int" class="m-0 form-label">No. Interior</label>
                    <input type="number" class="small form-control" id="num_int">
                </div>
                <div class="col-2">
                    <label for="colonia" class="m-0 form-label">Colonia</label>
                    <input type="text" class="mid form-control" id="colonia">
                </div>
                <div class="col-1">
                    <label for="codigo_postal" class="m-0 form-label">Código Postal</label>
                    <input type="text" class=" form-control" id="codigo_postal">
                </div>
                <div class="col-2">
                    <label for="ciudad_municipio" class="m-0 form-label">Ciudad y/o Municipio</label>
                    <input type="text" class=" form-control" id="ciudad_municipio">
                </div>
                <div class="col-2">
                    <label for="estado" class="m-0 form-label">Estado</label>
                    <input type="text" class=" form-control" id="estado">
                </div>
            </div>
            <br>
            <h3 class="text-center">Domicilio Permanente</h3>
            <hr style="width:100%;color:black" class="border border-5 mt-0">
            <div class="row">
                <div class="col-2">
                    <label for="calle" class="m-0 form-label">Calle</label>
                    <input type="text" class="small form-control" id="calle" disabled>
                </div>
                <div class="col-1">
                    <label for="num_ext" class="m-0 form-label">No. Exterior</label>
                    <input type="number" class="small form-control" id="num_ext" disabled>
                </div>
                <div class="col-1">
                    <label for="num_int" class="m-0 form-label">No. Interior</label>
                    <input type="number" class="small form-control" id="num_int" disabled>
                </div>
                <div class="col-2">
                    <label for="colonia" class="m-0 form-label">Colonia</label>
                    <input type="text" class="mid form-control" id="colonia" disabled>
                </div>
                <div class="col-1">
                    <label for="codigo_postal" class="m-0 form-label">Código Postal</label>
                    <input type="text" class=" form-control" id="codigo_postal" disabled>
                </div>
                <div class="col-2">
                    <label for="ciudad_municipio" class="m-0 form-label">Ciudad y/o Municipio</label>
                    <input type="text" class=" form-control" id="ciudad_municipio" disabled>
                </div>
                <div class="col-2">
                    <label for="estado" class="m-0 form-label">Estado</label>
                    <input type="text" class=" form-control" id="estado" disabled>
                </div>
            </div>
            <br>
            <div class="row d-flex justify-content-end">
                <div class="ml-2 ">
                    <button disabled id="guardar" style="margin-right:10px;margin-bottom:10px;" type="button" class="btn-sm bg-dark">Guardar</button>
                    <button disabled id="modificar" style="margin-right:10px;margin-bottom:10px;" type="button" class="btn-sm bg-dark">Modificar</button>
                </div>
            </div>
        </div>
        <br>
        <div class="border border-5 shadow p-3" id="">
            <h3 class="text-center">Domicilio y contacto del tutor</h3>
            <hr style="width:100%;color:black" class="border border-5 mt-0">
            <div class="row">
                <div class="col-3">
                    <label for="padre" class="m-0 form-label">Padre o tutor</label>
                    <input type="text" class="small form-control" id="padre">
                </div>
                <div class="col-3">
                    <label for="madre" class="m-0 form-label">Madre</label>
                    <input type="text" class="mid form-control" id="madre">
                </div>
                <div class="col-2">
                    <label for="calle_tutor" class="m-0 form-label">Calle</label>
                    <input type="text" class="small form-control" id="calle_tutor">
                </div>
                <div class="col-1">
                    <label for="numero_ext_tutor" class="m-0 form-label">No. Exterior</label>
                    <input type="text" class="small form-control" id="numero_ext_tutor">
                </div>
                <div class="col-1">
                    <label for="numero_int_tutor" class="m-0 form-label">No. Interior</label>
                    <input type="text" class="small form-control" id="numero_int_tutor">
                </div>
                <div class="col-2">
                    <label for="colonia_tutor" class="m-0 form-label">Colonia</label>
                    <input type="text" class="mid form-control" id="colonia_tutor">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-1">
                    <label for="codigo_postal_tutor" class="m-0 form-label">Código Postal</label>
                    <input type="text" class=" form-control" id="codigo_postal_tutor">
                </div>
                <div class="col-2">
                    <label for="ciudad_municipio_tutor" class="m-0 form-label">Ciudad y/o Municipio</label>
                    <input type="text" class=" form-control" id="ciudad_municipio_tutor">    
                </div>
                <div class="col-3">
                    <label for="estado_tutor" class="m-0 form-label">Estado</label>
                    <input type="text" class=" form-control" id="estado_tutor">
                </div>
                <div class="col-1">
                    <label for="telefono_tutor" class="m-0 form-label">Teléfono</label>
                    <input type="tel" class="small form-control" id="telefono_tutor">    
                </div>
                <div class="col-1">
                    <label for="celular_tutor" class="m-0 form-label">Celular</label>
                    <input type="tel" class="form-control" id="celular_tutor">
                </div>
                <div class="col-2">
                    <label for="correo_personal_tutor" class="m-0 form-label">Correo Electrónico Personal</label>
                    <input type="email" class=" form-control" id="correo_personal_tutor">
                </div>
            </div>
        </div>
        <br>
        <div class="mb-2 d-flex flex-sm-row flex-column align-items-center justify-content-end">
            <button disabled id="guardar" style="width:min(150px, 100%);margin-right:10px;margin-bottom:10px;" type="button" class="btn-sm bg-dark">Guardar</button>
            <button disabled id="modificar" style="width:min(150px, 100%);margin-right:10px;margin-bottom:10px;" type="button" class="btn-sm bg-dark">Modificar</button>
        </div>
    </div>

<!--Antecedente academico-->
    <div class="p-3 tab-pane fade" id="nav-academico" role="tabpanel" aria-labelledby="nav-contact-tab">
        <div class="border border-5 shadow p-3" id="">
            <div class="">
                <div class="row">
                    <div class="col-3">
                        <label for="secundaria" class="m-0 form-label">Secundaria</label>
                        <input type="text" class="small form-control" id="secundaria">
                    </div>

                    <div class="col-3">
                        <label for="ciudad_secundaria" class="m-0 form-label">Ciudad</label>
                        <input type="text" class=" form-control" id="ciudad_secundaria">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-3">
                        <label for="bachillerato" class="m-0 form-label">Bachillerato</label>
                        <input type="text" class=" form-control" id="bachillerato">
                    </div>
                    <div class="col-3">
                        <label for="ciudad_bachillerato" class="m-0 form-label">Ciudad</label>
                        <input type="text" class=" form-control" id="ciudad_bachillerato">
                    </div>
                    <div class="col-3">
                        <label for="estado_bachillerato" class="m-0 form-label">Estado</label>
                        <input type="text" class=" form-control" id="estado_bachillerato">
                    </div>
                    <div class="col-3">
                        <div class="d-flex flex-column">
                            <label for="periodo_bachillerato_incio" class="m-0 form-label">Periodo</label>
                            <div class="row">
                                <div class="col-4">
                                    <input type="number" min="1900" max="2099" class="mid form-control" id="periodo_bachillerato_incio" value="2015"/>
                                </div>
                                <label>-</label>
                                <div class="col-4">
                                    <input type="number" class="mid form-control" min="1900" max="2099" id="periodo_bachillerato_fin" value="2018"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="mb-2 d-flex flex-sm-row flex-column align-items-center justify-content-end">
            <button disabled id="guardar" style="width:min(150px, 100%);margin-right:10px;margin-bottom:10px;" type="button" class="btn-sm bg-dark">Guardar</button>
            <button disabled id="modificar" style="width:min(150px, 100%);margin-right:10px;margin-bottom:10px;" type="button" class="btn-sm bg-dark">Modificar</button>
        </div>
    </div>

<!--Datos de Egreso-->
    <div class="p-3 tab-pane fade" id="nav-egreso" role="tabpanel" aria-labelledby="nav-contact-tab">
        <div class="border border-5 shadow p-3" id="">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-3">
                            <label for="fecha_pasante" class="m-0 form-label">Fecha de Pasante</label>
                            <input type="date" class="small form-control" id="fecha_pasante">
                        </div>
                        <div class="col-4">
                            <label for="periodo_pasante_incio" class="m-0 form-label">Periodo</label>
                            <div class="row">
                                <div class="col-6">
                                    <div class="">
                                        <input type="number" class="mid form-control" id="periodo_pasante_incio" min="1900" max="2099" value="2020">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="">
                                        <input type="number" class="mid form-control" id="periodo_pasante_fin" min="1900" max="2099" value="2021" >
                                    </div>    
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-2">
                            <label for="fecha_titulacion" class="m-0 form-label">Fecha de Titulación</label>
                            <input type="text" class="mid form-control" id="fecha_titulacion">
                        </div>
                        <div class="col-1">
                            <label for="libro" class="m-0 form-label">Libro</label>
                            <input type="text" class="mid form-control" id="libro">
                        </div>
                        <div class="col-1">
                            <label for="acta" class="m-0 form-label">Acta</label>
                            <input type="text" class="mid form-control" id="acta">
                        </div>
                        <div class="col-3">
                            <label for="ciclo_escolar_horario" class="m-0 form-label">Estado de Titulación </label>
                            <input type="text" class=" form-control" id="estado:_titulacion">    
                        </div>
                        <div class="col-3">
                            <label for="opcion_titulacion" class="m-0 form-label">Opción de Titulación</label>
                            <select id="opcion_titulacion" class="form-select form-control" aria-label="opcion_titulacion">
                                <option selected>titulacion</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                            </select>
                        </div>
                    </div>    
                    <div class="row m-3">
                        <div class="col-12">
                            <div class="row d-flex justify-content-start">
                                <div class="col-6">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Portal del egresado
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>     
            </div>
            
        </div>
        <br>
        <div class="mb-2 d-flex flex-sm-row flex-column align-items-center justify-content-end">
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
    <link rel="stylesheet"  href="{{ asset('css/custom-file-image.css')}}" />
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
<script>
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
            });
        });    
</script>
<script>
    const $imagen = document.querySelector('#foto'), $imagenPreview = document.querySelector('#imagenPreview');

    $imagen.addEventListener("change",() =>{
        const archivo = $imagen.files;
        /*Si no hay datos del archivo no hacemos nada*/
        if (!archivo || !archivo.length) {
            $imagen.src = "";
            return;
        }else{
            /*Tomamos el primer archivo*/
            const archivo1 = archivo[0];
            const blobObject = URL.createObjectURL(archivo[0]);
            $imagenPreview.src = blobObject;
        }

    });
</script>
@stop