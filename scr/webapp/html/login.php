<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <title>Inicio - Red Sox</title>
</head>
<body>
<div class="pageContainer">
    <?php include_once("includes/header.php") ?>
    <div class="content">
        <div class="pageTitle">
            Inicia tu sesión:
        </div>
        <?php include_once("includes/mensajeOperacion.php")?>
        <div class="contenidoInicio">
            <p>Si no sabes tu usuario o tienes algún problema, contacta con la administración del club. Recuerda que tu contraseña por defecto es tu dni.</p>
            <form method="post" action="../php/iniciarSesion.php">
                <div class="tituloInput">Usuario:</div>
                <div><input type="text" name="usuario"></div>
                <div class="tituloInput">Contraseña:</div>
                <div><input type="password" name="contrasena"></div>
                <div><input class="button" type="submit" value="Iniciar Sesión"></div>
            </form>
        </div>

    </div>

</div>
</body>
</html>