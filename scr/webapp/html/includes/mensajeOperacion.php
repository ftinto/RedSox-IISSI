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
    } else if($_REQUEST['mensajeOperacion'] == 'validacionDNI'){
        $mensajeOperacion = 'Debes introducir un dni o nie con un formato válido.';
    } else if($_REQUEST['mensajeOperacion'] == 'validacionFechaInicio'){
        $mensajeOperacion = 'Debes introducir una fecha de inicio válida.';
    } else if($_REQUEST['mensajeOperacion'] == 'validacionFechaFin'){
        $mensajeOperacion = 'Si introduces una fecha de fin, esta tiene que tener un formato válido.';
    } else if($_REQUEST['mensajeOperacion'] == 'validacionFechaInicioFin'){
        $mensajeOperacion = 'La fecha de inicio introducida no puede ser posterior a la de fin.';
    } else if($_REQUEST['mensajeOperacion'] == 'validacionPuesto'){
        $mensajeOperacion = 'El puesto no puede tener más de 25 caracteres.';
    } else if($_REQUEST['mensajeOperacion'] == 'validacionNombre'){
        $mensajeOperacion = 'El nombre no puede tener más de 50 caracteres.';
    } else if($_REQUEST['mensajeOperacion'] == 'validacionDireccion'){
        $mensajeOperacion = 'La direccion no puede tener más de 80 caracteres.';
    } else if($_REQUEST['mensajeOperacion'] == 'validacionEmail'){
        $mensajeOperacion = 'El email introducido no tiene un formato correcto.';
    } else if($_REQUEST['mensajeOperacion'] == 'validacionTelefono'){
        $mensajeOperacion = 'El telefono introducido no tiene un formato correcto.';
    } else if($_REQUEST['mensajeOperacion'] == 'validacionFechaNacimiento'){
        $mensajeOperacion = 'La fecha de nacimiento introducida no tiene un formato correcto.';
    } else if($_REQUEST['mensajeOperacion'] == 'validacionUsuario'){
        $mensajeOperacion = 'El usuario introducido no sigue un formato alfanumérico, excede el máximo de caracteres o ya existe.';
    } else if($_REQUEST['mensajeOperacion'] == 'validacionContrasena'){
        $mensajeOperacion = 'La contraseña introducida no sigue un formato correcto o es demasiado corta.';
    } else if($_REQUEST['mensajeOperacion'] == 'validacionTipoUsuario'){
        $mensajeOperacion = 'Ha ocurrido un problema con la selección del tipo de usuario.';
    } else{
        $mensajeOperacion = 'Mensaje sin definir recibido.';
    }
    ?>
    <p class="mensajeOperacion"><?=$mensajeOperacion?></p>
<?php } ?>