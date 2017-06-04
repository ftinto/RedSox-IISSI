<?php
$dni1 = '58893080Q';
require_once("pagosMiembro.php");
$resultado = obtenerPagosDeMiembro($dni1);
$resultado = filtrarPagosLiquidados($resultado);
$resultadoOrdenado = ordenarPagosCronologicamente($resultado);
foreach($resultadoOrdenado as $fila){
	echo $fila["FECHAINICIO"]."-".$fila["IDPAGO"]."---///";
	echo esPagoLiquidado($fila);
}
?>
