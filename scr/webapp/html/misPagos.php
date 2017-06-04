<?php
require_once ("../php/pagosUsuario.php");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="../css/main.css">
		<link rel="stylesheet" type="text/css" href="../css/pagos.css">
		<title>Inicio - Red Sox</title>
	</head>
	<body>
		<div class="pageContainer">
			<div class="banner">
				<div class="logoRedSox">
					<a href="index.html"> <img src="../images/logoRedSox.png" class="logoImage"> </a>
				</div>
				<a href="index.html" class="tituloBanner"> CLUB DE BÉISBOL Y SÓFBOL DE SEVILLA </a>
			</div>
			<div class="mainNavigator">
				<div class="menuButtons">
					<ul class="navButtons">
						<a href="index.html">
						<li class="navSelect">
							Inicio
						</li></a>
						<a href="index.html">
						<li class="navButton">
							Partidos
						</li></a>
						<a href="pagos.html">
						<li class="navButton">
							Pagos
						</li></a>
						<a href="pedidos.html">
						<li class="navButton">
							Pedidos
						</li></a>
						<a href="admin.html">
						<li class="navButton">
							Admin
						</li></a>
					</ul>
				</div>
			</div>
			<div class="content">
				<div class="pageTitle">
					Pagos
				</div>
				<div class="contenidoInicio">
					<div class="pagosContent">
						<?php
						if(isset($resultado[0])){
						foreach ($resultado as $fila) {
						?>
						<div id="pago<?= getEstadoPago($fila)?>1" class="pago<?= getEstadoPago($fila)?>">
							<div class="pestanaFechaInicioPago">
								<?= $fila["FECHAINICIO"]?>
							</div>
							<div class="contenidoPago">
								<h3 class="tituloPago">Mensual Diciembre</h3>
								<p class="infoPago">
									<?= $fila["CUANTIA"]?>€
								</p>
								<p class="infoPago">
									Localizador: <?= $fila["IDPAGO"]?>
								</p>
								<p class="fechaLimite<?= getEstadoPago($fila)?>">
									
									Fecha Límite: <?= $fila["FECHALIMITE"]?>
								</p>
							</div>
						</div>
						<?php
						}
						} else{
						?>
						<p class="mensajenulo">No tienes ningún pago pendiente.</p>
						<?php }?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>