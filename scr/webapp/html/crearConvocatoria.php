<!DOCTYPE html>
<?php
session_start();
require_once("../php/phpAdmin/jugadores/funcionesJugadores.php");
require_once("../php/gestionBD.php");
if(isset($_SESSION['usuario']) && isset($_SESSION['dni']) && isset($_SESSION['tipousuario']) && $_SESSION['tipousuario'] == 'administrador'){ 
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/crearSolicitud.css">
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
            CLUB DE BÉISBOL Y SÓFBOL DE SEVILLA
        </a>
    </div>
    <div class="mainNavigator">
	<?
	include_once("includes/header.php");
	?>
    </div>
    <div class="content">
        <div class="pageTitle">
            Crear convocatoria
        </div>
        <div class="contenidoInicio">

            <div id="formCreaSolicitud">
                <div class="entry-content">
                    <?php
                    
                    if(isset($_SESSION["errorConvoc"])){
                    	echo "<p>".$_SESSION["errorConvoc"]."</p>";
                    }
                    unset($_SESSION["errorConvoc"]);
                    ?>
                    	<form method="get" action="accionCreaConvocatoria.php">
                    		<select multiple name="jugador[]"  >
					<?php
					
					$conexion=crearConexionBD();	
						$jugadores = consultaJugadores($conexion);
						
				  		foreach($jugadores as $jugador) {
				  			// Chequea si este g�nero literario fue seleccionado previamente, para marcarlo en el HTML con el atributo "selected"
				  		
								echo "<option   value=".$jugador["DNI"].	">";
								echo $jugador["DNI"].",".$jugador["NOMBRE"];
								echo "</option>";

						}
					?>
					</select>
					<input type="hidden" name="id" value=<?=$_REQUEST["id"]?>>
					<input type="submit">
					</form>
                </div>
            </div>

        </div>

    </div>


</div>
</body>
</html>
<?php } else {
    header("Location: index.php?mensajeOperacion=accesoNoPermitido");
} ?>

