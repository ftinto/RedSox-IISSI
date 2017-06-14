<?php
if(isset($_REQUEST['dni']) && isset($_REQUEST['creando']) && isset($_REQUEST['nombre']) && isset($_REQUEST['diaNacimiento']) && isset($_REQUEST['mesNacimiento']) && isset($_REQUEST['anioNacimiento']) && isset($_REQUEST['email']) && isset($_REQUEST['direccion']) && isset($_REQUEST['telefono']) && !($_REQUEST['diaNacimiento']=='') && !($_REQUEST['mesNacimiento']=='') && !($_REQUEST['anioNacimiento']=='')){
    require_once("operacionesMiembros.php");
    require_once("../../funcionesTipos/funcionesFechas.php");
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
        crearEmpleado($dni, $puesto, $fechaInicio,$fechaFin,$directiva, $nombre, $email, $fechaNacimiento, $direccion, $telefono);
        header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=empleadoCreado");
    } else if($creando == 'entrenador' && isset($_REQUEST['categoria'])){
        $categoria = $_REQUEST['categoria'];
        crearEntrenador($dni, $categoria, $nombre, $email, $fechaNacimiento, $direccion, $telefono);
        header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=entrenadorCreado");
    } else if($creando == 'jugador' && isset($_REQUEST['categoria']) && isset($_REQUEST['posicion']) && isset($_REQUEST['federado'])) {
        $categoria = $_REQUEST['categoria'];
        $posicion = $_REQUEST['posicion'];
        $federado = $_REQUEST['federado'];
        if(esJugadorAptoCategoriaRecibeFecha($fechaNacimiento,$categoria)=='NO'){
            header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=edadJugadorNoAptaCategoria");
        } else if(esJugadorAptoCategoriaRecibeFecha($fechaNacimiento,$categoria)=='SI'){
            crearJugador($dni, $categoria, $posicion, $federado, $nombre, $email, $fechaNacimiento, $direccion, $telefono);
            header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=jugadorCreado");
        } else{
            header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=validacionDatosGenerico");
        }
    } else if($creando=='miembro') {
        crearMiembro($dni, $nombre, $email, $fechaNacimiento, $direccion, $telefono);
        header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=miembroCreado");
    } else{
        header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=falloDatosRequest");
    }
} else {
    header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=falloDatosRequest");
}

?>