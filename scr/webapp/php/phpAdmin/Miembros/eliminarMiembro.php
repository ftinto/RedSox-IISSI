<html>
<head>
    <script type="text/javascript" src="../../../javascript/Admin/operacionesMiembros.js"></script>
    <title>Procesando...</title>
</head>
<body>
<?php
require_once("operacionesMiembros.php");
if(isset($_REQUEST['dni'])){
    $dniMiembro = $_REQUEST['dni'];
    $numeroPagos = numeroPagosMiembro($dniMiembro);
    $numeroPagosPendientes = numeroPagosPendientesMiembro($dniMiembro);
    if($numeroPagos>0){?>
        <form id="formularioEliminarCompletamente" method="post" action="eliminarMiembroCompletamente.php">
            <input type="hidden" name="dni" value="no">
        </form>
        <script>
            alertaEliminarMiembroConPagos(<?=$numeroPagos?>, <?=$numeroPagosPendientes?>,'<?=$dniMiembro?>');
        </script>
        <?php
    } else{
        eliminarMiembroDni($dniMiembro);
        header("Location: ../../../html/gestionMiembros.php");
    }
} else {
    echo "Ha ocurrido un fallo en la selección del miembro a borrar";
}
?>
</body>
</html>