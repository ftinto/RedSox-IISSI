<?php
require_once("operacionesMiembros.php");
$resultado = obtenerMiembros();
$resultado = filtrarMiembrosConUsuario($resultado);
$numeroDeMiembros =  count($resultado);
?>