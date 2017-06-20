<?php

function obtenerPedidos() {
    require_once ("gestionBD.php");
    $conexion = crearConexionBD();
    $stmt = $conexion -> prepare("SELECT IDPEDIDO, FECHALIMITE, FECHALLEGADA, PROVEEDOR, PRODUCTO, PRECIOPRODUCTO
FROM PEDIDOS");
    $stmt -> execute();
    $resultado = $stmt -> fetchAll();
    cerrarConexionBD($conexion);
    return $resultado;
}


function obtenerSolicitudesDeMiembro($dniMiembro) {
    require_once ("pagosMiembro.php");
    $resultado = obtenerPagosDeMiembro($dniMiembro);
    $resultado = filtrarPagosOtroYMensuales($resultado);
    $resultado = obtenerSolicitudesDePagos($resultado);
    return $resultado;
}

function obtenerPedidosDeSolicitudes($solicitudes){
    $res = array();
    $index = 0;
    foreach($solicitudes as $fila){
        $res[$index]=$fila['IDPEDIDO'];
        $index = $index + 1;
    }

    $res = obtenerPedidosDeIds($res);

    return $res;
}

function obtenerPedidosDeIds($arrayID){
    $res = array();
    $index = 0;
    foreach($arrayID as $id){
        $pedido = obtenerPedido($id);
        $res[$index]=$pedido;
        $index = $index + 1;
    }
    return $res;
}

function obtenerPedido($idPedido){
    require_once ("gestionBD.php");
    $conexion = crearConexionBD();
    $stmt = $conexion -> prepare("SELECT IDPEDIDO, FECHALIMITE, FECHALLEGADA, PROVEEDOR, PRODUCTO, PRECIOPRODUCTO
FROM PEDIDOS WHERE IDPEDIDO=:data");
    $stmt -> execute(array(':data' => $idPedido));
    $resultado = $stmt -> fetchAll();
    cerrarConexionBD($conexion);
    return $resultado[0];
}

function obtenerSolicitud($idSolicitud){
    require_once ("gestionBD.php");
    $conexion = crearConexionBD();
    $stmt = $conexion -> prepare("SELECT IDSOLICITUD, IDPEDIDO, DATOS
FROM SOLICITUDES WHERE IDSOLICITUD=:data");
    $stmt -> execute(array(':data' => $idSolicitud));
    $resultado = $stmt -> fetchAll();
    cerrarConexionBD($conexion);
    return $resultado[0];
}

function obtenerSolicitudesDePagos($pagos){
    $res = array();
    $index = 0;
    foreach($pagos as $fila){
        $res[$index]=$fila['IDSOLICITUD'];
        $index = $index + 1;
    }

    $res = obtenerSolicitudesDeIds($res);

    return $res;
}

function obtenerSolicitudesDeIds($arrayID){
    $res = array();
    $index = 0;
    foreach($arrayID as $id){
        $solicitud = obtenerSolicitud($id);
        $res[$index]=$solicitud;
        $index = $index + 1;
    }
    return $res;
}

function filtrarPedidosEntregados($pedidos){
    $res = array();
    $index = 0;
    foreach($pedidos as $fila){
        if(esPedidoEntregado($fila) == 'NO'){
            $res[$index]=$fila;
            $index = $index + 1;
        }
    }
    return $res;
}

function filtrarPedidosNoActivos($pedidos){
    $res = array();
    $index = 0;
    foreach($pedidos as $fila){
        if(esPedidoNoActivo($fila) == 'NO'){
            $res[$index]=$fila;
            $index = $index + 1;
        }
    }
    return $res;
}

function filtrarPedidosActivos($pedidos){
    $res = array();
    $index = 0;
    foreach($pedidos as $fila){
        if(esPedidoNoActivo($fila) == 'SI'){
            $res[$index]=$fila;
            $index = $index + 1;
        }
    }
    return $res;
}

function ordenarPedidosCronologicamente($pedidosArray){
    usort($pedidosArray, "compararPedidosCronologicamente");
    return $pedidosArray;
}

function compararPedidosCronologicamente($pedido1, $pedido2){
    require_once("funcionesTipos/funcionesFechas.php");
    $fecha1 = getObjetoFecha($pedido1["FECHALIMITE"]);
    $fecha2 = getObjetoFecha($pedido2["FECHALIMITE"]);
    $res = compararFechas($fecha2, $fecha1);
    return $res;
}



function esPedidoEntregado($pedido){
    if(is_null($pedido['FECHALLEGADA'])){
        $res = 'NO';
    } else {
        require_once('funcionesTipos/funcionesFechas.php');
        $fechaLlegada = getObjetoFecha($pedido['FECHALLEGADA']);
        $fechaActual = new DateTime('now');
        $haPasado = compararFechas($fechaLlegada, $fechaActual);
        if($haPasado==-1){
            $res = 'NO';
        } else {
            $res = 'SI';
        }
    }
    return $res;
}


function esPedidoNoActivo($pedido){
    if(is_null($pedido['FECHALIMITE'])){
        $res = 'NO';
    } else {
        require_once('funcionesTipos/funcionesFechas.php');
        $fechaLimite = getObjetoFecha($pedido['FECHALIMITE']);
        $fechaActual = new DateTime('now');
        $haPasado = compararFechas($fechaLimite, $fechaActual);
        if($haPasado==-1 || $haPasado==0){
            $res = 'NO';
        } else {
            $res = 'SI';
        }
    }
    return $res;
}

function crearSolicitud($idpedido, $datos, $dni){
    require_once (dirname(__FILE__)."\gestionBD.php");
    $conexion = crearConexionBD();
    $stmt = $conexion -> prepare("CALL CREARSOLICITUD(?,?,?)");
    $stmt->bindParam(1, $idpedido, PDO::PARAM_STR, 4000);
    $stmt->bindParam(2, $datos, PDO::PARAM_STR, 4000);
    $stmt->bindParam(3, $dni, PDO::PARAM_STR, 4000);
    $stmt -> execute();
    cerrarConexionBD($conexion);
}

function eliminarSolicitud($solicitud){
    require_once (dirname(__FILE__)."\gestionBD.php");
    $conexion = crearConexionBD();
    $stmt = $conexion->prepare("CALL ELIMINAR_SOLICITUD(?)");
    $stmt->bindParam(1, $solicitud, PDO::PARAM_STR, 4000);
    $stmt -> execute();
    cerrarConexionBD($conexion);
}



?>