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

<nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-alumno" type="button" role="tab" aria-controls="nav-alumno" aria-selected="true">Alumno</button>
      <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-licenciatura" type="button" role="tab" aria-controls="nav-licenciatura" aria-selected="false">Licenciatura</button>
      <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-posgrado" type="button" role="tab" aria-controls="nav-posgrado" aria-selected="false">Posgrado</button>
    </div>
</nav>

<div class="tab-content" id="nav-tabContent">

    <div class="p-3 tab-pane fade show active" id="nav-alumno" role="tabpanel" aria-labelledby="nav-alumno-tab">
        <div class="w-100 row p-0 m-0 h-100" id="">

            <div class="border border-5 shadow p-3 mb-3 col-12 d-flex flex-sm-row flex-column align-items-center justify-content-around">
                <div style="height:150px;width:min(150px, 100%)!important;" class="me-2">
                    <img src="{{ asset('img/usuario.svg')}}" alt="">
                </div>
                <div class="row m-0 p-0 w-75">

                    <div class="col-sm-6 col-12" style="margin-right: 10px">
                        <label for="clave_uaslp" class="m-0 form-label">Clave UASLP</label>
                        <input type="text" class="small form-control" id="clave_uaslp" aria-describedby="emailHelp">
                    </div>

                    <div class="col-sm-6 col-12">
                        <label for="clave_uaslp_posgrado" class="m-0 form-label">Clave UASLP</label>
                        <input type="text" class="small form-control" id="clave_uaslp_posgrado" aria-describedby="emailHelp">
                    </div>

                    <div class="col-sm-6 col-12">
                        <label for="posgrado" class="m-0 form-label">Posgrado</label>
                        <select id="posgrado" class="form-select form-control" aria-label="posgrado">
                            <option selected>posgrado</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>

                    <hr style="width:100%;color:black" class="border border-5 mt-1 mb-1">

                    <div class="col-12">
                        <label for="nombres" class="m-0 form-label">Nombres</label>
                        <input type="text" class=" form-control" id="nombres" aria-describedby="emailHelp">
                    </div>

                    <div class="col-sm-6 col-12">
                        <label for="apellido_paterno" class="m-0 form-label">Apellido Paterno</label>
                        <input type="text" class=" form-control" id="apellido_paterno" aria-describedby="emailHelp">
                    </div>
                    <div class="col-sm-6 col-12">
                        <label for="apellido_materno" class="m-0 form-label">Apellido Materno</label>
                        <input type="text" class=" form-control" id="apellido_materno" aria-describedby="emailHelp">
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
                        <input type="date" class=" form-control" id="fecha_nacimiento" aria-describedby="emailHelp">
                    </div>

                    <div class="col-sm-6 col-12">
                        <label for="curp" class="m-0 form-label">CURP</label>
                        <input type="text" class="mid form-control" id="curp" aria-describedby="emailHelp">
                    </div>
                </div>
            </div>


            <div class="border border-5 shadow p-3 mb-3 col-lg-6 col-12 m-0 d-flex align-items-center justify-content-around">
                <div class="row w-75">
                    <div class="col-sm-6 col-12">
                        <label for="calle_numero" class="m-0 form-label">Calle y No.</label>
                        <input type="text" class="small form-control" id="calle_numero" aria-describedby="emailHelp">
                    </div>

                    <div class="col-sm-6 col-12">
                        <label for="colonia" class="m-0 form-label">Colonia</label>
                        <input type="text" class="mid form-control" id="colonia" aria-describedby="emailHelp">
                    </div>

                    <div class="col-sm-6 col-12">
                        <label for="codigo_postal" class="m-0 form-label">Código Postal</label>
                        <input type="text" class=" form-control" id="codigo_postal" aria-describedby="emailHelp">
                    </div>

                    <div class="col-12">
                        <label for="ciudad_municipio" class="m-0 form-label">Ciudad y/o Municipio</label>
                        <select id="ciudad_municipio" class="form-select form-control" aria-label="ciudad_municipio">
                            <option selected>Ciudad y/o Municipio</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                        </select>
                    </div>
                    
                    <div class=" col-12">
                        <label for="estado" class="m-0 form-label">Estado</label>
                        <select id="estado" class="form-select form-control" aria-label="estado">
                            <option selected>estado</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="border border-5 shadow p-3 mb-3 col-lg-6 col-12 row m-0 d-flex flex-column align-items-center justify-content-around">
                <div class="d-flex flex-sm-row flex-column align-items-center justify-content-around">
                    <div class="row m-0 p-0 w-75">
                        <div class="w-auto col-12">
                            <label for="telefono" class="m-0 form-label">Teléfono</label>
                            <input type="text" class="w-100 m-0 small form-control" id="telefono" aria-describedby="emailHelp">
                        </div>
  
                        <div class="col-12">
                            <label for="correo" class="m-0 form-label">Correo Electrónico Personal</label>
                            <input type="text" class="small form-control" id="correo" aria-describedby="emailHelp">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-2 d-flex flex-sm-row flex-column align-items-center justify-content-start">
            <button disabled id="guardar" style="width:min(150px, 100%);margin-right:10px;margin-bottom:10px;" type="button" class="btn-sm bg-dark">Guardar</button>
            <button disabled id="modificar" style="width:min(150px, 100%);margin-right:10px;margin-bottom:10px;" type="button" class="btn-sm bg-dark">Modificar</button>
        </div>
    </div>

    <div class="p-3 tab-pane fade" id="nav-licenciatura" role="tabpanel" aria-labelledby="nav-licenciatura-tab">
        <div class="w-100 row p-0 m-0 h-100" id="">

            <div class="border border-5 shadow p-3 mb-3 col-12 m-0 d-flex align-items-center justify-content-around">
                <div class="row m-0 p-0 w-75">

                    <div class="col-sm-6 col-12">
                        <label for="universidad" class="m-0 form-label">Universidad</label>
                        <select id="universidad" class="form-select form-control" aria-label="universidad">
                            <option selected>universidad</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                        </select>
                    </div>

                    <div class="col-sm-6 col-12">
                        <label for="escuela_facultad" class="m-0 form-label">Escuela y/o Facultad</label>
                        <select id="escuela_facultad" class="form-select form-control" aria-label="escuela_facultad">
                            <option selected>facultad</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                        </select>
                    </div>

                    <div class="col-sm-6 col-12">
                        <label for="licenciatura" class="m-0 form-label">Licenciatura</label>
                        <select id="licenciatura" class="form-select form-control" aria-label="licenciatura">
                            <option selected>licenciatura</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                        </select>
                    </div>

                    <div class="col-sm-3 col-12">
                        <label for="licenciatura" class="m-0 form-label">Número de cédula</label>
                        <input type="text" class="mid form-control" id="licenciatura" aria-describedby="emailHelp">
                    </div>

                    <div class="col-sm-3 col-6">
                        <div class="p-3 d-flex align-items-center justofy-content-center">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                            <label class="form-check-label" for="flexCheckChecked">
                                Cambiar según el sexo
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-2 d-flex flex-sm-row flex-column align-items-center justify-content-start">
            <button disabled id="guardar" style="width:min(150px, 100%);margin-right:10px;margin-bottom:10px;" type="button" class="btn-sm bg-dark">Guardar</button>
            <button disabled id="modificar" style="width:min(150px, 100%);margin-right:10px;margin-bottom:10px;" type="button" class="btn-sm bg-dark">Modificar</button>
        </div>
    </div>


    <div class="p-3 tab-pane fade" id="nav-posgrado" role="tabpanel" aria-labelledby="nav-posgrado-tab">
        <div class="w-100 row p-0 m-0 h-100" id="">


            <div class="border border-5 shadow p-3 mb-3 col-12 m-0 d-flex align-items-center justify-content-around">
                <div class="row m-0 p-0 w-75">

                    <div class="col-sm-6 col-12">
                        <label for="universidad_posgrado" class="m-0 form-label">Universidad</label>
                        <select id="universidad_posgrado" class="form-select form-control" aria-label="universidad_posgrado">
                            <option selected>universidad posgrado</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                        </select>
                    </div>

                    <div class="col-sm-6 col-12">
                        <label for="escuela_facultad_posgrado" class="m-0 form-label">Escuela y/o Facultad</label>
                        <select id="escuela_facultad_posgrado" class="form-select form-control" aria-label="escuela_facultad_posgrado">
                            <option selected>facultad posgrado</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                        </select>
                    </div>

                    <div class="col-sm-6 col-12">
                        <label for="posgrado_alumno" class="m-0 form-label">Posgrado</label>
                        <select id="posgrado_alumno" class="form-select form-control" aria-label="posgrado_alumno">
                            <option selected>posgrado</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                        </select>
                    </div>

                    <div class="col-sm-2 col-6">
                        <label for="libro" class="m-0 form-label">Libro</label>
                        <input type="text" class="mid form-control" id="libro" aria-describedby="emailHelp">
                    </div>

                    <div class="col-sm-2 col-6">
                        <label for="acta" class="m-0 form-label">Acta</label>
                        <input type="text" class="mid form-control" id="acta" aria-describedby="emailHelp">
                    </div>

                    <div class="col-sm-6 col-12" style="margin-right: 10px">
                        <div class="d-flex flex-column">
                            <label for="periodo_posgrado_incio" class="m-0 form-label">Periodo</label>
                            <div class="d-flex flex-column">
                                <div class="">
                                    <input type="date" class="mid form-control" id="periodo_posgrado_incio" aria-describedby="emailHelp">
                                </div>
                                <div class="">
                                    <input type="date" class="mid form-control" id="periodo_posgrado_fin" aria-describedby="emailHelp">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-12">
                        <label for="numero_cedeula" class="m-0 form-label">Número de cédula</label>
                        <input type="text" class="mid form-control" id="numero_cedeula" aria-describedby="emailHelp">
                    </div>

                    <div class="col-sm-6 col-12">
                        <label for="fecha_titulacion" class="m-0 form-label">Fecha de Titulación</label>
                        <input type="text" class="mid form-control" id="fecha_titulacion" aria-describedby="emailHelp">
                    </div>

                    <div class="col-sm-6 col-12">
                        <label for="opcion_titulacion" class="m-0 form-label">Opción de Titulación</label>
                        <select id="opcion_titulacion" class="form-select form-control" aria-label="opcion_titulacion">
                            <option selected>opcion titulacion</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                        </select>
                    </div>

                    <div class="col-sm-6 col-12">
                        <label for="estado_titulacion" class="m-0 form-label">Estado de Titulación</label>
                        <input type="text" class="mid form-control" id="estado_titulacion" aria-describedby="emailHelp">
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
@stop