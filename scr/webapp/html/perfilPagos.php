<?php
session_start();
if(isset($_SESSION['usuario']) && isset($_SESSION['dni']) && isset($_SESSION['tipousuario']) && $_SESSION['tipousuario'] == 'administrador'){ ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <link rel="stylesheet" type="text/css" href="../css/pagos.css">
        <link rel="stylesheet" type="text/css" href="../css/admin.css">
        <script type="text/javascript" src="../javascript/Pagos/paginacion.js"></script>
        <title>Inicio - Red Sox</title>
    </head>
    <body>
    <div class="pageContainer">
        <?php include_once ("includes/header.php")?>
        <div class="content">
            <div class="pageTitle">
                Gestión de Pagos
            </div>
            <div class="contenidoInicio">
                <?php include_once("includes/mensajeOperacion.php") ?>
                <?php include_once("includes/navegacionPagos.php") ?>
                <?php require_once("../php/pagosMiembro.php")?>

                <?php if(isset($_REQUEST['dni'])){

                    $dniSeleccionado = $_REQUEST['dni'];
                    $resultado = obtenerPagosDeMiembro($dniSeleccionado);
                    $resultado = filtrarPagosLiquidados($resultado);
                    $resultado = ordenarPagosCronologicamente($resultado);
                    $numeroDePagos =  count($resultado);
                    ?>
                    <?php require_once("../php/phpAdmin/Pagos/operacionesPagos.php") ?>
                    <div class="pagosContent" id="pagosContent">
                        <?php
                        if(isset($resultado[0])){?>
                            <p>Este miembro tiene <?= $numeroDePagos?> pagos pendientes.</p>
                            <?php $numeroPago = 0;
                            foreach ($resultado as $fila) {
                                require_once('../php/phpAdmin/Pagos/operacionesPagos.php');
                                ?>
                                <div id="pago<?= $numeroPago?>" class="pago<?= getEstadoPago($fila)?>" >
                                    <div class="pestanaFechaInicioPago">
                                        <?= $fila["FECHAINICIO"]?>
                                    </div>
                                    <div class="contenidoPago">
                                        <h3 class="tituloPago"><?=getNombrePago($fila)?></h3>
                                        <p class="infoPago">
                                            <?= $fila["CUANTIA"]?>€
                                        </p>
                                        <p class="infoPago">
                                            Localizador: <?= $fila["IDPAGO"]?>
                                        </p>
                                        <p class="fechaLimite<?= getEstadoPago($fila)?>">

                                            Fecha Límite: <?= $fila["FECHALIMITE"]?>
                                        </p>
                                        <form style="display: inline-block" method="post" action="../php/phpAdmin/Pagos/liquidarPago.php">
                                            <input type="hidden" name="idpago" value="<?= $fila["IDPAGO"]?>">
                                            <button class="button">Liquidar</button>
                                        </form>
                                        <form style="display: inline-block" method="post" action="../php/phpAdmin/Pagos/eliminarPago.php">
                                            <input type="hidden" name="idpago" value="<?= $fila["IDPAGO"]?>">
                                            <button class="button">Eliminar</button>
                                        </form>
                                    </div>
                                </div>
                                <?php
                                $numeroPago = $numeroPago + 1;
                            }
                        } else{
                            ?>
                            <p class="mensajenulo">No tienes ningún pago pendiente.</p>
                        <?php }?>
                        <script>
                            paginacionPagos(<?= $numeroDePagos?>)
                        </script>
                    </div>
                    <?php
                } else {?>
                    <p class="mensajeOperacion">No se ha seleccionado ningún miembro.</p>
                <?php } ?>
                <form style="display: inline-block" method="post" action="crearPago.php">
                    <input type="hidden" name="dni" value="<?= $_REQUEST['dni']?>">
                    <button class="button">Crear Pago Nuevo</button>
                </form>
            </div>
        </div>
    </div>
    </body>
    </html>
<?php } else {
    header("Location: index.php?mensajeOperacion=accesoNoPermitido");
} ?>
