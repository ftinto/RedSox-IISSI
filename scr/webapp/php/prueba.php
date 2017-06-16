<?php
session_start();
if(isset($_SESSION['usuario']) && isset($_SESSION['dni']) && isset($_SESSION['tipousuario']) && $_SESSION['tipousuario'] == 'administrador'){ ?>

<?php } else {
    header("Location: index.php?mensajeOperacion=accesoNoPermitido");
} ?>
