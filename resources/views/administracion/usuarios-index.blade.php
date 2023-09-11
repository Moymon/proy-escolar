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

Para inicializar el DataTable en esta tabla, puedes usar el siguiente código jQuery:

html
Copy code
<!-- Agrega el enlace al archivo de DataTables -->
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function () {
        // Inicializar el DataTable en la tabla con el id "tabla_usuarios"
        $('.table').DataTable({
            
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
            }
        });
    });
</script>
@stop