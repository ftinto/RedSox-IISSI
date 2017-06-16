<?php
$dni = $_SESSION['dni'];
require_once("pagosMiembro.php");
$resultado = obtenerPagosDeMiembro($dni);
$resultado = filtrarPagosLiquidados($resultado);
$resultado = ordenarPagosCronologicamente($resultado);
$numeroDePagos =  count($resultado);
?>