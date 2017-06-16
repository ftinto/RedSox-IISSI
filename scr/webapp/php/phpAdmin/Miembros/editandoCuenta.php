<?php
require_once("operacionesMiembros.php");
require_once("../../funcionesTipos/funcionesFechas.php");
require_once ("consultaMiembrosSinUsuario.php");

if(isset($_REQUEST['usuario']) && isset($_REQUEST['contrasena']) && isset($_REQUEST['tipoUsuario'])){
    $usuario = $_REQUEST['usuario'];
    $contrasena = $_REQUEST['contrasena'];
    $tipoUsuario = $_REQUEST['tipoUsuario'];
    editarUsuario($usuario,$contrasena,$tipoUsuario);
    header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=usuarioEditado");
} else {
    header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=falloDatosRequest");
}



?>