@extends('adminlte::page')

@section('title', 'Listado de Exámenes')

@section('content_header')
    <h1>Captura de Examenes a Regularización</h1>
@stop

@section('content')
<div class="row">
    <div class="col-4 d-flex flex-column">
        <div class="card w-100 h-100">
            <div class="card-body">
                <form action="" class="m-0 p-0">
                <!--
                    <form id="formFiltroFechas" method="POST" action="route('getTipoConsulta')" class="m-0 p-0">
                -->
                    @csrf

                    <input type="hidden" name="tipoConsulta" id="tipoConsulta">

                    <div class="row">
                        <div class="col-6">
                            <label for="ciclo_escolar" class="m-0 form-label fw-light">Ciclo Escolar</label>
                            <select name="ciclo_escolar" id="ciclo_escolar" class="mb-1 form-select form-control">
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
                                <option value="2022 - 2023/2">2023 - 2023/II</option>
                                <option value="2023 - 2024/1">2023 - 2024/I</option>
                                <option value="2023 - 2024/2">2023 - 2024/II</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <label for="periodo" class="m-0 form-label fw-light">Periodo</label>
                            <select name="periodo" id="periodo" class="mb-1 form-select form-control">
                                <option value="" selected>Periodo</option>
                                <option value="EXAMENES A TITULO">EXAMENES A TITULO</option>
                                <option value="EXAMENES A REGULARIZACION">EXAMENES A REGULARIZACION</option>
                            </select>
                        </div>
                    </div>

                    <br>
                    <div class="row d-flex justify-content-center">
                        <div class="col-6 ">
                            <button type="submit" id="fechasbutton" class="btn-sm bg-dark form-control">Listar Fechas</button>
                        </div>
                    </div>
                
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-bordered table-striped dataTable dtr-inline tablas_pago"  id="tablaFechas">
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
                    </div>
                    <br>
                    <div class="row d-flex justify-content-center">
                        <div class="col-6">
                            <button type="submit" id="examenesbutton" class="btn-sm bg-dark form-control">Listar Exámenes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-8 d-flex flex-column">
            <div class="card w-100 h-100">
                <div class="card-body">
                    <table id="tablaExamen" class="table table-bordered table-striped dataTable dtr-inline">
                        <thead>
                            <tr>
                                <th scope="col">Clave</th>
                                <th scope="col">Materia</th>
                                <th scope="col">Hora</th>
                                <th scope="col">Salon</th>
                                <th scope="col">Ex</th>
                                <th scope="col">Sinodal Titular</th>
                                <th scope="col">Sinodal Secretario</th>
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
                    
                </div>
            </div>
            
            <div class="card w-100 h-100">
                <div class="card-body">
                    <form action="">
                    <!--
                    <form id="camposMateriaInfo" method="POST" action="route('getCalificaciones')">
                    -->
                        @csrf
                        <div class="m-0 row w-100 mt-1 border p-2">
                          <div class="col-5 p-0 d-flex flex-column">
                            <div style="padding-right:10px;">
                              <label for="materiaCampo" class="m-0 form-label fw-light">Materia</label>
                              <input readonly name="materiaCampo" id="materiaCampo" type="text" class="form-control">
                            </div>
                          </div>
                          <div class="col-2 p-0 d-flex flex-column">
                            <div style="padding-right:10px;">
                              <label for="tipoCampo" class="m-0 form-label fw-light">Tipo de Examen</label>
                              <input readonly name="tipoCampo" id="tipoCampo" type="text" class="form-control">
                            </div>
                          </div>
                          <div class="col-5 p-0 d-flex flex-column">
                            <div>
                              <label for="salonCampo" class="m-0 form-label fw-light">Salon</label>
                              <input readonly name="salonCampo" id="salonCampo" type="text" class="form-control">
                            </div>
                          </div>
                          <div class="col-5 p-0 d-flex flex-column">
                            <div style="padding-right:10px;">
                              <label for="nombreCampo" class="m-0 form-label fw-light">Sinodal Titular</label>
                              <input readonly name="nombreCampo" id="nombreCampo" type="text" class="form-control">
                            </div>
                          </div>
                          <div class="col-5 p-0 d-flex flex-column">
                            <div style="padding-right:10px;">
                              <label for="nombreCampo2" class="m-0 form-label fw-light">Sinodal Secretario</label>
                              <input readonly name="nombreCampo2" id="nombreCampo2" type="text" class="form-control">
                            </div>
                          </div>
                          
                          <input readonly name="claveCampo" id="claveCampo" type="hidden" class="form-control">
              
                          <div class="col-2 p-0 d-flex flex-column mt-4">
                            <div class="w-100">
                              <button type="submit" id="calificacionesbutton" class="w-100 mb-3 btn btn-dark">calificaciones</button>
                            </div>
                          </div>
                        </div>
                    </form>

                    <form action="">
                        <input type="hidden" name="materiaCampo" id="materiaCampoModal">
                        <input type="hidden" name="claveCampo" id="claveCampooModal">
      
                        <div style="">
                        
                            <table id="tablaCalificaciones" class="table table-bordered table-striped dataTable dtr-inline">
                              <thead class="">
                                <tr>
                                  <th scope="col">UASLP</th>
                                  <th scope="col">Nombre de Alumno</th>
                                  <th scope="col">Calificacion</th>
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
      
                        <div class=" d-flex flex-row align-items-center justify-content-start w-100">
                          <button disabled id="" style="" type="button" class="px-5 m-0 btn-success btn-sm mt-2">Guardar</button>
                        </div>
      
                        <div id="contenedorForm">
      
                        </div>
      
                    </form>

                </div>
            </div>
    </div>

