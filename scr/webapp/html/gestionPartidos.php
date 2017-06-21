<?php
session_start();
require_once ("../php/phpAdmin/Miembros/consultaMiembros.php");
if (isset($_SESSION['usuario']) && isset($_SESSION['dni']) && isset($_SESSION['tipousuario']) && $_SESSION['tipousuario'] == 'administrador') { 
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <script type="text/javascript" src="../javascript/Admin/operacionesMiembros.js"></script>
    <title>Gestión de Partidos - Red Sox</title>
</head>
<body>
<div class="pageContainer">
    <?php include_once("includes/header.php") ?>
    <div class="content">
        <div class="pageTitle">
            Gestión de Partidos
        </div>
        <div class="contenidoInicio">
            <?php include_once("includes/mensajeOperacion.php") ?>
            <?php include_once("includes/navegacionPartidos.php") ?>
            <?php
			require_once ("../php/gestionBD.php");
			$con = crearConexionBD();
			$res = $con -> query("SELECT * FROM PARTIDOS");
            ?>
            <div class="contendorTablaPrincipal">
                <table class="tablaPrincipal">
                    <thead><tr role="row">
                        <th>Fecha</th>
                        <th>Rival</th>
                        <th>Categoria_Partido</th>
                        <th>Id</th>
                        
                        <th></th>
                    </tr> </thead>
                    <tbody>
                    <?php
                    $numeroMiembro = 0;
                    foreach($res as $fila){?>
                        <tr id="miembro<?=$numeroMiembro ?>">
                            <td><?= $fila["FECHA"] ?></td>
                            <td><?= $fila["RIVAL"] ?></td>
                            <td><?= $fila["CATEGORIA_PARTIDO"] ?></td>
                            <td><?= $fila["IDPARTIDO"] ?></td>
                            
                            <td>
                                <form style="display: inline-block" method="post" action="crearConvocatoria.php?id=<?=$fila["IDPARTIDO"]?>">
                                    <input type="hidden" name="id" value= <?= $fila["IDPARTIDO"]?> >
                                    <button class="button">Crear Convocatoria</button>
                                </form>
                               
                                
                                <form style="display: inline-block" method="post" action="eliminarPartido.php">
                                	<button class="button" onclick="alertaEliminarMiembroSeleccionado(<?=$numeroMiembro ?>)">Eliminar</button>
                                    <input type="hidden" name="id" value="<?=$fila["IDPARTIDO"] ?>">
                                </form>
                            </td>
                        </tr>
                    <?php
					$numeroMiembro = $numeroMiembro + 1;
					}
				?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php } else {
    header("Location: index.php?mensajeOperacion=accesoNoPermitido");
} ?>
