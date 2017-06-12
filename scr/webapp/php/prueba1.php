<?php
$dni1 = '12443898R';
$dni2 = '25704673B';
$dni3 = '86917931B';
require_once("pagosMiembro.php");
$resultado = obtenerPagosDeMiembro($dni3);
$resultado = ordenarPagosCronologicamente($resultado);
$numeroDePagos =  count($resultado);
foreach ($resultado as $fila){
    echo $fila["FECHALIQUIDACION"];
    echo esPagoLiquidado($fila);
}
?>