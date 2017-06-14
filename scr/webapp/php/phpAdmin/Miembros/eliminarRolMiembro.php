<html>
<head>
    <script type="text/javascript" src="../../../javascript/Admin/operacionesMiembros.js"></script>
    <title>Procesando...</title>
</head>
<body>
<?php
require_once("operacionesMiembros.php");
if(isset($_REQUEST['dni'])&& $_REQUEST['rol']){
    $dniMiembro = $_REQUEST['dni'];
    $rol = $_REQUEST['rol'];

    if($rol == 'empleado'){
        eliminarEmpleado($dniMiembro);
        header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=empleadoEliminado");
    } else if($rol == 'entrenador'){
        eliminarEntrenador($dniMiembro);
        header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=entrenadorEliminado");
    } else if($rol == 'jugador') {
        eliminarJugador($dniMiembro);
        header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=jugadorEliminado");
    } else{
        header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=falloDatosRequest");
    }
} else {
    header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=falloDatosRequest");
}
?>
</body>
</html>