function alertaEliminarMiembroSeleccionado(numeroMiembro){
    var idBuscado = 'miembro'+numeroMiembro;
    var miembro = document.getElementById(idBuscado);
    var nombre = miembro.firstElementChild;
    var dni = nombre.nextElementSibling;
    var nombreTexto = nombre.textContent;
    var dniTexto = dni.textContent;
    var formularioEliminar = dni.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.lastElementChild;
    var aceptado = alertaEliminarMiembro(nombreTexto, dniTexto);
    if(aceptado){
        formularioEliminar.submit();
    }
}

function alertaEliminarMiembroDesdePerfil(){
    var nombre = document.getElementById('nombreMiembro');
    var dni = document.getElementById('dniMiembro')
    var nombreTexto = nombre.textContent;
    var dniTexto = dni.textContent;
    var formularioEliminar = document.getElementById('formularioEliminarMiembroPerfil')
    var aceptado = alertaEliminarMiembro(nombreTexto, dniTexto);
    if(aceptado){
        formularioEliminar.submit();
    }
}

function alertaEliminarEmpleadoDesdePerfil(){
    var nombre = document.getElementById('nombreMiembro');
    var dni = document.getElementById('dniMiembro')
    var nombreTexto = nombre.textContent;
    var dniTexto = dni.textContent;
    var formularioEliminar = document.getElementById('formularioEliminarEmpleadoPerfil')
    var aceptado = alertaEliminarEmpleado(nombreTexto, dniTexto);
    if(aceptado){
        formularioEliminar.submit();
    }
}

function alertaEliminarEmpleado(nombre,dni){
    var a = confirm('¿Está seguro de que quiere que el miembro '+nombre+' con DNI '+dni+' deje de ser un empleado?');
    return a;
}

function alertaEliminarEntrenadorDesdePerfil(){
    var nombre = document.getElementById('nombreMiembro');
    var dni = document.getElementById('dniMiembro')
    var nombreTexto = nombre.textContent;
    var dniTexto = dni.textContent;
    var formularioEliminar = document.getElementById('formularioEliminarEntrenadorPerfil')
    var aceptado = alertaEliminarEntrenador(nombreTexto, dniTexto);
    if(aceptado){
        formularioEliminar.submit();
    }
}

function alertaEliminarEntrenador(nombre,dni){
    var a = confirm('¿Está seguro de que quiere que el miembro '+nombre+' con DNI '+dni+' deje de ser un entrenador?');
    return a;
}

function alertaEliminarJugadorDesdePerfil(){
    var nombre = document.getElementById('nombreMiembro');
    var dni = document.getElementById('dniMiembro')
    var nombreTexto = nombre.textContent;
    var dniTexto = dni.textContent;
    var formularioEliminar = document.getElementById('formularioEliminarJugadorPerfil')
    var aceptado = alertaEliminarJugador(nombreTexto, dniTexto);
    if(aceptado){
        formularioEliminar.submit();
    }
}

function alertaEliminarJugador(nombre,dni){
    var a = confirm('¿Está seguro de que quiere que el miembro '+nombre+' con DNI '+dni+' deje de ser un jugador?');
    return a;
}

function alertaEliminarMiembro(nombre,dni){
    var a = confirm('¿Está seguro de que quiere eliminar al miembro '+nombre+' con DNI '+dni+'?');
    return a;
}

function alertaEliminarMiembroConPagos(numeroPagos, numeroPendientes, dni){
    var confirmacion = confirm('El miembro de DNI '+dni+' tiene '+numeroPagos+' pagos, de los cuales '+numeroPendientes+' no han sido liquidados todavía. Si lo elimina, se pederá el registro de estos pagos, ¿Desea eliminarlo?');
    var validacion = 'no';
    if(confirmacion){
        validacion = dni;
    } else{
        validacion = 'no';
    }
    var formulario = document.getElementById('formularioEliminarCompletamente');
    formulario.firstElementChild.setAttribute('value', validacion);
    formulario.submit();
}

function alertaEliminarCuentaDesdePerfil(){
    var nombre = document.getElementById('nombreMiembro');
    var dni = document.getElementById('dniMiembro')
    var nombreTexto = nombre.textContent;
    var dniTexto = dni.textContent;
    var formularioEliminar = document.getElementById('formularioEliminarCuentaPerfil')
    var aceptado = alertaEliminarCuenta(nombreTexto, dniTexto);
    if(aceptado){
        formularioEliminar.submit();
    }
}

