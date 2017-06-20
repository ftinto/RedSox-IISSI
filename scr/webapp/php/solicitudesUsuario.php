<?php
$dni = $_SESSION['dni'];
require_once("pedidosMiembro.php");
$resultado = obtenerSolicitudesDeMiembro($dni);
$numeroDeSolicitudes =  count($resultado);
$pedidosAsociados = obtenerPedidosDeSolicitudes($resultado);
?>