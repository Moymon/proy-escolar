@extends('adminlte::page')
@extends('modalAlumnos')

@section('title', 'Kardex')

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-6">
            <h1>Catalogo de usuarios del sistema</h1>
        </div>
    </div>
</div>
@stop

@section('content')
    @livewire('administracionuserindex')
@stop

@section('css')

@stop

@section('js')
<script>
 $(document).ready(function (){
        $('#tabla_usuarios').DataTable({
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
    
@stop