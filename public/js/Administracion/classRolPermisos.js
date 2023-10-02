export class Rol {
    //variables necesarias para la manipulacion de un rol
    constructor() {
        this._rol = ''; //El Rol seleccionado
        this.rolSeleccionado = false; //Variable para indicar si un rol fue seleccionado
        this._listaRoles = {}; //Objeto general de todos los roles retornada desde Laravel
    }

    get getRol() {
        return this._rol;
    }

    set setRol(rol) {
        this._rol = rol;
        this.rolSeleccionado = (rol !== '');
    }

    get getListaRoles(){
        return this._listaRoles;
    }

    set setListaRoles(listaRoles){
        this._listaRoles = listaRoles
    }
}

export class Permisos extends Rol{
    constructor(){
        super(); // Llama al constructor de la clase padre

        this.modulo = ''; //Modulo seleccionado
        this.moduloSeleccionado = false; //Variable para indicar si un modulo fue seleccionado

        this.ObjetoPermisos = {}; //Objeto general de todos los permisos retornada desde Laravel

        this.permisosXModulo = {}; //Objeto para los permisos del modulo seleccionado
        this.permisosXRol_Asignados = {}; //Objeto para los permisos asignados del Rol seleccionado
        this.permisosXRol_NoAsignados = {}; //Objeto para los permisos no asignados del Rol seleccionado
        this.permisosXRol_Originales = {}; //Objeto para los permisos asignados al Rol seleccionado

        //DIFERENCIAS
        // *permisosXRol_Asignados(NoAsignados): sera dinamica cada que cambie un permiso a los no asignados o se le agregue un permiso
        // *permisosXRol_Originales: se mantendra los permisos del rol al seleccionarlo, esto permitira hacer una comparacion en caso de haber cambios de permisos en el rol

        //Estas variables me permitiran mostrar los permisos que seran guardados o eliminados en un modal
        this.newPermissionsSelected = []; //Guardara momentaneamente los permisos que se moveran a los Asigandos
        this.newPermissionsDeleted = []; //Guardara momentaneamente los permisos que se moveran a los Eliminados
    }

    //Funcion para guardar los permisos que van siendo movidos y comprobar las listas de los asignados con los originales para deshabilitar el boton de guardado
    asignaListaDePermisos(newPermissionsSelected, newPermissionsDeleted) {
        this.newPermissionsSelected = newPermissionsSelected;
        this.newPermissionsDeleted = newPermissionsDeleted;
    
        //console.log(permisosAsignados);
        //Jorge D. R.M.
        // Crear conjuntos a partir de las listas, esto para hacer mas rapido la comparacion
        const setPermisosAsignados = new Set(this.permisosXRol_Asignados);
        const setPermisosOriginales = new Set(this.permisosXRol_Originales);
        if (this.comparaListaDePermisos(setPermisosAsignados, setPermisosOriginales )) {
            btnGuardadoPermisos.disabled = true;
        } else {
            btnGuardadoPermisos.disabled = false;
        }
    }

    //Funcion para comparar dos listas si son iguales
    comparaListaDePermisos(setAsignados, setOriginales) {
        let permisoMovido;
            
        if (setAsignados.size !== setOriginales.size) {
            return false;
        }
    
        for (let item of setOriginales) {
            permisoMovido = this.permisosXRol_Asignados.find(permiso => permiso.name === item.name);
            //console.log(permisoMovido);
            if (!permisoMovido) {
                return false;
            }
        }
        return true;
    }

    //Funcion setter cuando se seleccione un nuevo Rol
    actualizarPermisos(permisosRol, permisosOriginalesXRol, permisos_no_coincidentes){
        this.permisosXRol_Asignados = permisosRol;
        this.permisosXRol_Originales = permisosOriginalesXRol;
        this.permisosXRol_NoAsignados = permisos_no_coincidentes;
    }

    //Funcion que compara los permisos en las listas para posteriomente definir su color
    verificaSiPermisoEstaAsignado(permisosAsignados, permisosNoAsignados, permiso) {
        const nombrePermiso = permiso.name.toLowerCase();
        const permisoEnAsignados = permisosAsignados.find(permisoSeleccionado => permisoSeleccionado.name.toLowerCase() === nombrePermiso);
        const permisoEnNoAsignados = permisosNoAsignados.find(permisoSeleccionado => permisoSeleccionado.name.toLowerCase() === nombrePermiso);

        return [permisoEnAsignados, permisoEnNoAsignados];
    }
}



export function peticionAjaxForm(route, form) {
    return new Promise((resolve, reject) => {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", route);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onload = function () {
            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                resolve(response);
            } else {
                const message = "Error en la solicitud. Código de estado: " + xhr.status;
                reject(message);
            }
        };
        xhr.onerror = function () {
            const message = "Error en la solicitud";
            reject(message);
        };
        const formData = new FormData(form);
        const encodedData = new URLSearchParams(formData).toString();
        xhr.send(encodedData);
    });
}

export function peticionAjaxAplication(route, requestData) {
    return new Promise((resolve, reject) => {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", route);
        xhr.setRequestHeader("Content-Type", "application/json");
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        xhr.setRequestHeader("X-CSRF-TOKEN", csrfToken);

        xhr.onload = function () {
            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText); 
                resolve(response);
            } else {
                const message = "Error en la solicitud. Código de estado: " + xhr.status;
                reject(message);
            }
        };
        xhr.onerror = function () {
            const message = "Error en la solicitud";
            reject(message);
        };
        xhr.send(JSON.stringify(requestData));
    });
}