</div>
@stop

@section('css')
<style>
        label{
        font-weight: 500!important;
    }

    #tablaFechasTbody td{
        display: flex;
        align-items: center;
        justify-content: center;
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

    #tablaCalificaciones{
        border-top: none!important;
        border-bottom: none!important;
    }
    .sin-borde {
        border: none!important;
        background-color: white!important; 
        width: 15px!important;
    }
</style>
@stop

@section('js')
<script>
    // Selecciona el id de la tabla de fechas, tbody
    const formFechasFiltro = document.getElementById("formFiltroFechas");
    const formMateriaConsulta = document.getElementById("camposMateriaInfo");
  
    const tablaFechasTbody = document.querySelector("#tablaFechas tbody");
    const tablaExamenesTbody = document.querySelector("#tablaExamen tbody");
    const tablaCalificacionesTbody = document.querySelector("#tablaCalificaciones tbody");
  
    const botonFechas = document.querySelector("#fechasbutton");
    const botonExamenes = document.querySelector("#examenesbutton");
    const tipoConsulta = document.querySelector("#tipoConsulta");
  
    const materiaCampo = document.querySelector("#materiaCanpo");
  
    cargarEventListener();
    function cargarEventListener() {
        botonFechas.addEventListener("click", () => {
            tipoConsulta.value = "fecha";
        });
        botonExamenes.addEventListener("click", () => {
            tipoConsulta.value = "examen";
        });
  
        formFechasFiltro.addEventListener("submit", consultaFechas);
        tablaExamenesTbody.addEventListener("click", seleccionarExamen);
        formMateriaConsulta.addEventListener("submit", consultaCalificaciones);
    }
  
    function consultaFechas(e) {
        e.preventDefault();
        const formData = new FormData(this);
  
        const createTableCell = (content, className) => {
            const td = document.createElement("td");
            td.className = className;
            td.textContent = content;
    
            if (className === "materiaCampo") {
                td.setAttribute("onclick", "inicializacionModalCalificaciones()")
                td.setAttribute("data-toggle", "modal");
                td.setAttribute("data-target", "#modal_capturaDeCalificaciones");
            }
            return td;
        };
  
        if (tipoConsulta.value === "fecha") {
            const diasSemana = ["domingo", "lunes", "martes", "miércoles", "jueves", "viernes", "sábado"];
            const meses = ["enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"];
  
            limpiarHTML(tablaFechasTbody);
  
            fetch(this.getAttribute("action"), {
                method: "POST",
                body: formData,
            })
                .then((response) => response.json())
                .then((response) => {
                    const data = response.data;
                    data.forEach((element) => {
                        const fechaOriginal = new Date(element.fecha);
                        const diaSemana = diasSemana[fechaOriginal.getDay()];
                        const dia = fechaOriginal.getDate();
                        const mes = meses[fechaOriginal.getMonth()];
                        const anio = fechaOriginal.getFullYear();
  
                        const fechaFormateada = `${diaSemana} ${dia} de ${mes} del ${anio}`;
                        const row = document.createElement("tr");
                        const td = createTableCell(fechaFormateada, "fechaCampo");
                        row.appendChild(td);
  
                        tablaFechasTbody.appendChild(row);
                    });
                })
                .catch((error) => {
                    console.error("Error:", error);
                });
        } else if (tipoConsulta.value === "examen") {
            limpiarHTML(tablaExamenesTbody);
  
            fetch(this.getAttribute("action"), {
                method: "POST",
                body: formData,
            })
                .then((response) => response.json())
                .then((response) => {
                    const data = response.data;
                    data.forEach((element) => {
                        const row = document.createElement("tr");
  
                        const fieldOrder = {
                            tdCveMateria: createTableCell(element.cve_materia, "claveCampo"),
                            tdNombre_ing: createTableCell(element.nombre_ing, "materiaCampo"),
                            tdHora: createTableCell(element.hora, "horaCampo"),
                            tdSalon: createTableCell(element.salon, "salonCampo"),
                            tdTipo: createTableCell(element.tipo, "tipoCampo"),
                            tdNombre: createTableCell(element.nombre, "nombreCampo"),
                            tdNombre2: createTableCell(element.nombre, "nombreCampo2"),
                        };
  
                        const fieldKeys = Object.keys(fieldOrder);
  
                        fieldKeys.forEach(key => {
                            const field = fieldOrder[key];
                            row.appendChild(field);
                        });
  
                        tablaExamenesTbody.appendChild(row);
                    });
                })
                .catch((error) => {
                    console.error("Error:", error);
                });
        }
    }
  
    // Elimina todos los elementos del tbody
    function limpiarHTML(node) {
        // Forma lenta e insegura
        // node.innerHTML = '';
  
        // Forma rápida
        while (node.firstChild) {
            node.removeChild(node.firstChild);
        }
    }
  
    function seleccionarExamen(e) {
      e.preventDefault();
    
      const materiaSeleccionada = e.target.parentElement;
      const tds = Array.from(materiaSeleccionada.children);
  
      const fieldOrder = {
        materiaCampo: document.getElementById("materiaCampo"),
        tipoCampo: document.getElementById("tipoCampo"),
        salonCampo: document.getElementById("salonCampo"),
        nombreCampo: document.getElementById("nombreCampo"),
        nombreCampo2: document.getElementById("nombreCampo2"),
        claveCampo: document.getElementById("claveCampo"),
      };
    
      const fieldKeys = Object.keys(fieldOrder);
  
      tds.forEach(td => {
        fieldKeys.forEach(key => {
          if(td.classList.contains(key)) {
            const contenido = td.textContent;
            const field = fieldOrder[key];
            field.value = contenido;
          }
        });
      });
  
    }
  
  
    function consultaCalificaciones(e){
      e.preventDefault();
      //console.log("Hola");
  
      const formData = new FormData(this);
  
      const createTableCell = (content, className) => {
            const td = document.createElement("td");
            td.className = className;
            td.textContent = content;
            if (className === "calificacionModal" && !content) {
              const inputCal = document.createElement("input");
              inputCal.setAttribute("class", "w-100 text-center");
              inputCal.setAttribute("type", "text");
              inputCal.setAttribute("style", "border:none!important;cursor: pointer!important;padding:14px;");
              td.className = "p-0";
              td.appendChild(inputCal);
            }
  
            return td;
      };
  
      limpiarHTML(tablaCalificacionesTbody);
  
      fetch(this.getAttribute("action"), {
            method: "POST",
            body: formData,
      })
      .then((response) => response.json())
      .then((response) => {

            const data = response.data;
            //console.log(data);
            const claveCampo_materia = response.claveCampo_materia;
            const nombreCampo_materia = response.nombreCampo_materia;
  
            //const titleModal = document.getElementById("modal_capturaDeCalificacionesTitle");
            const materiaCampoModal = document.getElementById("materiaCampoModal");
            const claveCampoModal = document.getElementById("claveCampooModal");
  
            //titleModal.textContent = "Captura de calificaciones - Materia: " + nombreCampo_materia;
            materiaCampoModal.value = nombreCampo_materia;
            claveCampoModal.value = claveCampo_materia;
  
            console.log(data);
            data.forEach((element) => {
                const row = document.createElement("tr");
                /*
                const tdButton = document.createElement("td");
                const button = document.createElement("button");
  
                tdButton.setAttribute("class", "sin-borde");
                button.setAttribute("onclick", "transformarEnEditable(this)");
                button.setAttribute("class", "editar btn btn-primary btn-sm");
                button.textContent = "Editar";
                tdButton.appendChild(button);
                */
                const fieldOrder = {
                  tdCveUnica: createTableCell(element.cve_unica, "cve_unicaModal"),
                  tdnombre: createTableCell(element.nombre + " " + element.paterno + " " + element.materno, "nombreModal"),
                  tdCalificacion: createTableCell(element.calificacion, "calificacionModal"),
                };
  
                const fieldKeys = Object.keys(fieldOrder);
  
                fieldKeys.forEach(key => {
                    const field = fieldOrder[key];
                    row.appendChild(field);
                });
                //row.appendChild(tdButton);
  
                tablaCalificacionesTbody.appendChild(row);
            });
      })
      .catch((error) => {
          console.error("Error:", error);
      });
    }
