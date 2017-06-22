<?php
/*
require_once("operacionesMiembros.php");
$resultado = obtenerMiembros();
$numeroDeMiembros =  count($resultado);
*/

require_once("operacionesMiembros.php");
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

if(isset($_REQUEST['viendo'])){
    $arrayViendo = array("miembros", "empleados", "entrenadores", "jugadores");
    if(esInputPerteneceArray($_REQUEST['viendo'],$arrayViendo)=='SI'){
        $viendo = $_REQUEST['viendo'];
    } else{
        header("Location: gestionMiembros.php?mensajeOperacion=falloDatosRequest");
    }
} else {
    $viendo = 'miembros';
}

if($viendo == 'empleados'){
    $numeroDeMiembros = obtenerNumeroDeEmpleados();
} else if($viendo == 'miembros'){
    $numeroDeMiembros = obtenerNumeroDeMiembros();
} else if($viendo == 'entrenadores'){
    $numeroDeMiembros = obtenerNumeroDeEntrenadores();
} else if($viendo == 'jugadores'){
    $numeroDeMiembros = obtenerNumeroDeJugadores();
}

if($numeroDeMiembros > $maximoPorPagina){
$necesitaPaginacion = 'SI';
} else {
$necesitaPaginacion = 'NO';
}


if(isset($_REQUEST['paginaSeleccionada'])){
    $paginaMaxima = (($numeroDeMiembros - (($numeroDeMiembros) % ($maximoPorPagina))) / $maximoPorPagina) + 1;
    if((esInputTodoNumerico($_REQUEST['paginaSeleccionada'])=='SI')&&(esInputNumeroMayorQue($_REQUEST['paginaSeleccionada'],$paginaMaxima)=='NO')){
        $paginaSeleccionada = $_REQUEST['paginaSeleccionada'];
    } else {
        header("Location: gestionMiembros.php?mensajeOperacion=falloDatosRequest");
    }
} else {
    $paginaSeleccionada = 1;
}

if($viendo == 'empleados'){
    $resultado = obtenerEmpleadosPaginados($paginaSeleccionada, $maximoPorPagina);
    $resultado = obtenerMiembrosDeEmpleados($resultado);
}else if($viendo == 'jugadores'){
    $resultado = obtenerJugadoresPaginados($paginaSeleccionada, $maximoPorPagina);
    $resultado = obtenerMiembrosDeJugadores($resultado);
}else if($viendo == 'entrenadores'){
    $resultado = obtenerEntrenadoresPaginados($paginaSeleccionada, $maximoPorPagina);
    $resultado = obtenerMiembrosDeEntrenadores($resultado);
} else {
    $resultado = obtenerMiembrosPaginados($paginaSeleccionada, $maximoPorPagina);
}




?>