<?php
require_once("operacionesMiembros.php");
require_once (dirname(dirname(__FILE__))."\Pagos\operacionesPagos.php");
require_once (dirname(dirname(dirname(__FILE__)))."\pagosMiembro.php");
if(isset($_REQUEST['dni'])){
    $dniMiembro = $_REQUEST['dni'];
    if($dniMiembro == 'no'){
        header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=eliminarMiembroCancelado");
    }else{
        $pagos = obtenerPagosDeMiembro($dniMiembro);
        foreach ($pagos as $pago){
            eliminarPago($pago["IDPAGO"]);
        }
        eliminarMiembroDni($dniMiembro);
        header("Location: ../../../html/gestionMiembros.php");
    }
} else {
    echo "Ha ocurrido un fallo en la selección del miembro a borrar";
}
?>