var paginaSeleccionada = 1;
var maximoPorPagina = 10;
var numeroPagosSolicitados = 32;

function paginacionPagos(numeroPagos) {
    if(numeroPagos > maximoPorPagina){
        numeroPagosSolicitados = numeroPagos;
        introducirNavegadorPagos(numeroPagosSolicitados);
        mostrarSoloPagina(numeroPagosSolicitados);
    }
}

function cambiarPaginaSeleccionada(nuevaPagina) {
    paginaSeleccionada = nuevaPagina;
    contenedor = document.getElementById('pagosContent').firstElementChild;
    document.getElementById('pagosContent').removeChild(contenedor);
    introducirNavegadorPagos(numeroPagosSolicitados);
    mostrarSoloPagina(numeroPagosSolicitados);
}

function introducirNavegadorPagos(numeroPagos) {
    crearContenedorBotones()
    var botones;
    botones = getNumerosVisibles(numeroPagos);
    var numeroBotones = botones.length;
    var ultimoBoton = botones[numeroBotones-1];
    for(i=0;i<numeroBotones;i++){
        introducirBotonNavegacion(botones[i], ultimoBoton)
    }
}

function crearContenedorBotones(){
    var contenedor = document.createElement("div");
    contenedor.className = 'seleccionPaginacion';
    var element = document.getElementById("pagosContent");
    var pagos = element.firstElementChild;
    element.insertBefore(contenedor, pagos);
}

function introducirBotonNavegacion(numeroBoton, ultimoBoton){
    var contenedor = document.getElementById("pagosContent").firstElementChild;
    var button = null;
    if(numeroBoton == paginaSeleccionada){
        button = document.createElement("button");
        button.className = 'botonPaginacionSeleccionado';
        /*button.addEventListener("click", function(){
            cambiarPaginaSeleccionada(numeroBoton);
        }, false);*/
        button.onclick = function() { cambiarPaginaSeleccionada(numeroBoton); };
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
            button.className = 'botonPaginacion';
            button.onclick = function() { cambiarPaginaSeleccionada(numeroBoton); };
            var node = document.createTextNode('Primera Página');
            button.appendChild(node);
            contenedor.appendChild(button);
        } else if(numeroBoton == ultimoBoton){
            button = document.createElement("button");
            button.className = 'botonPaginacion';
            button.onclick = function() { cambiarPaginaSeleccionada(numeroBoton); };
            var node = document.createTextNode('Última Página');
            button.appendChild(node);
            contenedor.appendChild(button);
        } else if(numeroBoton != 0){
            button = document.createElement("button");
            button.className = 'botonPaginacion';
            button.onclick = function() { cambiarPaginaSeleccionada(numeroBoton); };
            var node = document.createTextNode(numeroBoton);
            button.appendChild(node);
            contenedor.appendChild(button);
        }
    }
}

function mostrarSoloPagina(numeroPagos) {
    var primerPago;
    primerPago = maximoPorPagina*(paginaSeleccionada-1);
    var ultimoPago;
    ultimoPago = primerPago + maximoPorPagina -1;
    for(i=0;i<numeroPagos;i++){
        var identificador = null;
        identificador = "pago"+i;
        if(i>=primerPago && i<=ultimoPago){
            document.getElementById(identificador).style.display = '';
        } else {
            document.getElementById(identificador).style.display = 'none';
        }
    }
}


function getNumerosVisibles(numeroPagos) {
    var res;
    var numeroPaginas = ((numeroPagos - ((numeroPagos) % (maximoPorPagina))) / maximoPorPagina) + 1;
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