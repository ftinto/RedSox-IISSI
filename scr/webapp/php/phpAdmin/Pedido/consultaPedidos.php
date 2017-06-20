<?php

require_once("../php/pedidosMiembro.php");
$resultado = obtenerPedidos();
$resultado = filtrarPedidosEntregados($resultado);
$resultado = ordenarPedidosCronologicamente($resultado);
$activos = filtrarPedidosNoActivos($resultado);
$noEntregados = filtrarPedidosActivos($resultado);
$numeroDePedidos =  count($resultado);

?>