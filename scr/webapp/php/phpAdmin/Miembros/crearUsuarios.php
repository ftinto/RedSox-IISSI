<?php
require_once("operacionesMiembros.php");
require_once("../../funcionesTipos/funcionesFechas.php");
require_once ("consultaMiembrosSinUsuario.php");
require_once ("../../funcionesValidacion.php");

for($i=0;$i<$numeroDeMiembros;$i++){
    if(isset($_REQUEST['seleccionar'.$i]) && isset($_REQUEST['dni'.$i]) && isset($_REQUEST['usuario'.$i]) && isset($_REQUEST['contrasena'.$i]) && isset($_REQUEST['tipoUsuario'.$i])){
        $dni = $_REQUEST['dni'.$i];
        $usuario = $_REQUEST['usuario'.$i];
        $contrasena = $_REQUEST['contrasena'.$i];
        $tipoUsuario = $_REQUEST['tipoUsuario'.$i];
        $arrayUsuarios = array("afiliado",'administrador');

        if(esInputDniNieValido($dni)=='NO'){
            header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=validacionDNI");
        } else if(esInputUsuarioValido($usuario)=='NO'){
            header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=validacionEmail");
        } else if(esInputContraseniaValida($contrasena)=='NO'){
            header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=validacionEmail");
        } else if(esInputContraseniaValida($contrasena)=='NO'){
            header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=validacionEmail");
        } else if(esInputPerteneceArray($tipoUsuario,$arrayUsuarios)=='NO'){
            header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=validacionEmail");
        } else {
            crearUsuario($dni,$usuario,$contrasena,$tipoUsuario);
        }


    }
}

header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=usuariosCreados");

?>