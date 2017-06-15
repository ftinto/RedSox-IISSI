<?php
require_once("operacionesPagos.php");
if(isset($_REQUEST['idpago'])){
    $idpago = $_REQUEST['idpago'];
        eliminarPago($idpago);
        header("Location: ../../../html/gestionPagos.php?mensajeOperacion=pagoEliminado");
} else {
    echo "Ha ocurrido un fallo en la selección del miembro a borrar";
}
?>