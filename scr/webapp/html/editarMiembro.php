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

                    <?php if (isset($_REQUEST['dni']) && isset($_REQUEST['editando'])) {
                        $dniSeleccionado = $_REQUEST['dni'];
                        $editando = $_REQUEST['editando'];
                        ?>

                        <h2 class="tituloSeccionPerfil">Editar <?= $editando ?>:</h2>
                        <form class="formularioEditar aMiembro" method="post"
                              action="../php/phpAdmin/Miembros/editandoMiembros.php">
                        <input type="hidden" name="olddni" value="<?= $dniSeleccionado ?>">
                        <input type="hidden" name="editando" value="<?= $editando ?>">

                        <div class="tituloInput">Nombre:</div>
                        <input type="text" name="nombre" required>
                        <div class="tituloInput">Fecha de Nacimiento:</div>
                        <div class="inputsFechaInicio">
                            Día: <input type="text" name="diaNacimiento" required pattern="^\d{2}$">
                            Mes: <input type="text" name="mesNacimiento" required pattern="^\d{2}$">
                            Año: <input type="text" name="anioNacimiento" required pattern="^\d{4}$">
                        </div>
                        <div class="tituloInput">Email:</div>
                        <input type="email" name="email" >
                        <div class="tituloInput">Dirección:</div>
                        <input type="text" name="direccion">
                        <div class="tituloInput">Telefono:</div>
                        <input type="text" name="telefono" >


                        <?php
                        if ($editando == 'empleado') { ?>

                            <div class="tituloInput">Nombre del Puesto:</div>
                            <input type="text" name="puesto" required>
                            <div class="tituloInput">Fecha de Inicio:</div>
                            <p style="margin-top: 0px">(dejar vacío para fecha actual)</p>
                            <div class="inputsFechaInicio">
                                Día: <input type="text" name="diaInicio" required pattern="^\d{2}$">
                                Mes: <input type="text" name="mesInicio" required pattern="^\d{2}$">
                                Año: <input type="text" name="anioInicio" required pattern="^\d{4}$">
                            </div>
                            <div class="tituloInput">Fecha de Fin</div>
                            <div class="inputsFechaFin">
                                Día: <input type="text" name="diaFin" required pattern="^\d{2}$">
                                Mes: <input type="text" name="mesFin" required pattern="^\d{2}$">
                                Año: <input type="text" name="anioFin" required pattern="^\d{4}$">
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
                                <button class="button">Editar</button>
                            </div>
                            </form>

                            <?php
                        } else if ($editando == 'entrenador') { ?>

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
                                <button class="button">Editar</button>
                            </div>
                            </form>


                            <?php
                        } else if ($editando == 'jugador') { ?>

                            <div class="tituloInput">Categoría:</div>
                            <select
                                    name="categoria"
                                    id="selectCategoriaJugador"
                                    size="1..3"
                                    title="Selección de categoría de jugador" required>

                                <option value="senior" selected="selected">Senior</option>
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
                                <button class="button">Editar</button>
                            </div>
                            </form>


                            <?php
                        } else if ($editando == 'miembro') { ?>
                            <div class="tituloInput">
                                <button class="button">Editar</button>
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