<?php
require_once ("pedidosMiembro.php");

if(isset($_REQUEST['dni']) && isset($_REQUEST['idpedido']) && isset($_REQUEST['datosSolicitud'])){
    $dni = $_REQUEST['dni'];
    $idpedido = $_REQUEST['idpedido'];
    $datos = $_REQUEST['datosSolicitud'];
    crearSolicitud($idpedido,$datos,$dni);
    header("Location: ../html/verPedidos.php?mensajeOperacion=solicitudCreada");
} else{
    header("Location: ../html/verPedidos.php?mensajeOperacion=falloDatosRequest");
}


?>