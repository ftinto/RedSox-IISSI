<?php
session_start();
if (isset($_SESSION['usuario']) && isset($_SESSION['dni']) && isset($_SESSION['tipousuario'])) {

    if(isset($_REQUEST['idpedido'])){

        $idpedido = $_REQUEST['idpedido'];
        $dni = $_SESSION['dni'];
        ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <link rel="stylesheet" type="text/css" href="../css/main.css">
            <link rel="stylesheet" type="text/css" href="../css/crearSolicitud.css">
            <title>Crear Solicitud - Red Sox</title>
        </head>
        <body>
        <div class="pageContainer">
            <?php include_once ("includes/header.php")?>
            <div class="content">
                <div class="pageTitle">
                    Crear solicitud
                </div>
                <div class="contenidoInicio">
                    <?php include_once("includes/mensajeOperacion.php") ?>
                    <div id="formCreaSolicitud">
                        <div class="entry-content">
                            <form action="../php/creandoSolicitud.php" method="post">
                                <input type="hidden" name="dni" value="<?=$dni?>">
                                <input type="hidden" name="idpedido" value="<?=$idpedido?>">
                                <p>Descripción<br>
                                    <textarea name="datosSolicitud" cols="40" rows="10"
                                              class=""></textarea></p>
                                ` <p><input type="submit" value="Enviar" class="button"></p>
                            </form>
                        </div>
                    </div>

                </div>

            </div>


        </div>
        </body>
        </html>


        <?php


    } else {
        header("Location: verPedidos.php?mensajeOperacion=falloDatosRequest");
    }

    ?>

<?php } else {
    header("Location: login.php?mensajeOperacion=iniciarSesion");
} ?>