<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <title>Inicio - Red Sox</title>
</head>
<body>
<div class="pageContainer">
    <?php include_once("includes/header.php") ?>
    <div class="content">
        <div class="pageTitle">
            Panel de Control
        </div>
        <div class="contenidoInicio">
            <div  class="botonAdminContenedor">
                <a href="gestionMiembros.php">
                    <div class="botonAdmin" style="background-image: url(../images/botonMiembrosAdmin.png);">
                        <div class="upperSection">
                            <div class="bottomSection" style="background-image: url(../images/textoMiembros.png);">
                            </div>
                        </div>
                    </div>
                </a>
                <a href="gestionPartidos.php">
                    <div class="botonAdmin" style="background-image: url(../images/botonPartidosAdmin.jpg);">
                        <div class="upperSection">
                            <div class="bottomSection" style="background-image: url(../images/textoPartidos.png);">
                            </div>
                        </div>
                    </div>
                </a>
                <a href="gestionPedidos.php">
                    <div class="botonAdmin" style="background-image: url(../images/botonPedidosAdmin.jpg);">
                        <div class="upperSection">
                            <div class="bottomSection" style="background-image: url(../images/textoPedidos.png);">
                            </div>
                        </div>
                    </div>
                </a>
                <a href="gestionPagos.php">
                    <div class="botonAdmin" style="background-image: url(../images/botonPagosAdmin.jpg);">
                        <div class="upperSection">
                            <div class="bottomSection" style="background-image: url(../images/textoPagos.png);">
                            </div>
                        </div>
                    </div>
                </a>
                <a href="gestionVotaciones.php">
                    <div class="botonAdmin" style="background-image: url(../images/botonVotacionesAdmin.jpg);">
                        <div class="upperSection">
                            <div class="bottomSection" style="background-image: url(../images/textoVotaciones.png);">
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
</body>
</html>