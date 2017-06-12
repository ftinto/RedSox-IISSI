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
