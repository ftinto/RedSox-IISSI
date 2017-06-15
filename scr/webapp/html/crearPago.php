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
            Gestión de Pagos
        </div>
        <div class="contenidoInicio">
            <?php include_once("includes/mensajeOperacion.php") ?>
            <?php include_once("includes/navegacionMiembros.php") ?>
            <div class="contenedorConvertir">

                <?php if(isset($_REQUEST['dni'])){
                    $dniSeleccionado = $_REQUEST['dni'];
                    ?>

                    <h2 class="tituloSeccionPerfil">Crear un pago nuevo:</h2>
                    <form class="formularioConvertir crearPago" method="post" action="../php/phpAdmin/Pagos/creandoPago.php">
                        <input type="hidden" name="dni" value="<?=$dniSeleccionado ?>">
                        <div class="tituloInput">Cuantía:</div>
                        <input type="text" name="cuantia">
                        <div class="tituloInput">Fecha Límite:</div>
                        <div class="inputsFechaInicio">
                            Día: <input type="text" name="diaLimite">
                            Mes: <input type="text" name="mesLimite">
                            Año: <input type="text" name="anioLimite">
                        </div>

                        <p>Se creará un pago de tipo 'OTRO'.</p>

                        <div class="tituloInput"><button class="button">Crear Pago</button></div>
                    </form>

                    <?php
                } else{ ?>
                    <p class="mensajeOperacion">No se ha accedido a la página correctamente.</p>
                <?php } ?>

            </div>
        </div>
    </div>
</div>
</body>
</html>