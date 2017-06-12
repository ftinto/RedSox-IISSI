<?php

function obtenerMiembros() {
	require_once (dirname(dirname(dirname(__FILE__)))."\gestionBD.php");
	$conexion = crearConexionBD();
	$stmt = $conexion -> prepare("SELECT DNI, NOMBRE, FECHANACIMIENTO, EMAIL, DIRECCION, TELEFONO, TIPOMIEMBRO
FROM MIEMBROS");
	$stmt -> execute();
	$resultado = $stmt -> fetchAll();
	cerrarConexionBD($conexion);
	return $resultado;
}

function eliminarMiembroDni($dni){
    require_once (dirname(dirname(dirname(__FILE__)))."\gestionBD.php");
    $conexion = crearConexionBD();
    $stmt = $conexion->prepare("CALL ELIMINARMIEMBRO(?)");
    $stmt->bindParam(1, $dni, PDO::PARAM_STR, 4000);
    $stmt -> execute();
    cerrarConexionBD($conexion);
}

function numeroPagosMiembro($dni){
    require_once (dirname(dirname(dirname(__FILE__)))."\pagosMiembro.php");
    $pagos = obtenerPagosDeMiembro($dni);
    $res = count($pagos);
    return $res;
}

function numeroPagosPendientesMiembro($dni){
    require_once (dirname(dirname(dirname(__FILE__)))."\pagosMiembro.php");
    $pagos = obtenerPagosDeMiembro($dni);
    $pagos = filtrarPagosLiquidados($pagos);
    $res = count($pagos);
    return $res;
}


?>