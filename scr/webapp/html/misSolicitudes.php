<?php
session_start();
if(isset($_SESSION['usuario']) && isset($_SESSION['dni']) && isset($_SESSION['tipousuario'])){ ?>

    <?php
    require_once ("../php/solicitudesUsuario.php");
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <link rel="stylesheet" type="text/css" href="../css/pagos.css">
        <script type="text/javascript" src="../javascript/Pagos/paginacion.js"></script>
        <title>Solicitudes - Red Sox</title>
    </head>
    <body>
    <div class="pageContainer">
        <?php include_once ("includes/header.php")?>
        <div class="content">
            <div class="pageTitle">
                Solicitudes
            </div>
            <div class="contenidoInicio">
                <?php include_once("includes/mensajeOperacion.php") ?>
                <?php require_once("../php/pedidosMiembro.php") ?>
                <div class="contendorTablaPrincipal">
                    <table class="tablaPrincipal">
                        <thead><tr role="row">
                            <th>Localizador</th>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Datos</th>
                            <th></th>
                        </tr> </thead>
                        <tbody>
                        <?php
                        $numeroSolicitud = 0;
                        foreach($resultado as $fila){

                            if(esPedidoEntregado($pedidosAsociados[$numeroSolicitud])=='NO'){
                            ?>
                            <tr id="solicitud<?=$numeroSolicitud?>">
                                <td><?= $fila["IDSOLICITUD"]?></td>
                                <td><?= $pedidosAsociados[$numeroSolicitud]['PRODUCTO']?></td>
                                <td><?= $pedidosAsociados[$numeroSolicitud]['PRECIOPRODUCTO']?>€</td>
                                <td><?= $fila["DATOS"]?></td>
                                <td>
                                    <button class="button">Editar</button>
                                    <form action="../php/eliminarSolicitud.php" method="post">
                                        <input type="hidden" name="idSolicitud" value="<?= $fila["IDSOLICITUD"]?>">
                                        <button class="button">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            <?php

                            }
                            $numeroSolicitud = $numeroSolicitud +1;
                        }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </body>
    </html>

<?php } else {
    header("Location: login.php?mensajeOperacion=iniciarSesion");
} ?>