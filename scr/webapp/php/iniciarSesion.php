<?php
require_once("phpAdmin/Miembros/operacionesMiembros.php");

if(isset($_REQUEST['usuario']) && isset($_REQUEST['contrasena'])){
    $usuario = $_REQUEST['usuario'];
    $contrasena = $_REQUEST['contrasena'];
    $validacion = esSesionCorrecta($usuario, $contrasena);
    if($validacion == 'correcto'){
        $cuenta = obtenerCuentaConUsuario($usuario);
        $tipoUsuario = $cuenta[0]['TIPOUSUARIO'];
        $dni = $cuenta[0]['DNI'];
        session_start();
        $_SESSION['usuario']=$usuario;
        $_SESSION['tipousuario']=$tipoUsuario;
        $_SESSION['dni']=$dni;
        header("Location: ../html/index.php");
    } else if($validacion == 'noCoincide'){
        header("Location: ../html/login.php?mensajeOperacion=noCoincide");
    } else if($validacion == 'error'){
        header("Location: ../html/login.php?mensajeOperacion=default");
    } else if($validacion == 'usuarioNoExiste'){
        header("Location: ../html/login.php?mensajeOperacion=usuarioNoExiste");
    }

} else {
    header("Location: ../../../html/gestionMiembros.php?mensajeOperacion=falloDatosRequest");
}



?>