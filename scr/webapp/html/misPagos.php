<?php
session_start();
if(isset($_SESSION['usuario']) && isset($_SESSION['dni']) && isset($_SESSION['tipousuario'])){ ?>

    <?php
    require_once ("../php/pagosUsuario.php");
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <link rel="stylesheet" type="text/css" href="../css/pagos.css">
        <script type="text/javascript" src="../javascript/Pagos/paginacion.js"></script>
        <title>Pagos - Red Sox</title>
    </head>
    <body>
    <div class="pageContainer">
        <?php include_once ("includes/header.php")?>
        <div class="content">
            <div class="pageTitle">
                Pagos
            </div>
            <div class="contenidoInicio">
                <div class="pagosContent" id="pagosContent">
                    <?php
                    if(isset($resultado[0])){?>
                        <p>Tienes <?= $numeroDePagos?> pagos pendientes.</p>
                        <?php $numeroPago = 0;
                        foreach ($resultado as $fila) {
                            require_once('../php/phpAdmin/Pagos/operacionesPagos.php');
                            ?>
                            <div id="pago<?= $numeroPago?>" class="pago<?= getEstadoPago($fila)?>" >
                                <div class="pestanaFechaInicioPago">
                                    <?= $fila["FECHAINICIO"]?>
                                </div>
                                <div class="contenidoPago">
                                    <h3 class="tituloPago"><?=getNombrePago($fila)?></h3>
                                    <p class="infoPago">
                                        <?= $fila["CUANTIA"]?>€
                                    </p>
                                    <p class="infoPago">
                                        Localizador: <?= $fila["IDPAGO"]?>
                                    </p>
                                    <p class="fechaLimite<?= getEstadoPago($fila)?>">

                                        Fecha Límite: <?= $fila["FECHALIMITE"]?>
                                    </p>
                                </div>
                            </div>
                            <?php
                            $numeroPago = $numeroPago + 1;
                        }
                    } else{
                        ?>
                        <p class="mensajenulo">No tienes ningún pago pendiente.</p>
                    <?php }?>
                    <script>
                        paginacionPagos(<?= $numeroDePagos?>)
                    </script>
                </div>
            </div>
        </div>
    </div>
    </body>
    </html>

<?php } else {
    header("Location: login.php?mensajeOperacion=iniciarSesion");
} ?>