<?php
session_start();
if(isset($_SESSION['usuario']) && isset($_SESSION['dni']) && isset($_SESSION['tipousuario']) && $_SESSION['tipousuario'] == 'administrador'){ ?>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <link rel="stylesheet" type="text/css" href="../css/admin.css">
        <script type="text/javascript" src="../javascript/Admin/operacionesMiembros.js"></script>
        <title>Crear Nuevo Pedido - Red Sox</title>
    </head>
    <body>
    <div class="pageContainer">
        <?php include_once("includes/header.php") ?>
        <div class="content">
            <div class="pageTitle">
                Crear un nuevo pedido
            </div>
            <div class="contenidoInicio">
                <?php include_once("includes/mensajeOperacion.php") ?>
                <?php include_once("includes/navegacionPedidos.php") ?>
                <div class="contenedorConvertir">
                    <form action="../php/phpAdmin/Pedido/creandoPedido.php" method="post">
                        <div class="tituloInput">Nombre del producto:</div>
                        <input type="text" name="producto" required>
                        <div class="tituloInput">Nombre del proveedor:</div>
                        <input type="text" name="proveedor" required>
                        <div class="tituloInput">Precio del producto:</div>
                        <input type="text" name="precio" required>
                        <div class="tituloInput">Fecha límite para crear solicitudes:</div>
                        <div class="inputsFechaInicio">
                            Día: <input type="text" name="diaLimite" pattern="^[0-9]{2}$" required>
                            Mes: <input type="text" name="mesLimite" pattern="^[0-9]{2}$" required>
                            Año: <input type="text" name="anioLimite" pattern="^[0-9]{4}$" required>
                        </div>
                        <div class="tituloInput">Fecha de entrega</div>
                        <div class="inputsFechaFin">
                            Día: <input type="text" name="diaLlegada" pattern="^[0-9]{2}$">
                            Mes: <input type="text" name="mesLlegada" pattern="^[0-9]{2}$">
                            Año: <input type="text" name="anioLlegada" pattern="^[0-9]{4}$">
                        </div>
                        <div class="tituloInput">
                            <button class="button">Crear</button>
                        </div>
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