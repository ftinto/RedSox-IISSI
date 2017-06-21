<div class="banner">
    <div class="logoRedSox">
        <a href="index.php"> <img src="../images/logoRedSox.png" class="logoImage"> </a>
    </div>
    <a href="index.php" class="tituloBanner"> CLUB DE BÉISBOL Y SÓFBOL DE SEVILLA </a>
</div>
<div class="mainNavigator">
    <div class="menuButtons">
        <ul class="navButtons">
            <a href="index.php">
                <li class="navSelect">
                    Inicio
                </li></a>
            <a href="partidos.php">
                <li class="navButton">
                    Partidos
                </li></a>
            <a href="misPagos.php">
                <li class="navButton">
                    Pagos
                </li></a>
            <a href="verPedidos.php">
                <li class="navButton">
                    Pedidos
                </li></a>

            <?php
            if(isset($_SESSION['usuario']) && isset($_SESSION['tipousuario']) && $_SESSION['tipousuario']=='administrador'){ ?>
                <a href="admin.php">
                    <li class="navButton">
                        Admin
                    </li></a>
            <?php } ?>

            <?php

            if(isset($_SESSION['usuario'])){ ?>
                <a href="cerrarSesion.php">
                    <li class="navButton" style="color: #c82c2f">
                        Cerrar Sesión
                    </li></a>
            <?php } ?>
        </ul>
    </div>
</div>
