<html>
<head>
    <script type="text/javascript" src="../../../javascript/Admin/operacionesMiembros.js"></script>
    <title>Procesando...</title>
</head>
<body>
<?php
require_once("operacionesMiembros.php");
if(isset($_REQUEST['usuario'])){
    $usuario = $_REQUEST['usuario'];
    eliminarCuenta($usuario);
    header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=cuentaEliminada");

} else {
    header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=falloDatosRequest");
}
?>
</body>
</html>