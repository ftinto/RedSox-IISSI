<?php
session_start();
require_once("../php/phpAdmin/Partidos/funciones.php");
require_once("../php/gestionBD.php");
$jugadores=array();
$i=0;
foreach($_GET['jugador'] as $j){
	$jugadores[$i]=$j;
	
	$i=$i+1;
}
$partido=$_GET['id'];
$conexion=crearConexionBD();
$res=validarConvocatoria($jugadores,$partido,$conexion);
if($res!=""){
	
	$_SESSION["errorConvoc"]=$res;
	Header("Location:crearConvocatoria.php");
}
else{
	crearConvocatoria($jugadores,$partido,$conexion);
	$_SESSION["errorConvoc"]="La convocatoria ha sido añadida correctamente";
	Header("Location:crearConvocatoria.php?id=$partido");
}

?>