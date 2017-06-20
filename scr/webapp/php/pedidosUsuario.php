<?php
require_once("pedidosMiembro.php");
$resultado = obtenerPedidos();
$resultado = filtrarPedidosEntregados($resultado);
$resultado = ordenarPedidosCronologicamente($resultado);
$activos = filtrarPedidosNoActivos($resultado);
$noEntregados = filtrarPedidosActivos($resultado);
$numeroDePedidos =  count($resultado);
?>