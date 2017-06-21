<?php
require_once("../php/paginacion_consulta.php");
if(!(isset($_SESSION))){
session_start();
}
require_once("../php/gestionBD.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/pedidos.css">
    <title>Inicio - Red Sox</title>
</head>
<body>
<div class="pageContainer">
    <div class="banner">
        <div class="logoRedSox">
            <a href="index.html">
                <img src="../images/logoRedSox.png" class="logoImage">
            </a>
        </div>
        <a href="index.html" class="tituloBanner">
            CLUB DE BÃ‰ISBOL Y SÃ“FBOL DE SEVILLA
        </a>
    </div>
    <div class="mainNavigator">
        <div class="menuButtons">
            <ul class="navButtons">
                <a href="index.html">
                    <li class="navSelect">Inicio</li>
                </a>
                <a href="partidos.php">
                    <li class="navButton">Partidos</li>
                </a>
                <a href="misPagos.php">
                    <li class="navButton">Pagos</li>
                </a>
                <a href="pedidos.html">
                    <li class="navButton">Pedidos</li>
                </a>

                <a href="admin.php">
                    <li class="navButton">Admin</li>
                </a>
            </ul>
        </div>
    </div>
    <div class="content">
        <div class="pageTitle">
            Partidos
        </div>
        <div class="contenidoInicio">
        	
			<?php 
			if (isset($_SESSION["paginacion"]))
		$paginacion = $_SESSION["paginacion"];
	
	$pagina_seleccionada = isset($_GET["PAG_NUM"]) ? (int)$_GET["PAG_NUM"] : (isset($paginacion) ? (int)$paginacion["PAG_NUM"] : 1);
	$pag_tam = isset($_GET["PAG_TAM"]) ? (int)$_GET["PAG_TAM"] : (isset($paginacion) ? (int)$paginacion["PAG_TAM"] : 5);

	if ($pagina_seleccionada < 1) 		$pagina_seleccionada = 1;
	if ($pag_tam < 1) 		$pag_tam = 5;

	// Antes de seguir, borramos las variables de sección para no confundirnos más adelante
	unset($_SESSION["paginacion"]);

	$conexion = crearConexionBD();

	// La consulta que ha de paginarse
	$query = "SELECT * FROM PARTIDOS";

	// Se comprueba que el tamaño de página, página seleccionada y total de registros son conformes.
	// En caso de que no, se asume el tamaño de página propuesto, pero desde la página 1
	$total_registros = total_consulta($conexion, $query);
	$total_paginas = (int)($total_registros / $pag_tam);

	if ($total_registros % $pag_tam > 0)		$total_paginas++;

	if ($pagina_seleccionada > $total_paginas)		$pagina_seleccionada = $total_paginas;

	// Generamos los valores de sesión para página e intervalo para volver a ella después de una operación
	$paginacion["PAG_NUM"] = $pagina_seleccionada;
	$paginacion["PAG_TAM"] = $pag_tam;
	$_SESSION["paginacion"] = $paginacion;

	$filas = consulta_paginada($conexion, $query, $pagina_seleccionada, $pag_tam);

	cerrarConexionBD($conexion);

			?>
			
				
			
			<?php if(isset($_SESSION['tipoUsuario'])){
				echo "sese";
				if($_SESSION['tipoUsuario'] == "administrador")
				echo '<a href="anadePartido.php"> <button type="submit" name"añadir" >Añadir partido</button></a>';
			}
			
			?>
            <div class="pedidosContent">
            	<nav>

		<div id="enlaces">

			<?php

				for( $pagina = 1; $pagina <= $total_paginas; $pagina++ )

					if ( $pagina == $pagina_seleccionada) { 	?>

						<span class="current"><?php echo $pagina; ?></span>

			<?php }	else { ?>

						<a href="partidos.php?PAG_NUM=<?php echo $pagina; ?>&PAG_TAM=<?php echo $pag_tam; ?>"><?php echo $pagina; ?></a>

			<?php } ?>

		</div>



		<form method="get" action="partidos.php">

			<input id="PAG_NUM" name="PAG_NUM" type="hidden" value="<?php echo $pagina_seleccionada?>"/>

			Mostrando

			<input id="PAG_TAM" name="PAG_TAM" type="number"

				min="1" max="<?php echo $total_registros; ?>"

				value="<?php echo $pag_tam?>" autofocus="autofocus" />

			entradas de <?php echo $total_registros?>

			<input type="submit" value="Cambiar">

		</form>

	</nav>
            	
            	<?php	
					
				foreach($filas as $stid ) {
					echo'<div id="pedidoActivo1" class="pedidoActivo">';
					echo '<div class="pestanaFechaInicioPedido">'.$stid["FECHA"].'</div>';
					echo '<div class="contenidoPedido">';
					echo ' <h3 class="tituloPedido">'.$stid["RIVAL"].'</h3>';
					echo '<p class="infoPedido">'.$stid["CATEGORIA_PARTIDO"].'</p>';
					echo'</div></div>';
				}
				
				
				?>
                
            </div>

            
        </div>

    </div>
    </div>
</body>
</html>