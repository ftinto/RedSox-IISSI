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

                <?php if(isset($_REQUEST['dni']) && isset($_REQUEST['editando'])){
                    $dniSeleccionado = $_REQUEST['dni'];
                    $editando = $_REQUEST['editando'];
                    ?>

                    <h2 class="tituloSeccionPerfil">Editar <?= $editando?>:</h2>
                    <form class="formularioEditar aMiembro" method="post" action="../php/phpAdmin/Miembros/editandoMiembros.php">
                        <input type="hidden" name="olddni" value="<?=$dniSeleccionado ?>">
                        <input type="hidden" name="editando" value="<?= $editando?>">

                        <div class="tituloInput">Nombre:</div>
                        <input type="text" name="nombre">
                        <div class="tituloInput">Fecha de Nacimiento:</div>
                        <div class="inputsFechaInicio">
                            Día: <input type="text" name="diaNacimiento">
                            Mes: <input type="text" name="mesNacimiento">
                            Año: <input type="text" name="anioNacimiento">
                        </div>
                        <div class="tituloInput">Email:</div>
                        <input type="text" name="email">
                        <div class="tituloInput">Dirección:</div>
                        <input type="text" name="direccion">
                        <div class="tituloInput">Telefono:</div>
                        <input type="text" name="telefono">



                    <?php
                    if($editando == 'empleado'){ ?>

                        <div class="tituloInput">Nombre del Puesto:</div>
                        <input type="text" name="puesto">
                        <div class="tituloInput">Fecha de Inicio:</div>
                        <p style="margin-top: 0px">(dejar vacío para fecha actual)</p>
                        <div class="inputsFechaInicio">
                            Día: <input type="text" name="diaInicio">
                            Mes: <input type="text" name="mesInicio">
                            Año: <input type="text" name="anioInicio">
                        </div>
                        <div class="tituloInput">Fecha de Fin</div>
                        <div class="inputsFechaFin">
                            Día: <input type="text" name="diaFin">
                            Mes: <input type="text" name="mesFin">
                            Año: <input type="text" name="anioFin">
                        </div>
                        <div class="tituloInput">Pertenece a la Directiva</div>
                        <select
                            name="directiva"
                            id="selectTipoEmpleado"
                            size="1..2"
                            title="Selección de tipo de empleado">

                            <option value="SI" selected="selected">Sí</option>
                            <option value="NO">No</option>
                        </select>
                        <div class="tituloInput"><button class="button">Editar</button></div>
                        </form>

                        <?php
                    } else if($editando == 'entrenador'){ ?>

                        <div class="tituloInput">Categoría:</div>
                        <select
                            name="categoria"
                            id="selectCategoriaEntrenador"
                            size="1..3"
                            title="Selección de categoría de entrenador">

                            <option value="senior" selected="selected">Senior</option>
                            <option value="sub-21">sub-21</option>
                            <option value="sub-19">sub-19</option>
                        </select>
                        <div class="tituloInput"><button class="button">Editar</button></div>
                        </form>


                        <?php
                    } else if($editando == 'jugador'){ ?>

                        <div class="tituloInput">Categoría:</div>
                        <select
                            name="categoria"
                            id="selectCategoriaJugador"
                            size="1..3"
                            title="Selección de categoría de jugador">

                            <option value="femenino" selected="selected">femenino</option>
                            <option value="sub-21">sub-21</option>
                            <option value="sub-19">sub-19</option>
                        </select>
                        <div class="tituloInput">Posición:</div>
                        <select
                            name="posicion"
                            id="selectPosicionJugador"
                            size="1..9"
                            title="Selección de posición de jugador">

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
                            title="Selección de federado">

                            <option value="SI" selected="selected">Sí</option>
                            <option value="NO">No</option>
                        </select>
                        <div class="tituloInput"><button class="button">Editar</button></div>
                        </form>


                        <?php
                    }else if($editando == 'miembro'){ ?>
                        <div class="tituloInput"><button class="button">Editar</button></div>
                        </form>
                        <?php
                    }  else { ?>
                        <p class="mensajeOperacion">No se ha accedido a la página correctamente.</p>
                    <?php }
                } else{ ?>
                    <p class="mensajeOperacion">No se ha accedido a la página correctamente.</p>
                <?php } ?>

            </div>
        </div>
    </div>
</div>
</body>
</html>