function alertaEliminarCuenta(nombre,dni){
    var a = confirm('¿Está seguro de que quiere eliminar la cuenta del miembro '+nombre+' con DNI '+dni+'?');
    return a;
}

function post(path, params, method) {
    method = method || "post";
    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", path);

    for(var key in params) {
        if(params.hasOwnProperty(key)) {
            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", key);
            hiddenField.setAttribute("value", params[key]);

            form.appendChild(hiddenField);
        }
    }

    document.body.appendChild(form);
    form.submit();
}


function introducirNavegadorPaginacion(pagina,maximoPorPagina,numeroMiembros) {
    var contenedor = document.getElementById("navegadorGestionMiembros");
    var button = null;
    button = document.createElement("span");
    button.className = 'suspensivosPaginacion';
    var node = document.createTextNode(' Selecciona la página: ');
    button.appendChild(node);
    contenedor.appendChild(button);
    var botones;
    botones = getNumerosVisibles(numeroMiembros,maximoPorPagina,pagina);
    var numeroBotones = botones.length;
    var ultimoBoton = botones[numeroBotones-1];
    for(i=0;i<numeroBotones;i++){
        introducirBotonNavegacion(botones[i], ultimoBoton, pagina)
    }
}

function introducirBotonNavegacion(numeroBoton, ultimoBoton, paginaSeleccionada){
    var contenedor = document.getElementById("navegadorGestionMiembros");
    var button = null;
    if(numeroBoton == paginaSeleccionada){
        button = document.createElement("button");
        button.className = 'botonPaginacionSeleccionado button';
        button.setAttribute("name","paginaSeleccionada");
        button.setAttribute("value",numeroBoton);
        /*button.addEventListener("click", function(){
         cambiarPaginaSeleccionada(numeroBoton);
         }, false);*/
        var node = document.createTextNode(numeroBoton);
        button.appendChild(node);
        contenedor.appendChild(button);
    } else{
        if(numeroBoton == '...'){
            button = document.createElement("span");
            button.className = 'suspensivosPaginacion';
            var node = document.createTextNode(numeroBoton);
            button.appendChild(node);
            contenedor.appendChild(button);
        } else if(numeroBoton == 1){
            button = document.createElement("button");
            button.className = 'botonPaginacion button';
            button.setAttribute("name","paginaSeleccionada");
            button.setAttribute("value",numeroBoton);
            var node = document.createTextNode('Primera Página');
            button.appendChild(node);
            contenedor.appendChild(button);
        } else if(numeroBoton == ultimoBoton){
            button = document.createElement("button");
            button.className = 'botonPaginacion button';
            button.setAttribute("name","paginaSeleccionada");
            button.setAttribute("value",numeroBoton);
            var node = document.createTextNode('Última Página');
            button.appendChild(node);
            contenedor.appendChild(button);
        } else if(numeroBoton != 0){
            button = document.createElement("button");
            button.className = 'botonPaginacion button';
            button.setAttribute("name","paginaSeleccionada");
            button.setAttribute("value",numeroBoton);
            var node = document.createTextNode(numeroBoton);
            button.appendChild(node);
            contenedor.appendChild(button);
        }
    }
}

function getNumerosVisibles(numeroDatos, maximoPorPagina, paginaSeleccionada) {
    var res;
    var numeroPaginas = ((numeroDatos - ((numeroDatos) % (maximoPorPagina))) / maximoPorPagina) + 1;
    if (numeroPaginas < 6) {
        res = new Array(numeroPaginas);
        for (i = 0; i < numeroPaginas; i++) {
            res[i] = i+1;
        }
    } else if (numeroPaginas > 5) {
        res = new Array(7);
        res[0] = 1;
        res[6] = numeroPaginas;
        if (paginaSeleccionada > 3) {
            res[1] = '...';
        } else {
            res[1] = 0;
        }
        if (paginaSeleccionada < (numeroPaginas - 2)) {
            res[5] = '...';
        } else {
            res[5] = 0;
        }
        if (!(paginaSeleccionada == 1 || paginaSeleccionada == numeroPaginas)) {
            res[3] = paginaSeleccionada;
        } else {
            res[3] = 0;
        }
        if (paginaSeleccionada > 2) {
            res[2] = paginaSeleccionada - 1;
        } else {
            res[2] = 0;
        }

        if (paginaSeleccionada < (numeroPaginas - 1)) {
            res[4] = paginaSeleccionada + 1;
        } else {
            res[4] = 0;
        }

    }
    return res;
}