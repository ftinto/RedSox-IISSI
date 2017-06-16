<?php
require_once("operacionesMiembros.php");
require_once("../../funcionesTipos/funcionesFechas.php");
require_once ("consultaMiembrosSinUsuario.php");

for($i=0;$i<$numeroDeMiembros;$i++){
    if(isset($_REQUEST['seleccionar'.$i]) && isset($_REQUEST['dni'.$i]) && isset($_REQUEST['usuario'.$i]) && isset($_REQUEST['contrasena'.$i]) && isset($_REQUEST['tipoUsuario'.$i])){
        $dni = $_REQUEST['dni'.$i];
        $usuario = $_REQUEST['usuario'.$i];
        $contrasena = $_REQUEST['contrasena'.$i];
        $tipoUsuario = $_REQUEST['tipoUsuario'.$i];
        crearUsuario($dni,$usuario,$contrasena,$tipoUsuario);
    }
}

header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=usuariosCreados");

?>