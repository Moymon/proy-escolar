export class UI{

/********************************************************************************/
/* Fuinciones de carga y limpieza                                                */
/********************************************************************************/

// Funcion para la limpieza de una tabla cuando esta ya tiene datos y se quiere
// cargar nuevos datos
    limpiarHTML(node) {
        // Forma lenta e insegura
        // node.innerHTML = '';
    
        // Forma rápida
        while (node.firstChild) {
            node.removeChild(node.firstChild);
        }
    }

//Funcion para desahbilitar o habilitar los botones cuando se hace una consulta de cualquiera de los form
//de la pantalla
    deshabilitarBotones(content) {
        const botonGuardar = document.querySelector("#guardarCalificaciones");
        const botonCalificaciones = document.querySelector("#calificacionesbutton");

        botonCalificaciones.disabled = content;
        botonGuardar.disabled = content;
    }


    displayError(textContent, deshabiltar, tipoError) {
        if (deshabiltar === false) {
            const error = document.getElementById(tipoError);
            error.setAttribute("style", "display:none;");
            error.innerHTML = ``;
            return;
        }
        const error = document.getElementById(tipoError);
        error.setAttribute("style", "display:block;");
        const alerta = this.createHTML('div', 'alert alert-danger d-flex align-items-center', '', '', '');
        const iconoBox = this.createHTML('h4', 'p-0 m-0', '', '', '');
        const icono = this.createHTML('i', 'fa fa-times', '', '', '');
        const titulo = this.createHTML('h6', 'm-0 ml-3', '', '', textContent) ;

        iconoBox.appendChild(icono);
        alerta.appendChild(iconoBox);
        alerta.appendChild(titulo);

        error.appendChild(alerta);
    
        setTimeout(() => {
            alerta.classList.add('alerta-fade');
        }, 10);
    
        setTimeout(() => {
            alerta.style.transition = 'opacity 0.5s'; // Ajusta la duración de la transición según tus preferencias
            alerta.style.opacity = '0';
            setTimeout(() => {
                alerta.remove();
            }, 500);
        }, 2000);
    }

    cargarLimpiezaDeTabla(tablaTbody, tabla, tipoError) {
        // Destruir la instancia de DataTables existente
        if ($.fn.DataTable.isDataTable("#" + tabla)) {
            $("#" + tabla)
                .DataTable()
                .destroy();
        }
        this.limpiarHTML(tablaTbody); //Se limpia la tabla en caso de haber datos ya consultados
        this.displayError("", false, tipoError);
    }


    edicionDeTablas(tabla, scrollY, scrollCollapse, paging, searching, info, pageLength, lengthMenu) {
        // Inicialización de DataTables con paginación, scroll y buscador
        $("#" + tabla).DataTable({
            scrollY: scrollY,
            scrollCollapse: scrollCollapse,
            paging: paging, // Habilitar paginación
            searching: searching, // Habilitar el buscador
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json",
            },
            info: info,
            pageLength: pageLength,
            lengthMenu: lengthMenu,
        });
    }

    createHTML(element, clase, estilo, id, text){
        let elementHTML = document.createElement(element);
        elementHTML.setAttribute('class', clase);
        elementHTML.setAttribute('style', estilo);
        elementHTML.setAttribute('id', id);
        elementHTML.textContent = text;

        return elementHTML;
    }



/********************************************************************************/
/* Funciones: para la creacion de celdas 'td' en las tablas de la pantalla      */
/* estas funciones son llamadas cuando se hace una cosulta nueva y se asignan   */
/* nuevos datos a las tablas   
        Parametros:
            - content: es el contenido de los datos recibidos por controlador
            - className: es la clase con la que se identificara cada celda
    */
/********************************************************************************/

    createTableCell(content, className) {
        const td = document.createElement("td");
        td.className = className;
        td.textContent = content;
        //td.data-original-value="10"
    
        return td;
    }


    /* Parametros:
            - content: es el contenido de los datos recibidos por controlador, es la informacion que contendra la celda de la tabla
            - className: es la clase con la que se identificara cada celda
            - todasLasCalificacionesNoNulas: booleano con la evaluacion de si las calificaciones en alguna no existe el registro
                si en alguna no hay registro se considera como captura por primera vez, si no hay registro se considera como 
                editable
    */

    createTableCellCalificacion(content, className, todasLasCalificacionesNoNulas) {
        const td = document.createElement("td");
        td.className = className;
        td.textContent = content;
        if (todasLasCalificacionesNoNulas) {
            //Si no son nulas se agrega el boton para edicion en la celda de la calificacion
            // Todos los elementos de calificacion no son nulos o vacíos

            const divIcon = document.createElement("div");
            const buttonCaptura = document.createElement("button");

            buttonCaptura.setAttribute("class", "w-100 h-100 btn btn-primary p-0");
            buttonCaptura.disabled = false;
            buttonCaptura.setAttribute("onclick", "transformarEnEditable(this)");
            buttonCaptura.innerHTML = `
                        <i class='fas fa-edit'></i>
                        `;
            divIcon.appendChild(buttonCaptura);

            divIcon.setAttribute("style", "height:26px;width:26px;top:25%;left:85%;");
            divIcon.setAttribute("class", "position-absolute");

            td.setAttribute("class", "d-flex align-items-center justify-content-center position-relative " + className);
            td.appendChild(divIcon);
        } else {
            //Si no es editable se agrega el boton de captura de save, pero no es funcional solo es adorno para la celda, siginifica que es la primera captura
            // Al menos uno de los elementos de calificacion es nulo o vacío
            const inputCal = document.createElement("input");
            const divIcon = document.createElement("div");
            const buttonCaptura = document.createElement("button");

            buttonCaptura.setAttribute("class", "w-100 h-100 btn p-0");
            buttonCaptura.disabled = true;
            buttonCaptura.innerHTML = `
                        <i class='fas fa-save' style='color:#b4b4b4'></i>
                        `;
            divIcon.appendChild(buttonCaptura);

            divIcon.setAttribute("style", "height:26px;width:26px;top:25%;left:85%;");
            divIcon.setAttribute("class", "position-absolute");

            inputCal.setAttribute("class", "w-25 text-center");
            inputCal.setAttribute("type", "text");
            inputCal.setAttribute("style", "cursor: pointer!important;border-top:none!important;border-right:none!important;border-left:none!important;background-color:transparent!important;");

            td.setAttribute("class", "d-flex align-items-center justify-content-center position-relative " + className);
            td.appendChild(inputCal);
            td.appendChild(divIcon);
        }

        return td;
    }
}