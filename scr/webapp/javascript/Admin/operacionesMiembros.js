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