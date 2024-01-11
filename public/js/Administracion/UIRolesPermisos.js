//Clase para englobar aquellos metodos que definen, cambian estilos o HTML de la interfaz
export class UI {

    //Variables para los colores de la interfaz
    //Cambiarlos aqui cambiara todos los calores de la interfaz
    constructor(){
        this.colorPrincipal = "#004A98";
        this.colorSecundario = "#2C6DB1";
        
        this.colorPermisoAsignado = "#004A98";
        this.colorPermisoNoAsignado ="rgb(242, 242, 242)";
        this.colorPermisoEliminado = "#DA0000";
        this.colorPermisoNuevo= "#00B600";
    }

    //Funcion para crear los botones de los permisos
    creaBotonPermiso(nombrePermiso, idPermiso){
        let padreBotonRol = this.createElementHTML('div', '', 'col-3 padreBotonRol h-auto', '', '');
        padreBotonRol.setAttribute("data-id", idPermiso);
        padreBotonRol.setAttribute("data-name", nombrePermiso);

        let boxBotonDeRol = this.createElementHTML('div', '', 'mb-1 ml-1 boxDeRol p-1 pr-2 border rounded-pill d-flex flex-row align-items-center justify-content-between', idPermiso, '');
        //boxBotonDeRol.setAttribute('onclick', 'verificaClickBoxDeRol(this)');

        let labeLBotonRol = this.createElementHTML('div', 'user-select: none;', 'labeLBotonRol ml-1 text-wrap text-center h-100 w-100', '', nombrePermiso);

        boxBotonDeRol.appendChild(labeLBotonRol);
        padreBotonRol.appendChild(boxBotonDeRol);

        return padreBotonRol;
    }

    creaBotonUsuario(users, usersXRol, listaDeUsuarios) {
        
        // Itera sobre la lista de usuarios
        for (let usuario of users) {  
            let generalBtnUsuarios = this.createElementHTML('div', '', 'col-3', 'generalBtnUsuarios', '');
            generalBtnUsuarios.setAttribute('data-id', `${usuario.rpe}`);
            generalBtnUsuarios.setAttribute('data-name', `${usuario.nombre}`);
            let padreBtnUsuarios = this.createElementHTML('div', 'background-color:rgb(242, 242, 242);', 'checkbox-wrapper-1 mr-1 mb-2 px-2 py-1 d-flex flex-row border rounded', 'padreBtnUsuarios', '');

            let input = this.createElementHTML('input', '', 'substituted', usuario.id, '');
            input.setAttribute('type', 'checkbox');

            let label = this.createElementHTML('label', '', 'm-0', 'labelbtnUsuarios', usuario.nombre);
            label.setAttribute('for', usuario.id);

            // Verifica si el usuario está en la lista de usuarios con el rol
            if (usersXRol.find(user => user.id === usuario.id)) {
                input.setAttribute('checked', 'checked'); // Establece el atributo 'checked'
            }

            padreBtnUsuarios.appendChild(input);
            padreBtnUsuarios.appendChild(label);
            generalBtnUsuarios.appendChild(padreBtnUsuarios);

            listaDeUsuarios.appendChild(generalBtnUsuarios);
        }
    }

    //Funcion para mostrar los permisos que seran guardados o eliminados de un rol en un modal
    muestraPermisosEnModal(listaDePermisos, elementLista){
        if(listaDePermisos.length){
            for (const numeroPermiso in listaDePermisos) {
                const permiso = listaDePermisos[numeroPermiso];
                //JDRM.
                const padrePermiso = this.createElementHTML('div', '', 'col-4', '', '');
                const boxPermiso = this.createElementHTML('div', 'background-color:' + this.colorPermisoNoAsignado + ';color:black;', 'text-center mr-2 mb-2 rounded border', permiso.name, permiso.descripcion);
    
                padrePermiso.appendChild(boxPermiso);
                elementLista.appendChild(padrePermiso);
            }
        } else{
            const titulo = this.createElementHTML('h6', 'color:gray;', 'fs-6 my-2 text-center w-100', '', 'Sin permisos');
            elementLista.appendChild(titulo);
        }
    }

    //Esta funcion define el color al seleccionarse un nuevo Rol, entre los que estan asignados y los que no estan Asignados
    //Ademas aquellos que son nuevos asignados o eliminados
    setColorDeFondoYTexto(boxBotonDeRol, esAsignado, esOriginal) {
        const backgroundColor = esAsignado ? (esOriginal ? this.colorPermisoAsignado : this.colorPermisoNuevo) : (esOriginal ? this.colorPermisoEliminado : this.colorPermisoNoAsignado);
        const color = backgroundColor === this.colorPermisoNoAsignado ? 'black' : 'white';
        boxBotonDeRol.style.backgroundColor = backgroundColor;
        boxBotonDeRol.style.color = color;
    }

    //Funcion que recorres todos los elementos del sidebar de roles para en caso de ser seleccionado, cambiar su color de estado
    animacionDeBoton(lista, clase, changeColor, colorFondo, color, target){
        const divs = Array.from(lista.children);
        
        divs.forEach(div => {
            const element = div.querySelector(clase);
            element.classList.remove("selected");
            element.style.background = "";
            element.style.color = "";
        });

        if(changeColor){
            target.style.background = colorFondo;
            target.style.color = color;
            target.classList.add("selected");
        }
    }

    //Funcion que limpia todos los hijos de un elemento HTML
    limpiarHTML(element){
        while(element.firstChild){
            element.removeChild(element.firstChild);
        }
    }

    //Funcion que crea un elemento HTML
    createElementHTML(element, style, clase, id, textContent) {
        element = document.createElement(element);
        element.setAttribute('style', style);
        element.setAttribute('class', clase);
        element.id = id;
        element.textContent = textContent;

        return element;
    }

    desactivaBoton(element, isActive){
        element.disabled = isActive;
    }
}