</script>
  
  
<script>
    //Se obtiene los elementos del formulario para el filtrado de fechas
    //Junto con el boton de submit
    const form = document.getElementById('formFiltroFechas');
    const cicloEscolarInput = document.getElementById('ciclo_escolar');
    const periodoInput = document.getElementById('periodo');
    const submitButtonFechas = document.getElementById('fechasbutton');
    const submitButtonExamenes = document.getElementById('examenesbutton');
  
    // Función para verificar si los campos tienen valores seleccionados
    function verificarCampos() {
      const cicloEscolar = cicloEscolarInput.value;
      const periodo = periodoInput.value;
  
      if (cicloEscolar && periodo) {
        submitButtonFechas.disabled = false; // Habilitar el botón si ambos campos tienen valores
        submitButtonExamenes.disabled = false;
      } else {
        submitButtonFechas.disabled = true; // Deshabilitar el botón si alguno de los campos está vacío
        submitButtonExamenes.disabled = true;
      }
    }
  
    // Se agrega el evento 'change' a los campos y se llama a la funcion verificarCampos
    // De esta manera se espera a que los inputs tengan un cambio para habilitar los botones
    cicloEscolarInput.addEventListener('change', verificarCampos);
    periodoInput.addEventListener('change', verificarCampos);
  
    // Se verifican los campos iniciales al cargar la pagina
    verificarCampos();
  
</script>
@stop