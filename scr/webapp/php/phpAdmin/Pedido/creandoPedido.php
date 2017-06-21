<?php
require_once ("operacionesPedidos.php");
require_once("../../funcionesTipos/funcionesFechas.php");

if(isset($_REQUEST['producto']) && isset($_REQUEST['proveedor']) && isset($_REQUEST['precio']) && isset($_REQUEST['diaLimite']) && isset($_REQUEST['mesLimite']) && isset($_REQUEST['anioLimite']) && isset($_REQUEST['diaLlegada']) && isset($_REQUEST['mesLlegada']) && isset($_REQUEST['anioLlegada'])){
    $producto = $_REQUEST['producto'];
    $proveedor = $_REQUEST['proveedor'];
    $precio = $_REQUEST['precio'];
    $fechaLimite = getStringSQLFecha($_REQUEST['diaLimite'],$_REQUEST['mesLimite'],$_REQUEST['anioLimite']);
    $fechaLlegada = getStringSQLFecha($_REQUEST['diaLlegada'],$_REQUEST['mesLlegada'],$_REQUEST['anioLlegada']);
    crearPedido($producto,$precio,$fechaLimite,$fechaLlegada,$proveedor);
    header("Location: ../../../html/gestionPedidos.php?mensajeOperacion=pedidoCreado");
} else{
    header("Location: ../../../html/verPedidos.php?mensajeOperacion=falloDatosRequest");
}


?>