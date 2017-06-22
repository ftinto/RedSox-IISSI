<?php
require_once ('operacionesPedidos.php');

require_once("../php/funcionesValidacion.php");


if(isset($_REQUEST['maximoPorPagina'])){
    if(esInputTodoNumerico($_REQUEST['maximoPorPagina'])=='SI'){
        $maximoPorPagina = $_REQUEST['maximoPorPagina'];
    }else{
        $maximoPorPagina = 15;
    }
} else {
    $maximoPorPagina = 15;
}

$numeroDeSolicitudes = obtenerNumeroDeSolicitudesDePedido($_REQUEST['idpedido']);

if($numeroDeSolicitudes > $maximoPorPagina){
    $necesitaPaginacion = 'SI';
} else {
    $necesitaPaginacion = 'NO';
}

if(isset($_REQUEST['paginaSeleccionada'])){
    $paginaMaxima = ($numeroDeSolicitudes / $maximoPorPagina) + (((($maximoPorPagina)-($numeroDeSolicitudes%$maximoPorPagina))%($maximoPorPagina))/($maximoPorPagina));
    if((esInputTodoNumerico($_REQUEST['paginaSeleccionada'])=='SI')&&(esInputNumeroMayorQue($_REQUEST['paginaSeleccionada'],$paginaMaxima)=='NO')){
        $paginaSeleccionada = $_REQUEST['paginaSeleccionada'];
    } else {
        header("Location: gestionMiembros.php?mensajeOperacion=falloDatosRequest");
    }
} else {
    $paginaSeleccionada = 1;
}


$resultado = obtenerSolicitudesDePedidoPaginado($_REQUEST['idpedido'],$paginaSeleccionada,$maximoPorPagina);
?>