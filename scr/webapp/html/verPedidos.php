<?php
session_start();
if (isset($_SESSION['usuario']) && isset($_SESSION['dni']) && isset($_SESSION['tipousuario'])) { ?>

    <?php
    require_once ("../php/pedidosUsuario.php");
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <link rel="stylesheet" type="text/css" href="../css/pedidos.css">
        <title>Pedidos - Red Sox</title>
    </head>
    <body>
    <div class="pageContainer">
        <?php include_once ("includes/header.php")?>
        <div class="content">
            <div class="pageTitle">
                Pedidos
            </div>
            <div class="contenidoInicio">
                <?php include_once("includes/mensajeOperacion.php") ?>
                <div class="pedidosContent">
                    <p>Hay <?= $numeroDePedidos?> pedidos actualmente.</p>
                    <p>Pedidos Activos</p>

                    <?php

                    foreach($activos as $fila){
                        ?>

                        <div id="pedidoActivo<?= $fila['IDPEDIDO']?>" class="pedidoActivo">
                            <div class="pestanaFechaInicioPedido"><?= $fila['FECHALIMITE']?></div>
                            <div class="contenidoPedido">
                                <h3 class="tituloPedido"><?= $fila['PRODUCTO']?></h3>
                                <p class="infoPedido">Proveedor: <?= $fila['PROVEEDOR']?></p>
                                <p class="infoPedido"><?= $fila['PRECIOPRODUCTO']?>€</p>
                                <p class="infoPedido">Localizador: <?= $fila['IDPEDIDO']?></p>
                                <p class="fechaLimitePedido">Fecha Límite: <?= $fila['FECHALIMITE']?></p>
                                <form action="crearSolicitud.php" method="post">
                                    <input type="hidden" name="idpedido" value="<?= $fila['IDPEDIDO']?>">
                                    <button class="button">Crear Solicitud</button>
                                </form>

                            </div>
                        </div>

                        <?php
                    } ?>
                    <br>
                    <p>Pedidos Pendientes de Entregar</p>

    <?php

                    foreach($noEntregados as $fila){
                        ?>

                        <div id="pedidoCerrado<?= $fila['IDPEDIDO']?>" class="pedidoCerrado">
                            <div class="pestanaFechaInicioPedido"><?= $fila['FECHALIMITE']?></div>
                            <div class="contenidoPedido">
                                <h3 class="tituloPedido"><?= $fila['PRODUCTO']?></h3>
                                <p class="infoPedido">Proveedor: <?= $fila['PROVEEDOR']?></p>
                                <p class="infoPedido"><?= $fila['PRECIOPRODUCTO']?>€</p>
                                <p class="infoPedido">Localizador: <?= $fila['IDPEDIDO']?></p>
                                <p class="fechaLimitePedido">Fecha Límite: <?= $fila['FECHALIMITE']?></p>

                            </div>
                        </div>

                        <?php
                    }

                    ?>

                </div>

                <a href="misSolicitudes.php" class="button button2">Ver solicitudes</a>
            </div>

        </div>
    </div>
    </body>
    </html>

<?php } else {
    header("Location: login.php?mensajeOperacion=iniciarSesion");
} ?>