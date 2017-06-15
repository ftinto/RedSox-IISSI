<html>
<head>
    <title>Perfil - Red Sox</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <script type="text/javascript" src="../javascript/Admin/operacionesMiembros.js"></script>
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
            <?php if(isset($_REQUEST['dniMiembro'])){
                require_once ("../php/phpAdmin/Miembros/operacionesMiembros.php");
                $dniMiembro = $_REQUEST['dniMiembro'];
                if(existeMiembro($dniMiembro)=='NO'){
                    header("Location: perfilMiembro.php?mensajeOperacion=miembroNoExiste");
                } else if(existeMiembro($dniMiembro)=='SI'){
                ?>
                    <?php $infoMiembro = obtenerMiembro($dniMiembro)?>
                <div class="nombreMiembro" id="nombreMiembro"><?= $infoMiembro[0]['NOMBRE']?></div>
                <h2 class="tituloSeccionPerfil">Datos Generales</h2>

                    <div class="seccionPerfil datosGenerales">
                        <div class="subSeccionPerfil">
                            <div class="contenedorDato">
                                <span class="nombreDato">DNI: </span><span id="dniMiembro"><?= $infoMiembro[0]['DNI']?></span>
                            </div>
                            <div class="contenedorDato">
                                <span class="nombreDato">Email: </span><span><?= $infoMiembro[0]['EMAIL']?></span>
                            </div>
                            <div class="contenedorDato">
                                <span class="nombreDato">Tipo Miembro: </span><span><?= $infoMiembro[0]['TIPOMIEMBRO']?></span>
                            </div>
                        </div>
                        <div class="subSeccionPerfil">
                            <div class="contenedorDato">
                                <span class="nombreDato">Fecha de Nacimiento: </span><span><?= $infoMiembro[0]['FECHANACIMIENTO']?></span>
                            </div>
                            <div class="contenedorDato">
                                <span class="nombreDato">Número de Teléfono: </span><span><?= $infoMiembro[0]['TELEFONO']?></span>
                            </div>
                            <div class="contenedorDato">
                                <span class="nombreDato">Dirección: </span><span><?= $infoMiembro[0]['DIRECCION']?></span>
                            </div>
                        </div>
                        <div class="subSeccionPerfil">
                            <div class="contenedorDato">
                                <form method="post" action="editarMiembro.php">
                                    <input type="hidden" name="dni" value="<?=$dniMiembro?>">
                                    <input type="hidden" name="editando" value="miembro">
                                    <button class="button">Editar Datos Generales</button>
                                </form>
                            </div>
                            <div class="contenedorDato">
                                <form style="display: inline-block" method="post" action="../php/phpAdmin/Miembros/eliminarMiembro.php" id="formularioEliminarMiembroPerfil">
                                    <input type="hidden" name="dni" value="<?=$infoMiembro[0]["DNI"]?>">
                                </form>
                                <button class="button" onclick="alertaEliminarMiembroDesdePerfil()">Eliminar Miembro</button>
                            </div>
                        </div>
                    </div>


                <h2 class="tituloSeccionPerfil">Datos Empleado</h2>
                    <div class="seccionPerfil datosEmpleado">
                        <?php if(existeEmpleado($dniMiembro)=='NO'){ ?>
                            <p class="mensajeOperacion">Este miembro no es un empleado.</p>
                            <form method="post" action="convertirMiembro.php">
                                <input type="hidden" name="dni" value="<?=$dniMiembro?>">
                                <input type="hidden" name="conversionA" value="empleado">
                                <button class="button">Convertir a Empleado</button>
                            </form>
                        <?php } else if(existeEmpleado($dniMiembro)=='SI'){
                            $infoEmpleado = obtenerEmpleado($dniMiembro) ?>
                            <div class="subSeccionPerfil">
                                <div class="contenedorDato">
                                    <span class="nombreDato">Puesto: </span><span><?= $infoEmpleado[0]['PUESTO']?></span>
                                </div>
                                <div class="contenedorDato">
                                    <span class="nombreDato">Fecha de Inicio: </span><span><?= $infoEmpleado[0]['FECHAINICIO']?></span>
                                </div>
                                <div class="contenedorDato">
                                    <span class="nombreDato">ID de Trabajador: </span><span><?= $infoEmpleado[0]['IDTRABAJO']?></span>
                                </div>
                            </div>
                            <div class="subSeccionPerfil">
                                <div class="contenedorDato">
                                    <span class="nombreDato">Directiva: </span><span><?= $infoEmpleado[0]['DIRECTIVA']?></span>
                                </div>
                                <div class="contenedorDato">
                                    <span class="nombreDato">Fecha de Fin: </span>
                                        <?php if($infoEmpleado[0]['FECHAFIN']==''){ ?>
                            <span>Todavía Activo</span>
                            <?php } else { ?>
                            <span><?= $infoEmpleado[0]['FECHAFIN']?></span>
                            <?php } ?>
                                </div>
                            </div>
                            <div class="subSeccionPerfil">
                                <div class="contenedorDato">
                                    <form method="post" action="editarMiembro.php">
                                        <input type="hidden" name="dni" value="<?=$dniMiembro?>">
                                        <input type="hidden" name="editando" value="empleado">
                                        <button class="button">Editar Datos Empleado</button>
                                    </form>
                                </div>
                                <div class="contenedorDato">
                                    <form style="display: inline-block" method="post" action="../php/phpAdmin/Miembros/eliminarRolMiembro.php" id="formularioEliminarEmpleadoPerfil">
                                        <input type="hidden" name="dni" value="<?=$infoMiembro[0]["DNI"]?>">
                                        <input type="hidden" name="rol" value="empleado">
                                    </form>
                                    <button class="button" onclick="alertaEliminarEmpleadoDesdePerfil()">Eliminar Empleado</button>
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                <h2 class="tituloSeccionPerfil">Datos Entrenador</h2>
                    <div class="seccionPerfil datosEntrenador">
                        <?php if(existeEntrenador($dniMiembro)=='NO'){ ?>
                            <p class="mensajeOperacion">Este miembro no es un entrenador.</p>
                            <form method="post" action="convertirMiembro.php">
                                <input type="hidden" name="dni" value="<?=$dniMiembro?>">
                                <input type="hidden" name="conversionA" value="entrenador">
                                <button class="button">Convertir a Entrenador</button>
                            </form>
                        <?php } else if(existeEntrenador($dniMiembro)=='SI'){
                            $infoEntrenador = obtenerEntrenador($dniMiembro) ?>
                            <div class="subSeccionPerfil">
                                <div class="contenedorDato">
                                    <span class="nombreDato">Categoría: </span><span><?= $infoEntrenador[0]['CATEGORIA']?></span>
                                </div>
                            </div>
                            <div class="subSeccionPerfil">
                                <div class="contenedorDato">
                                    <form method="post" action="editarMiembro.php">
                                        <input type="hidden" name="dni" value="<?=$dniMiembro?>">
                                        <input type="hidden" name="editando" value="entrenador">
                                        <button class="button">Editar Categoria</button>
                                    </form>
                                </div>
                                <div class="contenedorDato">
                                    <form style="display: inline-block" method="post" action="../php/phpAdmin/Miembros/eliminarRolMiembro.php" id="formularioEliminarEntrenadorPerfil">
                                        <input type="hidden" name="dni" value="<?=$infoMiembro[0]["DNI"]?>">
                                        <input type="hidden" name="rol" value="entrenador">
                                    </form>
                                    <button class="button" onclick="alertaEliminarEntrenadorDesdePerfil()">Eliminar Entrenador</button>
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                <h2 class="tituloSeccionPerfil">Datos Jugador</h2>

                <div class="seccionPerfil datosJugador">
                    <?php if(existeJugador($dniMiembro)=='NO'){ ?>
                        <p class="mensajeOperacion">Este miembro no es un jugador.</p>
                        <form method="post" action="convertirMiembro.php">
                            <input type="hidden" name="dni" value="<?=$dniMiembro?>">
                            <input type="hidden" name="conversionA" value="jugador">
                            <button class="button">Convertir a Jugador</button>
                        </form>
                    <?php } else if(existeJugador($dniMiembro)=='SI'){
                        $infoJugador = obtenerJugador($dniMiembro) ?>
                        <div class="subSeccionPerfil">
                            <div class="contenedorDato">
                                <span class="nombreDato">Categoría: </span><span><?= $infoJugador[0]['CATEGORIA']?></span>
                            </div>
                            <div class="contenedorDato">
                                <span class="nombreDato">Posición: </span><span><?= $infoJugador[0]['POSICION']?></span>
                            </div>
                            <div class="contenedorDato">
                                <span class="nombreDato">Federado: </span><span><?= $infoJugador[0]['FEDERADO']?></span>
                            </div>
                        </div>
                        <div class="subSeccionPerfil">
                            <div class="contenedorDato">
                                <form method="post" action="editarMiembro.php">
                                    <input type="hidden" name="dni" value="<?=$dniMiembro?>">
                                    <input type="hidden" name="editando" value="jugador">
                                    <button class="button">Editar Datos Jugador</button>
                                </form>
                            </div>
                            <div class="contenedorDato">
                                <form style="display: inline-block" method="post" action="../php/phpAdmin/Miembros/eliminarRolMiembro.php" id="formularioEliminarJugadorPerfil">
                                    <input type="hidden" name="dni" value="<?=$infoMiembro[0]["DNI"]?>">
                                    <input type="hidden" name="rol" value="jugador">
                                </form>
                                <button class="button" onclick="alertaEliminarJugadorDesdePerfil()">Eliminar Jugador</button>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <h2 class="tituloSeccionPerfil">Cuenta</h2>

                <div class="seccionPerfil cuenta">

                    <?php if(existeCuenta($dniMiembro)=='NO'){ ?>
                        <p class="mensajeOperacion">Este miembro tiene cuenta aún.</p>
                        <button class="button">Crear cuenta</button>
                    <?php } else if(existeCuenta($dniMiembro)=='SI'){
                        $infoCuenta = obtenerCuenta($dniMiembro) ?>
                        <div class="subSeccionPerfil">
                            <div class="contenedorDato">
                                <span class="nombreDato">Nombre de Usuario: </span><span><?= $infoCuenta[0]['USUARIO']?></span>
                            </div>
                            <div class="contenedorDato">
                                <span class="nombreDato">Tipo de Cuenta: </span><span><?= $infoCuenta[0]['TIPOUSUARIO']?>o</span>
                            </div>
                        </div>
                        <div class="subSeccionPerfil">
                            <div class="contenedorDato">
                                <button class="button">Editar Cuenta</button>
                            </div>
                            <div class="contenedorDato">
                                <button class="button">Eliminar Cuenta</button>
                            </div>
                        </div>

                    <?php } ?>

                </div>

                <h2 class="tituloSeccionPerfil">Otros</h2>

                <div class="seccionPerfil otraInformacion">
                    <div class="subSeccionPerfil">
                        <div class="contenedorDato">
                            <form style="display: inline-block" method="post" action="perfilPagos.php">
                                <input type="hidden" name="dni" value="<?=$dniMiembro?>">
                                <button class="button">Ver Pagos</button>
                            </form>
                        </div>
                    </div>
                    <div class="subSeccionPerfil">
                        <div class="contenedorDato">
                            <button class="button">Ver Solicitudes</button>
                        </div>
                    </div>
                </div>
            <?php } } else if(!(isset($_REQUEST['mensajeOperacion']))){ ?>
                <p class="mensajeOperacion">Ha ocurrido un problema en la selección del miembro.</p>
            <?php } ?>
        </div>
    </div>
</div>
</body>
</html>