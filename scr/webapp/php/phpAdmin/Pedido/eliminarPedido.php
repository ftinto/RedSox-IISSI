<html>
<head>
    <title>Procesando...</title>
</head>
<body>
<?php
require_once("operacionesPedidos.php");
require_once("../../pedidosMiembro.php");
if(isset($_REQUEST['idpedido'])){
    $idpedido = $_REQUEST['idpedido'];
    $solicitudes = obtenerSolicitudesDePedido($idpedido);
    foreach ($solicitudes as $solicitud){
        eliminarSolicitud($solicitud['IDSOLICITUD']);
    }
    eliminarPedido($idpedido);
    header("Location: ../../../html/gestionPedidos.php?mensajeOperacion=pedidoEliminado");

} else {
    header("Location: ../../../html/gestionPedidos.php?mensajeOperacion=falloDatosRequest");
}
?>
</body>
</html>