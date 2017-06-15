<?php
require_once("operacionesPagos.php");
crearPagosMensuales();
header("Location: ../../../html/gestionPagos.php?mensajeOperacion=pagosMensualesCreados");
?>