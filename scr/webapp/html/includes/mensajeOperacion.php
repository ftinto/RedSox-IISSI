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
    } else if($_REQUEST['mensajeOperacion'] == 'pagoCreado'){
        $mensajeOperacion = 'El pago se ha creado correctamente.';
    } else if($_REQUEST['mensajeOperacion'] == 'usuariosCreados'){
        $mensajeOperacion = 'Usuario(s) creado(s) correctamente.';
    } else if($_REQUEST['mensajeOperacion'] == 'cuentaEliminada'){
        $mensajeOperacion = 'Usuario borrado correctamente.';
    } else if($_REQUEST['mensajeOperacion'] == 'usuarioEditado'){
        $mensajeOperacion = 'Usuario editado correctamente.';
    } else if($_REQUEST['mensajeOperacion'] == 'usuarioNoExiste'){
        $mensajeOperacion = 'No existe ninguna cuenta con ese usuario.';
    } else if($_REQUEST['mensajeOperacion'] == 'noCoincide'){
        $mensajeOperacion = 'El usuario y la contraseña no coinciden.';
    } else if($_REQUEST['mensajeOperacion'] == 'iniciarSesion'){
        $mensajeOperacion = 'Inicia sesión para acceder.';
    } else if($_REQUEST['mensajeOperacion'] == 'accesoNoPermitido'){
        $mensajeOperacion = 'No tienes permiso para acceder a esta sección.';
    } else if($_REQUEST['mensajeOperacion'] == 'solicitudCreada'){
        $mensajeOperacion = 'Solicitud creada correctamente.';
    } else if($_REQUEST['mensajeOperacion'] == 'solicitudEliminada'){
        $mensajeOperacion = 'Solicitud eliminada correctamente.';
    } else if($_REQUEST['mensajeOperacion'] == 'pedidoEliminado'){
        $mensajeOperacion = 'Pedido eliminado correctamente.';
    } else if($_REQUEST['mensajeOperacion'] == 'pedidoCreado'){
        $mensajeOperacion = 'Pedido creado correctamente.';
    } else{
        $mensajeOperacion = 'Mensaje sin definir recibido.';
    }
    ?>
    <p class="mensajeOperacion"><?=$mensajeOperacion?></p>
<?php } ?>