<?php
require_once("operacionesMiembros.php");
$resultado = obtenerMiembros();
$numeroDeMiembros =  count($resultado);
?>