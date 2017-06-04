<?php
$dni1 = '12443898R';
$dni2 = '25704673B';
require_once("pagosMiembro.php");
$resultado = obtenerPagosDeMiembro($dni2);
$resultado = filtrarPagosLiquidados($resultado);
$resultado = ordenarPagosCronologicamente($resultado);
?>