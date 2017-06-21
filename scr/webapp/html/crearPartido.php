<!DOCTYPE html>
<?php
require_once("../php/phpAdmin/jugadores/funcionesJugadores.php");
require_once("../php/gestionBD.php");
?>
<?php
   session_start();
   
   
   if(!isset($_SESSION['formPartido'])){
   	$formPartido['rival']="";
	$formPartido['dia']=0;
	$formPartido['mes']=00;
	$formPartido['anio']=0000;
	$formPartido['categoria']="";
	$_SESSION["formPartido"]=$formPartido;
   }
   else{
   $formPartido=$_SESSION["formPartido"];
   }
   if(isset($_SESSION["errorPartido"])){
   	$errores=$_SESSION["errorPartido"];
   }
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
	<?php
	include_once("includes/header.php");
	?>
    </div>
    <div class="content">
        <div class="pageTitle">
            Crear partido
        </div>
        <div class="contenidoInicio">
            <?php include_once("includes/mensajeOperacion.php") ?>
            <?php include_once("includes/navegacionMiembros.php") ?>
            <div class="contenedorConvertir">

                
			<?php if(isset($errores)){
			?>
			<p><?php
			echo $errores;
			unset($_SESSION["errorPartido"]);
			?>
			</p>
			<?php }
			?>
                    <h2 class="tituloSeccionPerfil">Crear partido</h2>
                    <form class="formularioCrear aMiembro" method="post" action="../php/phpAdmin/Partidos/crearPartido.php">
                    

                    <div class="tituloInput">Rival:</div>
                    <input type="text" name="rival" pattern="[a-zA-Z]{1,12}"value="<?=$formPartido["rival"]?>">
                   
                    <div class="tituloInput">Fecha:</div>
                    <div class="inputsFechaInicio">
                        Día: <input type="text" name="dia" pattern="[0-9]{1,2}" value="<?=$formPartido["dia"] ?>">
                        Mes: <input type="text" pattern="[0-9]{2}" name="mes" value="<?=$formPartido["mes"] ?>">
                        Año: <input type="text" name="anio" pattern="[0-9]{4}" value="<?=$formPartido["anio"] ?>">
                    </div>
                    <div >
                    	<select name="categoria">
                    		<option value="sub-21">sub-21</option>
                    		<option value="sub-19">sub-19</option>
                    	</select>
                    	
                    </div>
                    <input type="submit">
                    


                  

            </div>
        </div>
    </div>
</div>
</body>
</html>
