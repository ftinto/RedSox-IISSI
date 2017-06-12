<?php

function obtenerPagosDeMiembro($dniMiembro) {
	require_once ("gestionBD.php");
	$conexion = crearConexionBD();
	$stmt = $conexion -> prepare("SELECT FECHALIMITE, CUANTIA, FECHAINICIO, FECHALIQUIDACION, IDPAGO, DNI, TIPOPAGO, IDSOLICITUD
FROM PAGOS WHERE dni=:data");
	$stmt -> execute(array(':data' => $dniMiembro));
	$resultado = $stmt -> fetchAll();
	cerrarConexionBD($conexion);
	return $resultado;
}


function filtrarPagosLiquidados($pagos){
	$res = array();
	$index = 0;
	foreach($pagos as $fila){
		if(esPagoLiquidado($fila) == 'NO'){
			$res[$index]=$fila;
		}
		$index = $index + 1;
	}
	return $res;
}

function ordenarPagosCronologicamente($pagosArray){
	usort($pagosArray, "compararPagosCronologicamente");
	return $pagosArray;
}

function compararPagosCronologicamente($pago1, $pago2){
	require_once("funcionesTipos/funcionesFechas.php");
	$fecha1 = getObjetoFecha($pago1["FECHAINICIO"]);
	$fecha2 = getObjetoFecha($pago2["FECHAINICIO"]);
	$res = compararFechas($fecha1, $fecha2);
	return $res;
}

function getEstadoPago($pago){
	require_once("funcionesTipos/funcionesFechas.php");
	$fechaLimite = getObjetoFecha($pago["FECHALIMITE"]);
	$localtime = new DateTime('NOW');
	$diff = compararFechas($localtime, $fechaLimite);
	if($diff <= 0){
		$res = 'Expirado';
	} else if($diff <= 7 ){
		$res = 'Urgente';
	} else {
		$res = 'Pendiente';
	}
	return $res;
}


function esPagoLiquidado($pago){
    $res = "SI";
	if(is_null($pago['FECHALIQUIDACION'])){
		$res = "NO";
	} else {
		$res = "SI";
	}
	return $res;
}

/*
function esPagoLiquidado($pago){
	require_once ("gestionBD.php");
	$conexion = crearConexionBD();
	$stmt = $conexion -> prepare('CALL ESPAGOIMPAGADO(?)');
	$stmt -> bindParam(1, $pago, PDO::PARAM_STR|PDO::PARAM_INPUT_OUTPUT, 4000);
	$stmt -> execute();
	return $pago;
}
*/



?>