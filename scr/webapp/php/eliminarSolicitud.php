<html>
<head>
    <title>Procesando...</title>
</head>
<body>
<?php
require_once("pedidosMiembro.php");
if(isset($_REQUEST['idSolicitud'])){
    $solicitud = $_REQUEST['idSolicitud'];
    eliminarSolicitud($solicitud);
    header("Location: ../html/misSolicitudes.php?mensajeOperacion=solicitudEliminada");

} else {
    header("Location: ../html/misSolicitudes.php?mensajeOperacion=falloDatosRequest");
}
?>
</body>
</html>