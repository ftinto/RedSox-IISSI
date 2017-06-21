<?php
/*
require_once("operacionesMiembros.php");
$resultado = obtenerMiembros();
$numeroDeMiembros =  count($resultado);
*/

require_once("operacionesMiembros.php");

if(isset($_REQUEST['paginaSeleccionada'])){
$paginaSeleccionada = $_REQUEST['paginaSeleccionada'];
} else {
$paginaSeleccionada = 1;
}

if(isset($_REQUEST['maximoPorPagina'])){
$maximoPorPagina = $_REQUEST['maximoPorPagina'];
} else {
$maximoPorPagina = 15;
}

if(isset($_REQUEST['viendo'])){
    $viendo = $_REQUEST['viendo'];
} else {
    $viendo = 'miembros';
}

$numeroDeMiembros = obtenerNumeroDeMiembros();

if($numeroDeMiembros > $maximoPorPagina){
$necesitaPaginacion = 'SI';
} else {
$necesitaPaginacion = 'NO';
}

$resultado = obtenerMiembrosPaginados($paginaSeleccionada, $maximoPorPagina);


?>