<?php
session_start();
if(isset($_SESSION['usuario']) && isset($_SESSION['dni']) && isset($_SESSION['tipousuario']) && $_SESSION['tipousuario'] == 'administrador'){

    ?>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <link rel="stylesheet" type="text/css" href="../css/admin.css">
        <script type="text/javascript" src="../javascript/Admin/operacionesMiembros.js"></script>
        <title>Gestión de Pedidos - Red Sox</title>
    </head>
    <body>
    <div class="pageContainer">
        <?php include_once("includes/header.php") ?>
        <div class="content">
            <div class="pageTitle">
                Gestión de Pedidos
            </div>
            <div class="contenidoInicio">
                <?php include_once("includes/mensajeOperacion.php") ?>
                <?php include_once("includes/navegacionPedidos.php") ?>

                <?php
                if(isset($_REQUEST['idpedido'])){
                    require_once ("../php/phpAdmin/Pedido/operacionesPedidos.php");
                    require_once ("../php/pedidosMiembro.php");
                    $resultado = obtenerSolicitudesDePedido($_REQUEST['idpedido']);
                    if(count($resultado)>0){

                        $pedidosAsociados = obtenerPedidosDeSolicitudes($resultado);
                        $miembrosAsociados = obtenerMiembrosDeSolicitudes($resultado);
                        $pagosAsociados = obtenerPagosDeSolicitudes($resultado);
                        ?>

                        <p>Solicitudes del pedido de <?= $pedidosAsociados[0]['PRODUCTO']?> de localizador <?= $pedidosAsociados[0]['IDPEDIDO']?></p>
                        <div class="contendorTablaPrincipal">
                            <table class="tablaPrincipal">
                                <thead><tr role="row">
                                    <th>Localizador</th>
                                    <th>Miembro</th>
                                    <th>DNI</th>
                                    <th>Datos</th>
                                    <th>Pago Asociado</th>
                                    <th>Liquidado</th>
                                </tr> </thead>
                                <tbody>
                                <?php
                                $numeroSolicitud = 0;
                                require_once("../php/pagosMiembro.php");
                                foreach($resultado as $fila){

                                    if(esPedidoEntregado($pedidosAsociados[$numeroSolicitud])=='NO'){
                                        ?>
                                        <tr id="solicitud<?=$numeroSolicitud?>">
                                            <td><?= $fila["IDSOLICITUD"]?></td>
                                            <td>

                                                <?php
                                                if($miembrosAsociados[$numeroSolicitud] == 'noExiste'){
                                                    ?>
                                                    No Localizado
                                                    <?php
                                                } else {
                                                    ?>

                                                    <?= $miembrosAsociados[$numeroSolicitud]['NOMBRE']?>

                                                    <?php
                                                }
                                                ?>

                                            </td>
                                            <td>

                                                <?php
                                                if($miembrosAsociados[$numeroSolicitud] == 'noExiste'){
                                                    ?>
                                                    No Localizado
                                                    <?php
                                                } else {
                                                    ?>

                                                    <?= $miembrosAsociados[$numeroSolicitud]['DNI']?>

                                                    <?php
                                                }
                                                ?>

                                            </td>
                                            <td><?= $fila["DATOS"]?></td>
                                            <td>

                                                <?php
                                                if($pagosAsociados[$numeroSolicitud] == 'noExiste'){
                                                    ?>
                                                    No Localizado
                                                    <?php
                                                } else {
                                                    ?>

                                                    <?= $pagosAsociados[$numeroSolicitud]['IDPAGO']?>

                                                    <?php
                                                }
                                                ?>

                                            </td>
                                            <td>

                                                <?php
                                                if($pagosAsociados[$numeroSolicitud] == 'noExiste'){
                                                    ?>
                                                    No Localizado
                                                    <?php
                                                } else {
                                                    ?>

                                                    <?= esPagoLiquidado($pagosAsociados[$numeroSolicitud])?>

                                                    <?php
                                                }
                                                ?>

                                            </td>
                                        </tr>
                                        <?php

                                    }
                                    $numeroSolicitud = $numeroSolicitud +1;
                                }?>
                                </tbody>
                            </table>
                        </div>
                     <?php
                    } else { ?>
                        <p>No hay solicitudes para este pedido.</p>


                        <?php

                    }

                } else{ ?>

                    <p class="mensajeOperacion">No se ha seleccionado el pedido correctamente.</p>
                    <?php
                }

                ?>



            </div>
        </div>
    </div>
    </body>
    </html>
<?php } else {
    header("Location: index.php?mensajeOperacion=accesoNoPermitido");
} ?>