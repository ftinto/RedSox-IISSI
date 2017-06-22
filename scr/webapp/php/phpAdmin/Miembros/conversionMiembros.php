<?php
if(isset($_REQUEST['dni']) && isset($_REQUEST['conversionA'])){
    require_once("operacionesMiembros.php");
    require_once("../../funcionesTipos/funcionesFechas.php");
    require_once ("../../funcionesValidacion.php");

    $dniMiembro = $_REQUEST['dni'];
    $conversion = $_REQUEST['conversionA'];
    if($conversion == 'empleado' && isset($_REQUEST['puesto']) && isset($_REQUEST['directiva'])){
        $puesto = $_REQUEST['puesto'];
        $directiva = $_REQUEST['directiva'];
        $arrayDirectiva = array("SI","NO");
        $fechaInicio = getStringSQLFecha($_REQUEST['diaInicio'],$_REQUEST['mesInicio'],$_REQUEST['anioInicio']);
        $fechaFin = getStringSQLFecha($_REQUEST['diaFin'],$_REQUEST['mesFin'],$_REQUEST['anioFin']);
        if(esInputDniNieValido($dniMiembro)=='NO'){
            header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=validacionDNI");
        } else if(esInputPerteneceArray($directiva,$arrayDirectiva)=='NO'){
            header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=falloDatosRequest");
        } else if(esInputLongitudMaxima($puesto,25)=='NO'){
            header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=validacionPuesto");
        } else if(esInputFechaValida($_REQUEST['diaInicio'],$_REQUEST['mesInicio'],$_REQUEST['anioInicio'])=='NO'){
            header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=validacionFechaInicio");
        } else if($fechaFin != null && esInputFechaValida($_REQUEST['diaFin'],$_REQUEST['mesFin'],$_REQUEST['anioFin'])=='NO'){
            header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=validacionFechaFin");
        } else if($fechaFin !=null){
            if(esInputFechaPosterior($fechaInicio,$fechaFin)=='SI'){
                header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=validacionFechaInicioFin");
            }else {
                convertirAEmpleado($dniMiembro, $puesto, $fechaInicio,$fechaFin,$directiva);
                header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=empleadoCreado");
            }
        } else {
            convertirAEmpleado($dniMiembro, $puesto, $fechaInicio,$fechaFin,$directiva);
            header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=empleadoCreado");
        }
    } else if($conversion == 'entrenador' && isset($_REQUEST['categoria'])){
        $categoria = $_REQUEST['categoria'];
        if(esInputDniNieValido($dniMiembro)=='NO'){
            header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=validacionDNI");
        } else {
            convertirAEntrenador($dniMiembro, $categoria);
            header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=miembroConvertidoEntrenador");
        }
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