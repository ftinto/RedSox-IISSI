<?php
if(isset($_REQUEST['dni']) && isset($_REQUEST['conversionA'])){
    require_once("operacionesMiembros.php");
    require_once("../../funcionesTipos/funcionesFechas.php");
    $dniMiembro = $_REQUEST['dni'];
    $conversion = $_REQUEST['conversionA'];
    if($conversion == 'empleado' && isset($_REQUEST['puesto']) && isset($_REQUEST['directiva'])){
        $puesto = $_REQUEST['puesto'];
        $directiva = $_REQUEST['directiva'];
        $fechaInicio = getStringSQLFecha($_REQUEST['diaInicio'],$_REQUEST['mesInicio'],$_REQUEST['anioInicio']);
        $fechaFin = getStringSQLFecha($_REQUEST['diaFin'],$_REQUEST['mesFin'],$_REQUEST['anioFin']);
        convertirAEmpleado($dniMiembro, $puesto, $fechaInicio,$fechaFin,$directiva);
        header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=miembroConvertidoEmpleado");
    } else if($conversion == 'entrenador' && isset($_REQUEST['categoria'])){
        $categoria = $_REQUEST['categoria'];
        convertirAEntrenador($dniMiembro, $categoria);
        header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=miembroConvertidoEntrenador");
    } else if($conversion == 'jugador' && isset($_REQUEST['categoria']) && isset($_REQUEST['posicion']) && isset($_REQUEST['federado'])) {
        $categoria = $_REQUEST['categoria'];
        $posicion = $_REQUEST['posicion'];
        $federado = $_REQUEST['federado'];
        if(esJugadorAptoCategoria($dniMiembro,$categoria)=='NO'){
            header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=edadJugadorNoAptaCategoria");
        } else if(esJugadorAptoCategoria($dniMiembro,$categoria)=='SI'){
            convertirAJugador($dniMiembro, $categoria, $posicion, $federado);
            header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=miembroConvertidoJugador");
        } else{
            header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=validacionDatosGenerico");
        }
    } else{
        header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=falloDatosRequest");
    }
} else {
    header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=falloDatosRequest");
}

?>