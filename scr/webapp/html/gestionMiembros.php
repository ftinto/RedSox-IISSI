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
                    <thead><tr role="row">
                        <th>Nombre</th>
                        <th>DNI</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Tipo Miembro</th>
                        <th></th>
                    </tr> </thead>
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
                                <button class="button">Ver Pagos</button>
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
            </div>
        </div>
    </div>
</div>
</body>
</html>