@extends('adminlte::page')
@section('title', 'Listado de Exámenes')
@section('plugins.Datatables',true)
@section('content_header')
    <h1>Captura de exámenes a regularización</h1>
@stop

@section('content')
    <div class="container-xxl">
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <form id="formFiltroFechas" method="POST" action="{{route('getFechas')}}" class="m-0 p-0">
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
                            <div id="infoTablaExamenes"></div>
                            <form method="POST" action="{{route('getExamenes')}}" id="formSelectFechaForExam" style="display: none;">
                                @csrf
                                <input type="hidden" name="fechaForExam" class="inputFechaForExam" />
                                <input type="hidden" name="periodoForExam" class="inputPeriodoForExam" />
                            </form>
                            <table id="tablaExamen" class="table table-bordered table-striped dataTable dtr-inline">
                                <thead>
                                    <tr>
                                        <th scope="col">Clave</th>
                                        <th scope="col">Materia</th>
                                        <th scope="col">Hora</th>
                                        <th scope="col">Salón</th>
                                        <th scope="col">Ex</th>
                                        <th scope="col">Sinodal titular</th>
                                        <th scope="col">Sinodal secretario</th>
                                    </tr>
                                </thead>
                                <tbody id="bodyTablaExamen">
                                    <tr>
                                        <td></td>
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
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
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
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>

                            <div id="erroresDeTablaExamenes"></div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <form id="camposMateriaInfo" method="POST" action="{{route('getCalificaciones')}}">
                                @csrf
                                <input readonly name="claveCampo" id="claveCampo" type="hidden" class="form-control" />
                                <div class="form-row">
                                    <div class="form-group col-md-5">
                                        <label for="materiaCampo">Materia</label>
                                        <input readonly name="materiaCampo" id="materiaCampo" type="text" class="form-control" /> 
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="tipoCampo">Tipo de examen</label>
                                        <input readonly name="tipoCampo" id="tipoCampo" type="text" class="form-control" />
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label for="salonCampo">Salón</label>
                                        <input readonly name="salonCampo" id="salonCampo" type="text" class="form-control" />
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label for="nombreCampo">Sinodal titular</label>
                                        <input readonly name="nombreCampo" id="nombreCampo" type="text" class="form-control" />
                                    </div>
            
                                    <div class="form-group col-md-5">
                                        <label for="nombreCampo2">Sinodal secretario</label>
                                        <input readonly name="nombreCampo2" id="nombreCampo2" type="text" class="form-control" />
                                    </div>
                                    <div class="form-group col-md-2 d-flex align-items-end">
                                        <button type="submit" id="calificacionesbutton" class="w-100 btn btn-primary">Calificaciones</button>
                                    </div>
                                </div>
                            </form>
            
                            <form method="POST" action="{{route('updateCalificaciones')}}" id="formCalificaciones">
                                @csrf
                                <input type="hidden" name="materiaCampo" id="materiaCampoModal" />
                                <input type="hidden" name="claveCampo" id="claveCampooModal" />
            
                                <div>
                                    <table id="tablaCalificaciones" class="table table-bordered table-striped dataTable dtr-inline">
                                        <thead class="">
                                            <tr>
                                                <th scope="col">UASLP</th>
                                                <th scope="col">Nombre de Alumno</th>
                                                <th scope="col">Calificación</th>
                                            </tr>
                                        </thead>
                                        <tbody id="bodyCapturaCalificaciones">
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
            
                                <div id="erroresDeTablaCalificaciones" style="display: none;"></div>
            
                                <div class="d-flex align-items-center justify-content-end w-100">
                                    <button id="guardarCalificaciones" type="submit" class="px-5 btn btn-success">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="module" src="{{asset('js/captura_ex_reg_lic/captura_ex_reg_lic.js') }}"></script>

@stop

@section('css')
    <style>
        label{
            font-weight: 500!important;
        }
        .materiaCampo{
        cursor: pointer;
        transition: all ease-in 0.3s;
        }
        .materiaCampo:hover{
            color: blue;
            text-decoration:underline ;
        }

    
        #bodyTablaExamen tr{
            cursor: pointer;
            transition: all ease-in 0.3s;
        }

        #bodyTablaExamen tr:hover{
            background-color: rgb(230, 230, 230);
        }


        #tablaFechasTbody tr{
            cursor: pointer;
            transition: all ease-in 0.3s;
        }

        #tablaFechasTbody tr:hover{
            background-color: rgb(230, 230, 230);
            color: blue;
            text-decoration: underline;
        }

        #tablaFechasTbody td{
            display: flex;
            align-items: center;
            justify-content: center;
        }


        #tablaCalificaciones{
            border-top: none!important;
            border-bottom: none!important;
        }
        .sin-borde {
            border: none!important;
            background-color: white!important; 
            width: 15px!important;
        }

        tr, td{
            white-space: nowrap;
        }
    </style>
@stop

@section('js')
    <script>
        const getFechas = '{{ route('getFechas') }}';
        const getExamenes = '{{ route('getExamenes') }}';
        const getCalificaciones = '{{ route('getCalificaciones') }}';

        //Estas funcion solo se encargan de dar estilo al boton segun la edicion, 
        //Es decir cuando se presion en el boton de editar calificacion, se agregan los estilos
        //en la funcion transformaEnEditable() aqui tambien se agrega el evento "onclick", "finalizarEdicion(this)"
        //para el nuevo boton editado.
        function transformarEnEditable(nodo){
                
                var nodoTd = nodo.parentNode.parentNode; //Nodo TD

                const inputCal = document.createElement("input");
                const divIcon = document.createElement("div");
                const buttonCaptura = document.createElement("button");

                var calificacion = nodoTd.textContent.trim();
                nodoTd.textContent = "";
                inputCal.value = calificacion;
                inputCal.setAttribute("class", "w-25 text-center");
                inputCal.setAttribute("type", "text");
                inputCal.setAttribute("style", "cursor: pointer!important;border-top:none!important;border-right:none!important;border-left:none!important;background-color:transparent!important;");

                buttonCaptura.setAttribute("class", "w-100 h-100 btn btn-success p-0");
                buttonCaptura.disabled = false;
                buttonCaptura.setAttribute("onclick", "finalizarEdicion(this)");
                buttonCaptura.innerHTML = `
                <i class='fas fa-check'></i>
                `;
                divIcon.appendChild(buttonCaptura);

                divIcon.setAttribute("style", "height:26px;width:26px;top:25%;left:85%;");
                divIcon.setAttribute("class", "position-absolute");

                nodoTd.appendChild(divIcon);
                nodoTd.appendChild(inputCal);
        }

        function finalizarEdicion(nodo){
            var nodoTd = nodo.parentNode.parentNode; //Nodo TD

            const divIcon = document.createElement("div");
            const buttonCaptura = document.createElement("button");

            const inputCal = nodoTd.querySelector("input");
            var calificacion = inputCal.value;
            nodoTd.textContent = calificacion;
            inputCal.remove();

            buttonCaptura.setAttribute("class", "w-100 h-100 btn btn-primary p-0");
            buttonCaptura.disabled = false;
            buttonCaptura.setAttribute("onclick", "transformarEnEditable(this)");
            buttonCaptura.innerHTML = `
            <i class='fas fa-edit'></i>
            `;
            divIcon.appendChild(buttonCaptura);

            divIcon.setAttribute("style", "height:26px;width:26px;top:25%;left:85%;");
            divIcon.setAttribute("class", "position-absolute");

            nodoTd.appendChild(divIcon);
        }
    </script>
@stop