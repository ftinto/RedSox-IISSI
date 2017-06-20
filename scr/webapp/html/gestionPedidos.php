<?php
session_start();
if(isset($_SESSION['usuario']) && isset($_SESSION['dni']) && isset($_SESSION['tipousuario']) && $_SESSION['tipousuario'] == 'administrador'){ ?>
    <?php
    require_once ("../php/phpAdmin/Pedido/consultaPedidos.php");
    ?>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <link rel="stylesheet" type="text/css" href="../css/admin.css">
        <script type="text/javascript" src="../javascript/Admin/operacionesMiembros.js"></script>
        <title>Gestión de Pedidos - Red Sox</title>
    </head>
    <body>
    <div class="pageContainer">
        <?php include_once("includes/header.php") ?>
        <div class="content">
            <div class="pageTitle">
                Gestión de Pedidos
            </div>
            <div class="contenidoInicio">
                <?php include_once("includes/mensajeOperacion.php") ?>
                <?php include_once("includes/navegacionPedidos.php") ?>
                <div class="contendorTablaPrincipal">
                    <table class="tablaPrincipal">
                        <thead><tr role="row">
                            <th>Localizador</th>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Proveedor</th>
                            <th>Fecha Límite</th>
                            <th>Fecha Llegada</th>
                            <th></th>
                        </tr> </thead>
                        <tbody>
                        <?php
                        $numeroPedido = 0;
                        foreach($resultado as $fila){?>
                            <tr id="pedido<?=$numeroPedido?>">
                                <td><?= $fila["IDPEDIDO"]?></td>
                                <td><?= $fila["PRODUCTO"]?></td>
                                <td><?= $fila["PRECIOPRODUCTO"]?></td>
                                <td><?= $fila["PROVEEDOR"]?></td>
                                <td><?= $fila["FECHALIMITE"]?></td>
                                <td><?= $fila["FECHALLEGADA"]?></td>
                                <td>

                                </td>
                            </tr>
                            <?php
                            $numeroPedido = $numeroPedido +1;
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
    header("Location: index.php?mensajeOperacion=accesoNoPermitido");
} ?>