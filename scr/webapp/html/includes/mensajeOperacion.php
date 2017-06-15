<?php if(isset($_REQUEST['mensajeOperacion'])) {
    if($_REQUEST['mensajeOperacion'] == 'eliminarMiembroCancelado'){
        $mensajeOperacion = 'Has cancelado el borrado del miembro';
    } else if($_REQUEST['mensajeOperacion'] == 'miembroNoExiste'){
        $mensajeOperacion = 'El dni seleccionado no corresponde a ningún miembro existente';
    } else if($_REQUEST['mensajeOperacion'] == 'miembroConvertidoEmpleado'){
        $mensajeOperacion = 'El miembro se ha convertido a empleado con éxito';
    } else if($_REQUEST['mensajeOperacion'] == 'falloDatosRequest'){
        $mensajeOperacion = 'Ha ocurrido un problema en la introducción de datos, por favor inténtelo de nuevo.';
    } else if($_REQUEST['mensajeOperacion'] == 'miembroConvertidoEntrenador'){
        $mensajeOperacion = 'El miembro se ha convertido a entrenador con éxito';
    } else if($_REQUEST['mensajeOperacion'] == 'miembroConvertidoJugador'){
        $mensajeOperacion = 'El miembro se ha convertido a jugador con éxito';
    } else if($_REQUEST['mensajeOperacion'] == 'edadJugadorNoAptaCategoria'){
        $mensajeOperacion = 'La edad del jugador no es apta para la categoría seleccionada.';
    } else if($_REQUEST['mensajeOperacion'] == 'validacionDatosGenerico'){
        $mensajeOperacion = 'Ha ocurrido un error en la validación de datos.';
    } else if($_REQUEST['mensajeOperacion'] == 'miembroEliminado'){
        $mensajeOperacion = 'Miembro eliminado correctamente.';
    } else if($_REQUEST['mensajeOperacion'] == 'empleadoEliminado'){
        $mensajeOperacion = 'Se le ha eliminado el rol de empleado al miembro correctamente.';
    } else if($_REQUEST['mensajeOperacion'] == 'entrenadorEliminado'){
        $mensajeOperacion = 'Se le ha eliminado el rol de entrenador al miembro correctamente.';
    } else if($_REQUEST['mensajeOperacion'] == 'jugadorEliminado'){
        $mensajeOperacion = 'Se le ha eliminado el rol de jugador al miembro correctamente.';
    } else if($_REQUEST['mensajeOperacion'] == 'empleadoEditado'){
        $mensajeOperacion = 'Se ha editado al empleado correctamente.';
    } else if($_REQUEST['mensajeOperacion'] == 'entrenadorEditado'){
        $mensajeOperacion = 'Se ha editado al entrenador correctamente.';
    } else if($_REQUEST['mensajeOperacion'] == 'jugadorEditado'){
        $mensajeOperacion = 'Se ha editado al jugador correctamente.';
    } else if($_REQUEST['mensajeOperacion'] == 'miembroEditado'){
        $mensajeOperacion = 'Se ha editado al miembro correctamente.';
    } else if($_REQUEST['mensajeOperacion'] == 'empleadoCreado'){
        $mensajeOperacion = 'Se ha creado al empleado correctamente.';
    } else if($_REQUEST['mensajeOperacion'] == 'entrenadorCreado'){
        $mensajeOperacion = 'Se ha creado al entrenador correctamente.';
    } else if($_REQUEST['mensajeOperacion'] == 'jugadorCreado'){
        $mensajeOperacion = 'Se ha creado al jugador correctamente.';
    } else if($_REQUEST['mensajeOperacion'] == 'miembroCreado'){
        $mensajeOperacion = 'Se ha creado al miembro correctamente.';
    } else if($_REQUEST['mensajeOperacion'] == 'pagoEliminado'){
        $mensajeOperacion = 'Se ha eliminado el pago correctamente.';
    } else if($_REQUEST['mensajeOperacion'] == 'pagoLiquidado'){
        $mensajeOperacion = 'Se ha liquidado el pago correctamente.';
    } else if($_REQUEST['mensajeOperacion'] == 'pagosMensualesCreados'){
        $mensajeOperacion = 'Se han creado correctamente los pagos de este mes.';
    } else if($_REQUEST['mensajeOperacion'] == 'pagosCreado'){
        $mensajeOperacion = 'El pago se ha creado correctamente.';
    } else{
        $mensajeOperacion = 'Mensaje sin definir recibido.';
    }
    ?>
    <p class="mensajeOperacion"><?=$mensajeOperacion?></p>
<?php } ?>