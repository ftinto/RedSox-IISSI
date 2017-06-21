<?php
require_once("gestionBD.php");
$con=crearConexionBD();
$res=$con->query("SELECT * FROM PARTIDOS");
?>