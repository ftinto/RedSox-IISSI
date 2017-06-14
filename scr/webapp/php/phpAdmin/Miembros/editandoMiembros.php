<?php
if(isset($_REQUEST['olddni']) && isset($_REQUEST['editando']) && isset($_REQUEST['nombre']) && isset($_REQUEST['diaNacimiento']) && isset($_REQUEST['mesNacimiento']) && isset($_REQUEST['anioNacimiento']) && isset($_REQUEST['email']) && isset($_REQUEST['direccion']) && isset($_REQUEST['telefono']) && !($_REQUEST['diaNacimiento']=='') && !($_REQUEST['mesNacimiento']=='') && !($_REQUEST['anioNacimiento']=='')){
    require_once("operacionesMiembros.php");
    require_once("../../funcionesTipos/funcionesFechas.php");
    $olddni = $_REQUEST['olddni'];
    $editando = $_REQUEST['editando'];
    $nombre = $_REQUEST['nombre'];
    $fechaNacimiento = getStringSQLFecha($_REQUEST['diaNacimiento'],$_REQUEST['mesNacimiento'],$_REQUEST['anioNacimiento']);
    $email = $_REQUEST['email'];
    $direccion = $_REQUEST['direccion'];
    $telefono = $_REQUEST['telefono'];
    if($editando == 'empleado' && isset($_REQUEST['puesto']) && isset($_REQUEST['directiva'])){
        $puesto = $_REQUEST['puesto'];
        $directiva = $_REQUEST['directiva'];
        $fechaInicio = getStringSQLFecha($_REQUEST['diaInicio'],$_REQUEST['mesInicio'],$_REQUEST['anioInicio']);
        $fechaFin = getStringSQLFecha($_REQUEST['diaFin'],$_REQUEST['mesFin'],$_REQUEST['anioFin']);
        editarEmpleado($olddni, $puesto, $fechaInicio,$fechaFin,$directiva, $nombre, $email, $fechaNacimiento, $direccion, $telefono);
        header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=empleadoEditado");
    } else if($editando == 'entrenador' && isset($_REQUEST['categoria'])){
        $categoria = $_REQUEST['categoria'];
        editarEntrenador($olddni, $categoria, $nombre, $email, $fechaNacimiento, $direccion, $telefono);
        header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=entrenadorEditado");
    } else if($editando == 'jugador' && isset($_REQUEST['categoria']) && isset($_REQUEST['posicion']) && isset($_REQUEST['federado'])) {
        $categoria = $_REQUEST['categoria'];
        $posicion = $_REQUEST['posicion'];
        $federado = $_REQUEST['federado'];
        if(esJugadorAptoCategoria($olddni,$categoria)=='NO'){
            header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=edadJugadorNoAptaCategoria");
        } else if(esJugadorAptoCategoria($olddni,$categoria)=='SI'){
            editarJugador($olddni, $categoria, $posicion, $federado, $nombre, $email, $fechaNacimiento, $direccion, $telefono);
            header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=jugadorEditado");
        } else{
            header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=validacionDatosGenerico");
        }
    } else if($editando=='miembro') {
        editarMiembro($olddni, $nombre, $email, $fechaNacimiento, $direccion, $telefono);
        header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=miembroEditado");
    } else{
        header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=falloDatosRequest");
    }
} else {
    header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=falloDatosRequest");
}

?>