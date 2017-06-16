<?php
session_start();
if(isset($_SESSION['usuario'])){ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <title>Inicio - Red Sox</title>
</head>
<body>
<div class="pageContainer">
    <?php include_once("includes/header.php") ?>
<div class="content">
    <div class="pageTitle">
        Inicio
    </div>
    <div class="contenidoInicio">
        <?php include_once("includes/mensajeOperacion.php") ?>

        <?= $_SESSION['usuario']?>
        <?= $_SESSION['dni']?>
        <?= $_SESSION['tipousuario']?>
        AAAAAAAA<br>
        AAAAAAAA<br>
        AAAAAAAA<br>
        AAAAAAAA<br>
        AAAAAAAA<br>
        AAAAAAAA<br>

    </div>
</div>
</div>
</body>
</html>

<?php
} else{
    header("Location: login.php?mensajeOperacion=iniciarSesion");
}

?>