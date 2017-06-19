<?php
$dni = $_SESSION['dni'];
require_once("pedidosMiembro.php");
$resultado = obtenerPedidosMiembro($dni);
$resultado = filtrarPedidosRealizados($resultado);
$resultado = ordenarPedidosCronologicamente($resultado);
$numeroDePedidos =  count($resultado);
?>