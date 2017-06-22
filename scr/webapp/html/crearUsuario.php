<?php
session_start();
if(isset($_SESSION['usuario']) && isset($_SESSION['dni']) && isset($_SESSION['tipousuario']) && $_SESSION['tipousuario'] == 'administrador'){ ?>
    <?php
    require_once ("../php/phpAdmin/Miembros/consultaMiembrosSinUsuario.php");
    ?>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <link rel="stylesheet" type="text/css" href="../css/admin.css">
        <script type="text/javascript" src="../javascript/Admin/operacionesMiembros.js"></script>
        <title>Crear Usuario - Red Sox</title>
    </head>
    <body>
    <div class="pageContainer">
        <?php include_once("includes/header.php") ?>
        <div class="content">
            <div class="pageTitle">
                Crear usuario
            </div>
            <div class="contenidoInicio">
                <?php include_once("includes/mensajeOperacion.php") ?>
                <?php include_once("includes/navegacionMiembros.php") ?>
                <div class="contenedorConvertir">
                    <h2 class="tituloSeccionPerfil">Crear nuevos usuarios:</h2>
                    <form class="crearCuentas" method="post" action="../php/phpAdmin/Miembros/crearUsuarios.php">


                        <div class="contendorTablaPrincipal">
                            <table class="tablaPrincipal">
                                <thead><tr role="row">
                                    <th></th>
                                    <th>Nombre</th>
                                    <th>DNI</th>
                                    <th>Usuario</th>
                                    <th>Contraseña</th>
                                    <th>Tipo de Usuario</th>
                                </tr> </thead>
                                <tbody>
                                <?php
                                $numeroMiembro = 0;
                                foreach($resultado as $fila){?>
                                    <tr id="miembro<?=$numeroMiembro?>">
                                        <td><input type="checkbox" name="seleccionar<?= $numeroMiembro?>"></td>
                                        <td><?= $fila["NOMBRE"]?>
                                        </td>
                                        <td><?= $fila["DNI"]?>
                                            <input type="hidden" name="dni<?= $numeroMiembro?>" value="<?= $fila["DNI"]?>">
                                        </td>
                                        <td><input type="text" name="usuario<?= $numeroMiembro?>"></td>
                                        <td><input type="password" name="contrasena<?= $numeroMiembro?>" value="<?= $fila["DNI"]?>"></td>
                                        <td>
                                            <select
                                                    name="tipoUsuario<?= $numeroMiembro?>"
                                                    id="selectTipoUsuario<?= $numeroMiembro?>"
                                                    size="1..2"
                                                    title="Selección de tipo de empleado" required>

                                                <option value="afiliado" selected="selected">Normal</option>
                                                <option value="administrador">Admin</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <?php
                                    $numeroMiembro = $numeroMiembro +1;
                                }?>
                                </tbody>
                            </table>
                        </div>





                        <div class="tituloInput"><button class="button">Crear Usuarios</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </body>
    </html>
<?php } else {
    header("Location: index.php?mensajeOperacion=accesoNoPermitido");
} ?>
