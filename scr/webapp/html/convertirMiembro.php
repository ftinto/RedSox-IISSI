<?php
session_start();
if (isset($_SESSION['usuario']) && isset($_SESSION['dni']) && isset($_SESSION['tipousuario']) && $_SESSION['tipousuario'] == 'administrador') { ?>
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
                <div class="contenedorConvertir">

                    <?php if (isset($_REQUEST['dni']) && isset($_REQUEST['conversionA'])) {
                        $dniSeleccionado = $_REQUEST['dni'];
                        $conversionA = $_REQUEST['conversionA'];
                        if ($conversionA == 'empleado') { ?>

                            <h2 class="tituloSeccionPerfil">Convertir a Empleado:</h2>
                            <form class="formularioConvertir aEmpleado" method="post"
                                  action="../php/phpAdmin/Miembros/conversionMiembros.php">
                                <input type="hidden" name="dni" value="<?= $dniSeleccionado ?>">
                                <input type="hidden" name="conversionA" value="empleado">
                                <div class="tituloInput" required>Nombre del Puesto:</div>
                                <input type="text" name="puesto" required>
                                <div class="tituloInput">Fecha de Inicio:</div>
                                <p style="margin-top: 0px">(dejar vacío para fecha actual)</p>1
                                <div class="inputsFechaInicio">
                                    Día: <input type="text" name="diaInicio" required pattern="^[0-9]{2}$">
                                    Mes: <input type="text" name="mesInicio" required pattern="^[0-9]{2}$">
                                    Año: <input type="text" name="anioInicio" required pattern="^[0-9]{4}$">
                                </div>
                                <div class="tituloInput">Fecha de Fin</div>
                                <div class="inputsFechaFin">
                                    Día: <input type="text" name="diaFin" required pattern="^[0-9]{2}$"">
                                    Mes: <input type="text" name="mesFin" required pattern="^[0-9]{2}$"">
                                    Año: <input type="text" name="anioFin" required pattern="^[0-9]{2}$"">
                                </div>
                                <div class="tituloInput">Pertenece a la Directiva</div>
                                <select
                                        name="directiva"
                                        id="selectTipoEmpleado"
                                        size="1..2"
                                        title="Selección de tipo de empleado" required>

                                    <option value="SI" selected="selected">Sí</option>
                                    <option value="NO">No</option>
                                </select>
                                <div class="tituloInput">
                                    <button class="button">Convertir</button>
                                </div>
                            </form>

                            <?php
                        } else if ($conversionA == 'entrenador') { ?>

                            <h2 class="tituloSeccionPerfil">Convertir a Entrenador:</h2>
                            <form class="formularioConvertir aEntrenador" method="post"
                                  action="../php/phpAdmin/Miembros/conversionMiembros.php">
                                <input type="hidden" name="dni" value="<?= $dniSeleccionado ?>">
                                <input type="hidden" name="conversionA" value="entrenador">
                                <div class="tituloInput">Categoría:</div>
                                <select
                                        name="categoria"
                                        id="selectCategoriaEntrenador"
                                        size="1..3"
                                        title="Selección de categoría de entrenador" required>

                                    <option value="senior" selected="selected">Senior</option>
                                    <option value="sub-21">sub-21</option>
                                    <option value="sub-19">sub-19</option>
                                </select>
                                <div class="tituloInput">
                                    <button class="button">Convertir</button>
                                </div>
                            </form>

                            <?php
                        } else if ($conversionA == 'jugador') { ?>

                            <h2 class="tituloSeccionPerfil">Convertir a Jugador:</h2>
                            <form class="formularioConvertir aJugador" method="post"
                                  action="../php/phpAdmin/Miembros/conversionMiembros.php">
                                <input type="hidden" name="dni" value="<?= $dniSeleccionado ?>">
                                <input type="hidden" name="conversionA" value="jugador">
                                <div class="tituloInput">Categoría:</div>
                                <select
                                        name="categoria"
                                        id="selectCategoriaJugador"
                                        size="1..3"
                                        title="Selección de categoría de jugador" required>

                                    <option value="femenino" selected="selected">femenino</option>
                                    <option value="sub-21">sub-21</option>
                                    <option value="sub-19">sub-19</option>
                                </select>
                                <div class="tituloInput">Posición:</div>
                                <select
                                        name="posicion"
                                        id="selectPosicionJugador"
                                        size="1..9"
                                        title="Selección de posición de jugador" required>

                                    <option value="Pitcher">Pitcher</option>
                                    <option value="Catcher">Catcher</option>
                                    <option value="Primera">Primera</option>
                                    <option value="Segunda">Segunda</option>
                                    <option value="Shortstop">Shortstop</option>
                                    <option value="Tercera">Tercera</option>
                                    <option value="Leftfield">Leftfield</option>
                                    <option value="Center">Center</option>
                                    <option value="Rightfield">Rightfield</option>
                                </select>
                                <div class="tituloInput">Federado:</div>
                                <select
                                        name="federado"
                                        id="selectFederadoJugador"
                                        size="1..2"
                                        title="Selección de federado" required>

                                    <option value="SI" selected="selected">Sí</option>
                                    <option value="NO">No</option>
                                </select>
                                <div class="tituloInput">
                                    <button class="button">Convertir</button>
                                </div>
                            </form>

                            <?php
                        } else { ?>
                            <p class="mensajeOperacion">No se ha accedido a la página correctamente.</p>
                        <?php }
                    } else { ?>
                        <p class="mensajeOperacion">No se ha accedido a la página correctamente.</p>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
    </body>
    </html>
<?php } else {
    header("Location: index.php?mensajeOperacion=accesoNoPermitido");
} ?>