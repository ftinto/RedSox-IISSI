<?php
session_start();
if(isset($_SESSION['usuario']) && isset($_SESSION['dni']) && isset($_SESSION['tipousuario']) && $_SESSION['tipousuario'] == 'administrador'){ ?>
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
                <?php if(isset($_REQUEST['usuario'])){
                    require_once ("../php/phpAdmin/Miembros/operacionesMiembros.php");
                    $usuario = $_REQUEST['usuario'];
                    $cuenta = obtenerCuentaConUsuario($usuario);
                    $dni = $cuenta[0]['DNI'];
                    $contrasena = $cuenta[0]['PASSWORD'];
                    $tipoMiembro = $cuenta[0]['TIPOMIEMBRO'];
                    $miembro = obtenerMiembro($dni);
                    $nombre = $miembro[0]['NOMBRE'];
                    ?>

                    <div class="contenedorConvertir">
                        <h2 class="tituloSeccionPerfil">Edita al usuario usuario:</h2>
                        <form class="crearCuentas" method="post" action="../php/phpAdmin/Miembros/editandoCuenta.php">


                            <div class="contendorTablaPrincipal">
                                <table class="tablaPrincipal">
                                    <thead><tr role="row">
                                        <th>Nombre</th>
                                        <th>DNI</th>
                                        <th>Usuario</th>
                                        <th>Contraseña</th>
                                        <th>Tipo de Usuario</th>
                                    </tr> </thead>
                                    <tbody>
                                    <tr id="miembro">
                                        <td><?= $nombre?>
                                        </td>
                                        <td><?= $dni?>
                                        </td>
                                        <td><?= $usuario?>
                                            <input type="hidden" name="usuario" value="<?= $usuario?>"></td>
                                        <td><input type="password" name="contrasena" value="<?= $contrasena?>"></td>
                                        <td>
                                            <select
                                                    name="tipoUsuario"
                                                    id="selectTipoUsuario"
                                                    size="1..2"
                                                    title="Selección de tipo de empleado">

                                                <?php if($tipoMiembro == 'afiliado'){?>
                                                    <option value="afiliado" selected="selected">Normal</option>
                                                    <option value="administrador">Admin</option>
                                                <?php } else if($tipoMiembro == 'administrador') { ?>
                                                    <option value="afiliado" >Normal</option>
                                                    <option value="administrador" selected="selected">Admin</option>
                                                <?php } else { ?>
                                                    <option value="afiliado" selected="selected">Normal</option>
                                                    <option value="administrador">Admin</option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="tituloInput"><button class="button">Editar Usuario</button></div>
                        </form>
                    </div>

                <?php } else { ?>
                    <p class="mensajeOperacion">No se ha accedido a la página correctamente.</p>
                <?php } ?>
            </div>
        </div>
    </div>
    </body>
    </html>
<?php } else {
    header("Location: index.php?mensajeOperacion=accesoNoPermitido");
} ?>
