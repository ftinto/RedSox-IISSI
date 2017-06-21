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
        <script type="text/javascript" src="../javascript/Admin/operacionesMiembros.js"></script>
        <title>Gestión de Miembros - Red Sox</title>
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
                <?php include_once("includes/navegacionMiembros.php") ?>

                <div class="contendorTablaPrincipal">
                    <table class="tablaPrincipal">
                        <thead>

                        <tr role="row">
                            <th colspan="6">
                                <form class="" style="margin: 0px">
                                    <input type="hidden" name="viendo" value="<?= $viendo?>">
                                    <input type="hidden" name="maximoPorPagina" value="<?= $maximoPorPagina?>">
                                    <button class="button" name="viendo" value="miembros">Miembros</button>
                                    <button class="button" name="viendo" value="empleados">Empleados</button>
                                    <button class="button" name="viendo" value="entrenadores">Entrenadores</button>
                                    <button class="button" name="viendo" value="jugadores">Jugadores</button>
                                </form>
                            </th>
                        </tr>
                        <?php
                        if($necesitaPaginacion == 'SI'){
                            ?>
                            <tr role="row">
                                <th colspan="6">
                                    <form class="" id="navegadorGestionMiembros" style="margin: 0px">
                                        <input type="hidden" name="viendo" value="<?= $viendo?>">
                                        Resultados por página: <input type="number" maxlength="2" name="maximoPorPagina" value="<?= $maximoPorPagina?>">
                                    </form>
                                </th>
                            </tr>
                            <?php
                        }
                        ?>

                        <tr role="row">
                            <th>Nombre</th>
                            <th>DNI</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th>Tipo Miembro</th>
                            <th>Operaciones</th>
                        </tr>
                         </thead>
                        <tbody>
                        <?php
                        $numeroMiembro = 0;
                        foreach($resultado as $fila){?>
                            <tr id="miembro<?=$numeroMiembro?>">
                                <td><?= $fila["NOMBRE"]?></td>
                                <td><?= $fila["DNI"]?></td>
                                <td><?= $fila["EMAIL"]?></td>
                                <td><?= $fila["TELEFONO"]?></td>
                                <td><?= $fila["TIPOMIEMBRO"]?></td>
                                <td>
                                    <form style="display: inline-block" method="post" action="perfilMiembro.php">
                                        <input type="hidden" name="dniMiembro" value="<?=$fila["DNI"]?>">
                                        <button class="button">Perfil</button>
                                    </form>
                                    <form style="display: inline-block" method="post" action="perfilPagos.php">
                                        <input type="hidden" name="dni" value="<?=$fila["DNI"]?>">
                                        <button class="button">Ver Pagos</button>
                                    </form>
                                    <button class="button" onclick="alertaEliminarMiembroSeleccionado(<?=$numeroMiembro?>)">Eliminar</button>
                                    <form style="display: inline-block" method="post" action="../php/phpAdmin/Miembros/eliminarMiembro.php">
                                        <input type="hidden" name="dni" value="<?=$fila["DNI"]?>">
                                    </form>
                                </td>
                            </tr>
                            <?php
                            $numeroMiembro = $numeroMiembro +1;
                        }?>
                        </tbody>
                    </table>
                    <?php
                    if($necesitaPaginacion == 'SI'){
                        ?>
                        <script>
                            introducirNavegadorPaginacion(<?= $paginaSeleccionada?>,<?= $maximoPorPagina?>,<?= $numeroDeMiembros?>)
                        </script>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    </body>
    </html>
<?php } else {
    header("Location: index.php?mensajeOperacion=accesoNoPermitido");
} ?>

