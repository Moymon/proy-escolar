//CLASE para el filatrdo de elemntos mediante una busqueda
export class Filtro {
    constructor(datosDeBusqueda){
        this.datosDeBusqueda = datosDeBusqueda;
    }

    //Se debe definir name al crear la instacion en el constructor
    //Esta funcion obtiene la clave de name, mediante la cual se verifica si "element(la busqueda)" existe en la lista
    filtrarSearch(element) {
        const { name } = this.datosDeBusqueda;
        if(name) {
            //return rol.name === name;
            return element.name.toLowerCase().includes(name.toLowerCase());
        }
        return element;
    }

    filtrarSearchPermisos(element) {
        const { name } = this.datosDeBusqueda;
        if(name) {
            //return rol.name === name;
            return element.descripcion.toLowerCase().includes(name.toLowerCase());
        }
        return element;
    }


    //Funcion que oculta aquellos elementos que no coinciden con la busqueda
    //Recibe una lista original y otra con los resultados, de esta manera comparamos que elemntos ocultar
    showResultados(lista, listaConResultados) {
        for (let i = 0; i < lista.children.length; i++) {
            const elemento = lista.children[i];
            const name = elemento.getAttribute('data-name');
            const resultado = listaConResultados.find(resultado => resultado.name === name);
            if (resultado) {
                elemento.style.display = 'block'; // Mostrar elementos relacionados
            } else {
                elemento.style.display = 'none'; // Ocultar elementos no relacionados
            }
        }
    }

    showResultadosPermisos(lista, listaConResultados) {
        for (let i = 0; i < lista.children.length; i++) {
            const elemento = lista.children[i];
            const name = elemento.getAttribute('data-name');
            const resultado = listaConResultados.find(resultado => resultado.descripcion === name);
            if (resultado) {
                elemento.style.display = 'block'; // Mostrar elementos relacionados
            } else {
                elemento.style.display = 'none'; // Ocultar elementos no relacionados
            }
        }
    }

    //FUNCION NO UTILIZADA PERO PODIRA SER UTIL
    //funcion para mostrar un mensaje en caso de no encontrarse ningun resultado
    noResultado() {
        //limpiarHTML();

        const noResultado = document.createElement('div');
        noResultado.classList.add('alerta', 'error');
        noResultado.textContent = 'No Hay Resultados, Intenta con otros terminos de busqueda';
        resultado.appendChild(noResultado);
    }
}