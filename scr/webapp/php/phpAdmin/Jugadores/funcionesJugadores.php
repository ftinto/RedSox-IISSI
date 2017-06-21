<?php
function consultaJugadores($conexion){
	try{
	$query="SELECT * FROM JUGADORES J,MIEMBROS M WHERE J.dni=M.dni";
	$res=$conexion->query($query);
	return $res;
	}
	catch(PDOEXCEPTION $e){
		Header('Location:admin.php');
		
	}
}


?>