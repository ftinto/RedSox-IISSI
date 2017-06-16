<?php
session_start();
if(isset($_SESSION['usuario']) && isset($_SESSION['dni']) && isset($_SESSION['tipousuario']) && $_SESSION['tipousuario'] == 'administrador'){ ?>
    <?php
    require_once ("../php/phpAdmin/Miembros/consultaMiembros.php");
    ?>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <link rel="stylesheet" type="text/css" href="../css/admin.css">
        <title>Gestión de Pagos - Red Sox</title>
    </head>
    <body>
    <div class="pageContainer">
        <?php include_once("includes/header.php") ?>
        <div class="content">
            <div class="pageTitle">
                Gestión de Miembros
            </div>
            <div class="contenidoInicio">
                <?php include_once("includes/mensajeOperacion.php") ?>
                <?php include_once("includes/navegacionPagos.php") ?>
                <?php require_once("../php/phpAdmin/Miembros/operacionesMiembros.php") ?>
                <?php require_once("../php/phpAdmin/Pagos/operacionesPagos.php") ?>
                <div class="contendorTablaPrincipal">
                    <table class="tablaPrincipal">
                        <thead><tr role="row">
                            <th>Nombre</th>
                            <th>DNI</th>
                            <th>Pagos Pendientes</th>
                            <th>Cuantía Total Pendiente</th>
                            <th></th>
                        </tr> </thead>
                        <tbody>
                        <?php
                        $numeroMiembro = 0;
                        foreach($resultado as $fila){?>
                            <tr id="miembro<?=$numeroMiembro?>">
                                <td><?= $fila["NOMBRE"]?></td>
                                <td><?= $fila["DNI"]?></td>
                                <td><?= numeroPagosPendientesMiembro($fila["DNI"])?></td>
                                <td><?= getCuantiaTotalMiembro($fila["DNI"])?>€</td>
                                <td>
                                    <form style="display: inline-block" method="post" action="perfilPagos.php">
                                        <input type="hidden" name="dni" value="<?=$fila["DNI"]?>">
                                        <button class="button">Ver Pagos</button>
                                    </form>

                                </td>
                            </tr>
                            <?php
                            $numeroMiembro = $numeroMiembro +1;
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

