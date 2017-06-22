function introducirNavegadorPaginacion(pagina,maximoPorPagina,numeroSolicitudes) {
    var contenedor = document.getElementById("navegadorGestionSolicitudes");
    var button = null;
    button = document.createElement("span");
    button.className = 'suspensivosPaginacion';
    var node = document.createTextNode(' Selecciona la página: ');
    button.appendChild(node);
    contenedor.appendChild(button);
    var botones;
    botones = getNumerosVisibles(numeroSolicitudes,maximoPorPagina,pagina);
    var numeroBotones = botones.length;
    var ultimoBoton = botones[numeroBotones-1];
    for(i=0;i<numeroBotones;i++){
        introducirBotonNavegacion(botones[i], ultimoBoton, pagina)
    }
}

function introducirBotonNavegacion(numeroBoton, ultimoBoton, paginaSeleccionada){
    var contenedor = document.getElementById("navegadorGestionSolicitudes");
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
    var numeroPaginas = (numeroDatos / maximoPorPagina) + ((((maximoPorPagina)-(numeroDatos%maximoPorPagina))%(maximoPorPagina))/(maximoPorPagina));
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
