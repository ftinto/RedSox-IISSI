<?php

function obtenerPagoDeSolicitud($idsolicitud){
    require_once (dirname(dirname(dirname(__FILE__)))."\gestionBD.php");
    $conexion = crearConexionBD();
    $stmt = $conexion -> prepare("SELECT FECHALIMITE, CUANTIA, FECHAINICIO, FECHALIQUIDACION, IDPAGO, DNI, TIPOPAGO, IDSOLICITUD
FROM PAGOS WHERE IDSOLICITUD=:data");
    $stmt -> execute(array(':data' => $idsolicitud));
    $resultado = $stmt -> fetchAll();
    cerrarConexionBD($conexion);
    if(count($resultado)>0){
        return $resultado[0];
    } else{
        return 'noExiste';
    }

}

function eliminarPago($idPago){
    require_once (dirname(dirname(dirname(__FILE__)))."\gestionBD.php");
    $conexion = crearConexionBD();
    $stmt = $conexion->prepare("CALL ELIMINAR_PAGO(?)");
    $stmt->bindParam(1, $idPago, PDO::PARAM_STR, 4000);
    $stmt -> execute();
    cerrarConexionBD($conexion);
}

function getCuantiaTotalMiembro($dni){
    require_once (dirname(dirname(dirname(__FILE__)))."\pagosMiembro.php");
    $pagos = obtenerPagosDeMiembro($dni);
    $pagos = filtrarPagosLiquidados($pagos);
    $res = getCuantiaTotalPagos($pagos);
    return $res;
}

function getCuantiaTotalPagos($pagos){
    $cuantia = 0;
    foreach ($pagos as $pago){
        $cuantia = $cuantia + getCuantiaPago($pago);
    }
    return $cuantia;
}

function getCuantiaPago($pago){
    $cuantia = intval($pago['CUANTIA']);
    return $cuantia;
}

function getNombrePago($pago){
    if($pago['TIPOPAGO'] == 'OTRO'){
        $res = 'OTRO';
    } else if($pago['TIPOPAGO'] == 'MENSUAL'){
        require_once (dirname(dirname(dirname(__FILE__))).'\funcionesTipos\funcionesFechas.php');
        $mes = getStringMes($pago['FECHAINICIO']);
        $res = 'Mensual '.$mes;
    } else if($pago['TIPOPAGO'] == 'PEDIDO'){
        $res = 'Pedido Solicitud '.$pago['IDPAGO'];
    }
    return $res;
}

function liquidarPago($idpago){
    require_once (dirname(dirname(dirname(__FILE__)))."\gestionBD.php");
    $conexion = crearConexionBD();
    $stmt = $conexion->prepare("CALL LIQUIDAR_PAGO(?)");
    $stmt->bindParam(1, $idpago, PDO::PARAM_STR, 4000);
    $stmt -> execute();
    cerrarConexionBD($conexion);
}

function crearPagosMensuales(){
    require_once (dirname(dirname(dirname(__FILE__)))."\gestionBD.php");
    $conexion = crearConexionBD();
    $stmt = $conexion->prepare("CALL CREAR_PAGOS_MENSUALIDAD()");
    $stmt -> execute();
    cerrarConexionBD($conexion);
}

function crearPago($fechaLimite, $cuantia, $fechaInicio, $fechaLiquidacion, $dni, $tipoPago, $idSolicitud){
    require_once (dirname(dirname(dirname(__FILE__)))."\gestionBD.php");
    $conexion = crearConexionBD();
    $stmt = $conexion->prepare("CALL CREAR_PAGO(?,?,to_date(?,'DDMMYYYY'),to_date(?,'DDMMYYYY'),?,?,?)");
    $stmt->bindParam(1, $fechaLimite, PDO::PARAM_STR, 4000);
    $stmt->bindParam(2, $cuantia, PDO::PARAM_STR, 4000);
    $stmt->bindParam(3, $fechaInicio, PDO::PARAM_STR, 4000);
    $stmt->bindParam(4, $fechaLiquidacion, PDO::PARAM_STR, 4000);
    $stmt->bindParam(5, $dni, PDO::PARAM_STR, 4000);
    $stmt->bindParam(6, $tipoPago, PDO::PARAM_STR, 4000);
    $stmt->bindParam(7, $idSolicitud, PDO::PARAM_STR, 4000);
    $stmt -> execute();
    cerrarConexionBD($conexion);
}


?>