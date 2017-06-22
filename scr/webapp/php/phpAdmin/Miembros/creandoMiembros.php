<?php
if(isset($_REQUEST['dni']) && isset($_REQUEST['creando']) && isset($_REQUEST['nombre']) && isset($_REQUEST['diaNacimiento']) && isset($_REQUEST['mesNacimiento']) && isset($_REQUEST['anioNacimiento']) && isset($_REQUEST['email']) && isset($_REQUEST['direccion']) && isset($_REQUEST['telefono']) && !($_REQUEST['diaNacimiento']=='') && !($_REQUEST['mesNacimiento']=='') && !($_REQUEST['anioNacimiento']=='')){
    require_once("operacionesMiembros.php");
    require_once("../../funcionesTipos/funcionesFechas.php");
    require_once ("../../funcionesValidacion.php");
    $dni = $_REQUEST['dni'];
    $creando = $_REQUEST['creando'];
    $nombre = $_REQUEST['nombre'];
    $fechaNacimiento = getStringSQLFecha($_REQUEST['diaNacimiento'],$_REQUEST['mesNacimiento'],$_REQUEST['anioNacimiento']);
    $email = $_REQUEST['email'];
    $direccion = $_REQUEST['direccion'];
    $telefono = $_REQUEST['telefono'];
    if($creando == 'empleado' && isset($_REQUEST['puesto']) && isset($_REQUEST['directiva'])){
        $puesto = $_REQUEST['puesto'];
        $directiva = $_REQUEST['directiva'];
        $fechaInicio = getStringSQLFecha($_REQUEST['diaInicio'],$_REQUEST['mesInicio'],$_REQUEST['anioInicio']);
        $fechaFin = getStringSQLFecha($_REQUEST['diaFin'],$_REQUEST['mesFin'],$_REQUEST['anioFin']);
        $arrayDirectiva = array("SI","NO");

        if(esInputDniNieValido($dni)=='NO'){
            header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=validacionDNI");
        } else if(esInputEmailValido($email)=='NO'){
            header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=validacionEmail");
        } else if(esInputFechaValida($_REQUEST['diaNacimiento'],$_REQUEST['mesNacimiento'],$_REQUEST['anioNacimiento'])=='NO'){
            header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=validacionFechaNacimiento");
        } else if(esInputLongitudMaxima($direccion,80)=='NO'){
            header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=validacionDireccion");
        } else if(esInputLongitudMaxima($nombre,80)=='NO'){
            header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=validacionNombre");
        } else if(esInputTelefonoValido($telefono)=='NO'){
            header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=validacionTelefono");
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
            crearEmpleado($dni, $puesto, $fechaInicio,$fechaFin,$directiva, $nombre, $email, $fechaNacimiento, $direccion, $telefono);
            header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=empleadoCreado");
        }
    } else {
            crearEmpleado($dni, $puesto, $fechaInicio,$fechaFin,$directiva, $nombre, $email, $fechaNacimiento, $direccion, $telefono);
            header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=empleadoCreado");
    }

    } else if($creando == 'entrenador' && isset($_REQUEST['categoria'])){
        $categoria = $_REQUEST['categoria'];

        if(esInputDniNieValido($dni)=='NO'){
            header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=validacionDNI");
        } else if(esInputEmailValido($email)=='NO'){
            header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=validacionEmail");
        } else if(esInputFechaValida($_REQUEST['diaNacimiento'],$_REQUEST['mesNacimiento'],$_REQUEST['anioNacimiento'])=='NO'){
            header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=validacionFechaNacimiento");
        } else if(esInputLongitudMaxima($direccion,80)=='NO'){
            header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=validacionDireccion");
        } else if(esInputLongitudMaxima($nombre,80)=='NO'){
            header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=validacionNombre");
        } else if(esInputTelefonoValido($telefono)=='NO'){
            header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=validacionTelefono");
        } else {
            crearEntrenador($dni, $categoria, $nombre, $email, $fechaNacimiento, $direccion, $telefono);
            header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=entrenadorCreado");
        }
    } else if($creando == 'jugador' && isset($_REQUEST['categoria']) && isset($_REQUEST['posicion']) && isset($_REQUEST['federado'])) {
        $categoria = $_REQUEST['categoria'];
        $posicion = $_REQUEST['posicion'];
        $federado = $_REQUEST['federado'];
        if(esJugadorAptoCategoriaRecibeFecha($fechaNacimiento,$categoria)=='NO'){
            header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=edadJugadorNoAptaCategoria");
        } else if(esJugadorAptoCategoriaRecibeFecha($fechaNacimiento,$categoria)=='SI'){

            if(esInputDniNieValido($dni)=='NO'){
                header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=validacionDNI");
            } else if(esInputEmailValido($email)=='NO'){
                header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=validacionEmail");
            } else if(esInputFechaValida($_REQUEST['diaNacimiento'],$_REQUEST['mesNacimiento'],$_REQUEST['anioNacimiento'])=='NO'){
                header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=validacionFechaNacimiento");
            } else if(esInputLongitudMaxima($direccion,80)=='NO'){
                header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=validacionDireccion");
            } else if(esInputLongitudMaxima($nombre,80)=='NO'){
                header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=validacionNombre");
            } else if(esInputTelefonoValido($telefono)=='NO'){
                header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=validacionTelefono");
            } else {
                crearJugador($dni, $categoria, $posicion, $federado, $nombre, $email, $fechaNacimiento, $direccion, $telefono);
                header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=jugadorCreado");
            }
        } else{
            header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=validacionDatosGenerico");
        }
    } else if($creando=='miembro') {
        if(esInputDniNieValido($dni)=='NO'){
            header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=validacionDNI");
        } else if(esInputEmailValido($email)=='NO'){
            header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=validacionEmail");
        } else if(esInputFechaValida($_REQUEST['diaNacimiento'],$_REQUEST['mesNacimiento'],$_REQUEST['anioNacimiento'])=='NO'){
            header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=validacionFechaNacimiento");
        } else if(esInputLongitudMaxima($direccion,80)=='NO'){
            header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=validacionDireccion");
        } else if(esInputLongitudMaxima($nombre,80)=='NO'){
            header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=validacionNombre");
        } else if(esInputTelefonoValido($telefono)=='NO'){
            header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=validacionTelefono");
        } else {
            crearMiembro($dni, $nombre, $email, $fechaNacimiento, $direccion, $telefono);
            header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=miembroCreado");
        }
    } else{
        header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=falloDatosRequest");
    }
} else {
    header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=falloDatosRequest");
}

?>