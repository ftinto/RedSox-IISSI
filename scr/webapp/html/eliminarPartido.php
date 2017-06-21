<?php
require_once("../php/gestionBD.php");
require_once("../php/phpAdmin/Partidos/funciones.php");
$id = $_REQUEST["id"];
$conexion = crearConexionBD();
borrarPartido($id, $conexion);
?>