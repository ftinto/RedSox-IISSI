<?php
function validarConvocatoria($jugadores,$id,$conexion){
	foreach($jugadores as $jugador){
		$res=$conexion->query("SELECT jugadores.FEDERADO FROM JUGADORES WHERE DNI='$jugador'");
		foreach($res as $fed){
			if($fed=='NO'){
				return "hay jugadores no federados";
				break;
			}
		}
	}
	return "";
}
function crearConvocatoria($jugadores,$id,$conexion){
	$i=1;
	foreach($jugadores as $j){
		$conexion->query("CALL CONVOCAR('$id','$j','$i')");
		$i++;
	}
	
}
function crearPartido($rival,$fecha,$categoria,$conexion){
	$conexion->query("CALL CREAR_PARTIDO('$rival',to_Date('$fecha','DDMMYYYY'),null,'$categoria')");
	
}
function validarPartido($rival,$fecha,$categoria){
	if($rival!=""){
		return "";
	}
	else{
		return "error en nombre rival";
	}
}
function borrarPartido($id,$conexion){
	try{
		$conexion->query("DELETE PARTIDOS WHERE IDPARTIDO='$id'");
		Header('Location:gestionPartidos.php');
	}catch(PDOException $e){
		Header('Location:exception.php');
	}
}





?>