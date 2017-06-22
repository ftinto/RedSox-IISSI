<?php
require_once("operacionesMiembros.php");
require_once("../../funcionesTipos/funcionesFechas.php");
require_once ("consultaMiembrosSinUsuario.php");
require_once ("../../funcionesValidacion.php");

if(isset($_REQUEST['usuario']) && isset($_REQUEST['contrasena']) && isset($_REQUEST['tipoUsuario'])){
    $usuario = $_REQUEST['usuario'];
    $contrasena = $_REQUEST['contrasena'];
    $tipoUsuario = $_REQUEST['tipoUsuario'];

    $arrayUsuarios = array("afiliado",'administrador');

    if(esInputContraseniaValida($contrasena)=='NO'){
        header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=validacionContrasena");
    } else if(esInputPerteneceArray($tipoUsuario,$arrayUsuarios)=='NO'){
        header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=validacionTipoUsuario");
    } else {
        editarUsuario($usuario,$contrasena,$tipoUsuario);
        header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=usuarioEditado");
    }
} else {
    header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=falloDatosRequest");
}



?>