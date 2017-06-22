<?php

function obtenerSolicitudesDePedido($idpedido) {
    require_once (dirname(dirname(dirname(__FILE__)))."\gestionBD.php");
    $conexion = crearConexionBD();
    $stmt = $conexion -> prepare("SELECT IDSOLICITUD, IDPEDIDO, DATOS
FROM SOLICITUDES WHERE IDPEDIDO=:data");
    $stmt -> execute(array(':data' => $idpedido));
    $resultado = $stmt -> fetchAll();
    cerrarConexionBD($conexion);
    return $resultado;
}

function obtenerSolicitudesDePedidoPaginado($idpedido,$page_num, $page_size) {
    require_once (dirname(dirname(dirname(__FILE__)))."\gestionBD.php");
    $conexion = crearConexionBD();
    $stmt = "SELECT IDSOLICITUD, IDPEDIDO, DATOS
FROM SOLICITUDES WHERE IDPEDIDO=".$idpedido;
    $resultado = consulta_paginada($conexion,$stmt,$page_num,$page_size);
    $resultado = $resultado -> fetchAll();
    cerrarConexionBD($conexion);
    return $resultado;
}

function obtenerNumeroDeSolicitudesDePedido($idpedido) {
    require_once (dirname(dirname(dirname(__FILE__)))."\gestionBD.php");
    $conexion = crearConexionBD();
    $stmt = $conexion -> prepare("SELECT *
FROM SOLICITUDES WHERE IDPEDIDO=:data");
    $stmt -> execute(array(':data' => $idpedido));
    $resultado = $stmt -> fetchAll();
    cerrarConexionBD($conexion);
    return count($resultado);
}

function crearPedido($producto, $precio, $fechaLimite, $fechaLlegada, $proveedor){
    require_once (dirname(dirname(dirname(__FILE__)))."\gestionBD.php");
    $conexion = crearConexionBD();
    $stmt = $conexion -> prepare("CALL CREARPEDIDO(to_date(?,'DDMMYYYY'),to_date(?,'DDMMYYYY'),?,?,?)");
    $stmt->bindParam(1, $fechaLlegada, PDO::PARAM_STR, 4000);
    $stmt->bindParam(2, $fechaLimite, PDO::PARAM_STR, 4000);
    $stmt->bindParam(3, $producto, PDO::PARAM_STR, 4000);
    $stmt->bindParam(4, $proveedor, PDO::PARAM_STR, 4000);
    $stmt->bindParam(5, $precio, PDO::PARAM_STR, 4000);
    $stmt -> execute();
    cerrarConexionBD($conexion);
}

function obtenerPagosDeSolicitudes($solicitudes){
    require_once (dirname(dirname(__FILE__))."\Pagos\operacionesPagos.php");
    $res = array();
    $index = 0;
    foreach($solicitudes as $fila){
        $pago = obtenerPagoDeSolicitud($fila['IDSOLICITUD']);
        $res[$index]=$pago;
        $index = $index + 1;
    }
    return $res;
}

function eliminarPedido($idpedido){
    require_once (dirname(dirname(dirname(__FILE__)))."\gestionBD.php");
    $conexion = crearConexionBD();
    $stmt = $conexion->prepare("CALL ELIMINAR_PEDIDO(?)");
    $stmt->bindParam(1, $idpedido, PDO::PARAM_STR, 4000);
    $stmt -> execute();
    cerrarConexionBD($conexion);
}

function obtenerMiembrosDePagos($pagos){
    require_once (dirname(dirname(__FILE__))."\Miembros\operacionesMiembros.php");
    $res = array();
    $index = 0;
    foreach($pagos as $fila){
        if($fila == 'noExiste'){
            $res[$index]= 'noExiste';
        } else{
            $miembro = obtenerMiembro($fila['DNI']);
            $res[$index]=$miembro[0];
        }

        $index = $index + 1;
    }
    return $res;
}

function obtenerMiembrosDeSolicitudes($solicitudes){
    $res = obtenerPagosDeSolicitudes($solicitudes);
    $res = obtenerMiembrosDePagos($res);
    return $res;
}


?>