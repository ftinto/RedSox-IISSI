<?php
require_once("operacionesPagos.php");
require_once("../../funcionesTipos/funcionesFechas.php");
if(isset($_REQUEST['dni']) && isset($_REQUEST['cuantia'])){
    $dni = $_REQUEST['dni'];
    $cuantia = $_REQUEST['cuantia'];
    $fechaLimite = getStringSQLFecha($_REQUEST['diaLimite'],$_REQUEST['mesLimite'],$_REQUEST['anioLimite']);
    $fechaActual = getStringSQLFechaActual();
    crearPago($fechaLimite,$cuantia,$fechaActual,null,$dni,'OTRO',null);
    header("Location: ../../../html/gestionPagos.php?mensajeOperacion=pagoCreado");
} else {
    echo "Ha ocurrido un fallo en la selección del miembro.";
}
?>