<?php
session_start();

require_once("../../gestionBD.php");
require_once("funciones.php");
require_once("../../funcionesTipos/funcionesFechas.php");
$conexion=crearConexionBD();
$rival=$_REQUEST["rival"];
$fecha = getStringSQLFecha($_REQUEST['dia'],$_REQUEST['mes'],$_REQUEST['anio']);
$nuevoPartido["rival"]=$rival;
$nuevoPartido["dia"]=$_REQUEST['dia'];
$nuevoPartido["mes"]=$_REQUEST['mes'];
$nuevoPartido["anio"]=$_REQUEST['anio'];
$nuevoPartido["categoria"]=$_REQUEST['categoria'];
$categoria=$_REQUEST["categoria"];
$errors=validarPartido($rival,$fecha,$categoria);
$_SESSION["formPartido"]=$nuevoPartido;
if($errors==""){
	crearPartido($rival,$fecha,$categoria,$conexion);
	$_SESSION["errorPartido"]="Partido creado correctamente";
	Header('Location:../../../html/crearPartido.php');
	
}
else{
	$_SESSION["errorPartido"]=$errors;
	Header('Location:../../../html/crearPartido.php');
}

?>