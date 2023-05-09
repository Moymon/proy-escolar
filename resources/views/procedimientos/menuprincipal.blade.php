@extends('adminlte::page')
@section('title', 'Menu Principal')

@section('content_header')
    <h1>Menu Principal</h1>
@stop

@section('content')

<form>
<div class="container">
    <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-2">
                <img src="https://picsum.photos/200/300" class="img-fluid" alt="">
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Clave UASLP</label>
                            <input type="number" class="form-control" id="cve_unica" name="cve_unica">
                        </div>
                        <div class="form-group">
                            <label>Ingeniería</label>
                            <input type="number" class="form-control" name="ingenieria">
                        </div>                        
                    </div>
                    <div class="col-md-6">  
                        <button class="btn btn-light"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Nombre</label>
                    <input class="form-control" type="text" name="nombre" disabled>
                </div>
                <div class="form-group">
                    <label>Asesor</label>
                    <input class="form-control" type="text" name="asesor" disabled>
                </div>
                <div class="form-group">
                    <label>Carrera</label>
                    <input class="form-control" type="text" name="nombre" disabled>
                </div>
            </div>
         </div>

         <div class="row">
             <div class="col-md-6">
                <div class="form-group">
                    <label>Domicilio</label>
                    <input type="text" class="form-control" name="domiclio" disabled>
                </div>
                <div class="form-group">
                    <label>Colonia</label>
                    <input type="text" class="form-control" name="colonia" disabled>
                </div>
                <div class="form-group">
                    <label>Código Postal</label>
                    <input type="text" name="cp" class="form-control" disabled>
                </div>
             </div>
             <div class="col-md-6">
                <div class="form-group">
                    <label>Teléfono</label>
                    <input type="number" class="form-control" name="telefono" disabled>
                </div>
                <div class="form-group">
                    <label>Ciudad</label>
                    <input type="text" class="form-control" name="Ciudad" disabled>
                </div>
             </div>
        </div>
    </div>
</div>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <!-- jQuery -->

@stop