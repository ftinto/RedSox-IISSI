<?php

function eliminarPago($idPago){
    require_once (dirname(dirname(dirname(__FILE__)))."\gestionBD.php");
    $conexion = crearConexionBD();
    $stmt = $conexion->prepare("CALL ELIMINAR_PAGO(?)");
    $stmt->bindParam(1, $idPago, PDO::PARAM_STR, 4000);
    $stmt -> execute();
    cerrarConexionBD($conexion);
}

?>