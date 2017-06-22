<?php

function obtenerMiembros() {
    require_once (dirname(dirname(dirname(__FILE__)))."\gestionBD.php");
    $conexion = crearConexionBD();
    $stmt = $conexion -> prepare("SELECT DNI, NOMBRE, FECHANACIMIENTO, EMAIL, DIRECCION, TELEFONO, TIPOMIEMBRO
FROM MIEMBROS");
    $stmt -> execute();
    $resultado = $stmt -> fetchAll();
    cerrarConexionBD($conexion);
    return $resultado;
}

function obtenerMiembrosPaginados($page_num, $page_size) {
    require_once (dirname(dirname(dirname(__FILE__)))."\gestionBD.php");
    $conexion = crearConexionBD();
    $stmt = "SELECT DNI, NOMBRE, FECHANACIMIENTO, EMAIL, DIRECCION, TELEFONO, TIPOMIEMBRO FROM MIEMBROS";
    $resultado = consulta_paginada($conexion,$stmt,$page_num,$page_size);
    $resultado = $resultado -> fetchAll();
    cerrarConexionBD($conexion);
    return $resultado;
}

function obtenerEmpleadosPaginados($page_num, $page_size) {
    require_once (dirname(dirname(dirname(__FILE__)))."\gestionBD.php");
    $conexion = crearConexionBD();
    $stmt = "SELECT DNI FROM EMPLEADOS";
    $resultado = consulta_paginada($conexion,$stmt,$page_num,$page_size);
    $resultado = $resultado -> fetchAll();
    cerrarConexionBD($conexion);
    return $resultado;
}

function obtenerJugadoresPaginados($page_num, $page_size) {
    require_once (dirname(dirname(dirname(__FILE__)))."\gestionBD.php");
    $conexion = crearConexionBD();
    $stmt = "SELECT DNI FROM JUGADORES";
    $resultado = consulta_paginada($conexion,$stmt,$page_num,$page_size);
    $resultado = $resultado -> fetchAll();
    cerrarConexionBD($conexion);
    return $resultado;
}

function obtenerEntrenadoresPaginados($page_num, $page_size) {
    require_once (dirname(dirname(dirname(__FILE__)))."\gestionBD.php");
    $conexion = crearConexionBD();
    $stmt = "SELECT DNI FROM ENTRENADORES";
    $resultado = consulta_paginada($conexion,$stmt,$page_num,$page_size);
    $resultado = $resultado -> fetchAll();
    cerrarConexionBD($conexion);
    return $resultado;
}

function obtenerNumeroDeMiembros() {
    require_once (dirname(dirname(dirname(__FILE__)))."\gestionBD.php");
    $conexion = crearConexionBD();
    $stmt = $conexion -> prepare("SELECT *
FROM MIEMBROS");
    $stmt -> execute();
    $resultado = $stmt -> fetchAll();
    cerrarConexionBD($conexion);
    return count($resultado);
}

function obtenerNumeroDeEmpleados() {
    require_once (dirname(dirname(dirname(__FILE__)))."\gestionBD.php");
    $conexion = crearConexionBD();
    $stmt = $conexion -> prepare("SELECT *
FROM EMPLEADOS");
    $stmt -> execute();
    $resultado = $stmt -> fetchAll();
    cerrarConexionBD($conexion);
    return count($resultado);
}

function obtenerNumeroDeJugadores() {
    require_once (dirname(dirname(dirname(__FILE__)))."\gestionBD.php");
    $conexion = crearConexionBD();
    $stmt = $conexion -> prepare("SELECT *
FROM JUGADORES");
    $stmt -> execute();
    $resultado = $stmt -> fetchAll();
    cerrarConexionBD($conexion);
    return count($resultado);
}

function obtenerNumeroDeEntrenadores() {
    require_once (dirname(dirname(dirname(__FILE__)))."\gestionBD.php");
    $conexion = crearConexionBD();
    $stmt = $conexion -> prepare("SELECT *
FROM ENTRENADORES");
    $stmt -> execute();
    $resultado = $stmt -> fetchAll();
    cerrarConexionBD($conexion);
    return count($resultado);
}

function obtenerMiembrosDeEmpleados($empleados){
    $res = array();
    $index = 0;
    foreach($empleados as $fila){
        $miembro = obtenerMiembro($fila['DNI']);
        $res[$index]=$miembro[0];
        $index = $index + 1;
    }
    return $res;
}

function obtenerMiembrosDeJugadores($jugadores){
    $res = array();
    $index = 0;
    foreach($jugadores as $fila){
        $miembro = obtenerMiembro($fila['DNI']);
        $res[$index]=$miembro[0];
        $index = $index + 1;
    }
    return $res;
}

function obtenerMiembrosDeEntrenadores($entrenadores){
    $res = array();
    $index = 0;
    foreach($entrenadores as $fila){
        $miembro = obtenerMiembro($fila['DNI']);
        $res[$index]=$miembro[0];
        $index = $index + 1;
    }
    return $res;
}




function eliminarMiembroDni($dni){
    require_once (dirname(dirname(dirname(__FILE__)))."\gestionBD.php");
    $conexion = crearConexionBD();
    $stmt = $conexion->prepare("CALL ELIMINARMIEMBRO(?)");
    $stmt->bindParam(1, $dni, PDO::PARAM_STR, 4000);
    $stmt -> execute();
    cerrarConexionBD($conexion);
}

function numeroPagosMiembro($dni){
    require_once (dirname(dirname(dirname(__FILE__)))."\pagosMiembro.php");
    $pagos = obtenerPagosDeMiembro($dni);
    $res = count($pagos);
    return $res;
}

function numeroPagosPendientesMiembro($dni){
    require_once (dirname(dirname(dirname(__FILE__)))."\pagosMiembro.php");
    $pagos = obtenerPagosDeMiembro($dni);
    $pagos = filtrarPagosLiquidados($pagos);
    $res = count($pagos);
    return $res;
}

function obtenerMiembro($dni){
    require_once (dirname(dirname(dirname(__FILE__)))."\gestionBD.php");
    $conexion = crearConexionBD();
    $stmt = $conexion -> prepare("SELECT DNI, NOMBRE, FECHANACIMIENTO, EMAIL, DIRECCION, TELEFONO, TIPOMIEMBRO
FROM MIEMBROS WHERE dni=:data");
    $stmt -> execute(array(':data' => $dni));
    $resultado = $stmt -> fetchAll();
    cerrarConexionBD($conexion);
    return $resultado;
}

function obtenerEmpleado($dni){
    require_once (dirname(dirname(dirname(__FILE__)))."\gestionBD.php");
    $conexion = crearConexionBD();
    $stmt = $conexion -> prepare("SELECT DNI, PUESTO, FECHAINICIO, FECHAFIN, DIRECTIVA, IDTRABAJO
FROM EMPLEADOS WHERE dni=:data");
    $stmt -> execute(array(':data' => $dni));
    $resultado = $stmt -> fetchAll();
    cerrarConexionBD($conexion);
    return $resultado;
}

function obtenerEntrenador($dni){
    require_once (dirname(dirname(dirname(__FILE__)))."\gestionBD.php");
    $conexion = crearConexionBD();
    $stmt = $conexion -> prepare("SELECT DNI, CATEGORIA
FROM ENTRENADORES WHERE dni=:data");
    $stmt -> execute(array(':data' => $dni));
    $resultado = $stmt -> fetchAll();
    cerrarConexionBD($conexion);
    return $resultado;
}

function obtenerJugador($dni){
    require_once(dirname(dirname(dirname(__FILE__)))."\gestionBD.php");
    $conexion = crearConexionBD();
    $stmt = $conexion -> prepare("SELECT DNI, CATEGORIA, POSICION, FEDERADO
FROM JUGADORES WHERE dni=:data");
    $stmt -> execute(array(':data' => $dni));
    $resultado = $stmt -> fetchAll();
    cerrarConexionBD($conexion);
    return $resultado;
}

function obtenerCuenta($dni){
    require_once (dirname(dirname(dirname(__FILE__)))."\gestionBD.php");
    $conexion = crearConexionBD();
    $stmt = $conexion -> prepare("SELECT USUARIO, PASSWORD, DNI, TIPOUSUARIO
FROM USUARIOS WHERE dni=:data");
    $stmt -> execute(array(':data' => $dni));
    $resultado = $stmt -> fetchAll();
    cerrarConexionBD($conexion);
    return $resultado;
}

function obtenerCuentaConUsuario($usuario){
    require_once (dirname(dirname(dirname(__FILE__)))."\gestionBD.php");
    $conexion = crearConexionBD();
    $stmt = $conexion -> prepare("SELECT USUARIO, PASSWORD, DNI, TIPOUSUARIO
FROM USUARIOS WHERE usuario=:data");
    $stmt -> execute(array(':data' => $usuario));
    $resultado = $stmt -> fetchAll();
    cerrarConexionBD($conexion);
    return $resultado;
}

function existeMiembro($dni){
    if(count(obtenerMiembro($dni)) == 1){
        $res = 'SI';
    } else {
        $res = 'NO';
    }
    return $res;
}

function existeEmpleado($dni){
    if(count(obtenerEmpleado($dni)) == 1){
        $res = 'SI';
    } else {
        $res = 'NO';
    }
    return $res;
}

function existeEntrenador($dni){
    if(count(obtenerEntrenador($dni)) == 1){
        $res = 'SI';
    } else {
        $res = 'NO';
    }
    return $res;
}

function existeJugador($dni){
    if(count(obtenerJugador($dni)) == 1){
        $res = 'SI';
    } else {
        $res = 'NO';
    }
    return $res;
}

function existeCuenta($dni){
    if(count(obtenerCuenta($dni)) == 1){
        $res = 'SI';
    } else {
        $res = 'NO';
    }
    return $res;
}

function convertirAEmpleado($dni,$puesto,$fechaInicio,$fechaFin,$directiva){
    require_once (dirname(dirname(dirname(__FILE__)))."\gestionBD.php");
    $conexion = crearConexionBD();
    $stmt = $conexion -> prepare("CALL CONVERTIR_A_EMPLEADO(?,?,to_date(?,'DD/MM/YYYY'),to_date(?,'DD/MM/YYYY'),?)");
    $stmt->bindParam(1, $dni, PDO::PARAM_STR, 4000);
    $stmt->bindParam(2, $puesto, PDO::PARAM_STR, 4000);
    $stmt->bindParam(3, $fechaInicio, PDO::PARAM_STR, 4000);
    $stmt->bindParam(4, $fechaFin, PDO::PARAM_STR, 4000);
    $stmt->bindParam(5, $directiva, PDO::PARAM_STR, 4000);
    $stmt -> execute();
    cerrarConexionBD($conexion);
}

function convertirAEntrenador($dni,$categoria){
    require_once (dirname(dirname(dirname(__FILE__)))."\gestionBD.php");
    $conexion = crearConexionBD();
    $stmt = $conexion -> prepare("CALL CONVERTIR_A_ENTRENADOR(?,?)");
    $stmt->bindParam(1, $dni, PDO::PARAM_STR, 4000);
    $stmt->bindParam(2, $categoria, PDO::PARAM_STR, 4000);
    $stmt -> execute();
    cerrarConexionBD($conexion);
}

function convertirAJugador($dni,$categoria, $posicion, $federado){
    require_once (dirname(dirname(dirname(__FILE__)))."\gestionBD.php");
    $conexion = crearConexionBD();
    $stmt = $conexion -> prepare("CALL CONVERTIR_A_JUGADOR(?,?,?,?)");
    $stmt->bindParam(1, $dni, PDO::PARAM_STR, 4000);
    $stmt->bindParam(2, $categoria, PDO::PARAM_STR, 4000);
    $stmt->bindParam(3, $posicion, PDO::PARAM_STR, 4000);
    $stmt->bindParam(4, $federado, PDO::PARAM_STR, 4000);
    $stmt -> execute();
    cerrarConexionBD($conexion);
}



function esJugadorAptoCategoria($dni,$categoria){
    require_once (dirname(dirname(dirname(__FILE__))).'\funcionesTipos\funcionesFechas.php');
    $miembro = obtenerMiembro($dni)[0];
    $fechaNacimiento = getObjetoFecha($miembro['FECHANACIMIENTO']);
    $edad = getAniosDesde($fechaNacimiento);
    if( (($categoria=='sub-21') && ($edad>21)) || (($categoria=='sub-19') && ($edad>19))){
        $res = 'NO';
    } else{
        $res = 'SI';
    }
    return $res;
}


function esJugadorAptoCategoriaRecibeFecha($fechaNacimiento,$categoria){
    require_once (dirname(dirname(dirname(__FILE__))).'\funcionesTipos\funcionesFechas.php');
    $fecha = getObjetoFecha($fechaNacimiento);
    $edad = getAniosDesde($fecha);
    if( (($categoria=='sub-21') && ($edad>21)) || (($categoria=='sub-19') && ($edad>19))){
        $res = 'NO';
    } else{
        $res = 'SI';
    }
    return $res;
}




function eliminarEmpleado($dni){
    require_once (dirname(dirname(dirname(__FILE__)))."\gestionBD.php");
    $conexion = crearConexionBD();
    $stmt = $conexion->prepare("CALL ELIMINAREMPLEADO(?,?)");
    $mantenerAfiliado = 'SI';
    $stmt->bindParam(1, $dni, PDO::PARAM_STR, 4000);
    $stmt->bindParam(2, $mantenerAfiliado, PDO::PARAM_STR, 4000);
    $stmt -> execute();
    cerrarConexionBD($conexion);
}

function eliminarEntrenador($dni){
    require_once (dirname(dirname(dirname(__FILE__)))."\gestionBD.php");
    $conexion = crearConexionBD();
    $stmt = $conexion->prepare("CALL ELIMINARENTRENADOR(?,?)");
    $mantenerAfiliado = 'SI';
    $stmt->bindParam(1, $dni, PDO::PARAM_STR, 4000);
    $stmt->bindParam(2, $mantenerAfiliado, PDO::PARAM_STR, 4000);
    $stmt -> execute();
    cerrarConexionBD($conexion);
}

function eliminarJugador($dni){
    require_once (dirname(dirname(dirname(__FILE__)))."\gestionBD.php");
    $conexion = crearConexionBD();
    $stmt = $conexion->prepare("CALL ELIMINARJUGADOR(?,?)");
    $mantenerAfiliado = 'SI';
    $stmt->bindParam(1, $dni, PDO::PARAM_STR, 4000);
    $stmt->bindParam(2, $mantenerAfiliado, PDO::PARAM_STR, 4000);
    $stmt -> execute();
    cerrarConexionBD($conexion);
}

function eliminarCuenta($usuario){
    require_once (dirname(dirname(dirname(__FILE__)))."\gestionBD.php");
    $conexion = crearConexionBD();
    $stmt = $conexion->prepare("CALL ELIMINAR_USUARIO(?)");
    $stmt->bindParam(1, $usuario, PDO::PARAM_STR, 4000);
    $stmt -> execute();
    cerrarConexionBD($conexion);
}

function editarEmpleado($olddni, $puesto,$fechaInicio,$fechaFin,$directiva, $nombre, $email, $fechaNacimiento, $direccion, $telefono){
    require_once (dirname(dirname(dirname(__FILE__)))."\gestionBD.php");
    $parcheIDTRABAJO = obtenerEmpleado($olddni)[0]['IDTRABAJO'];
    $conexion = crearConexionBD();
    $stmt = $conexion -> prepare("CALL EDITAR_EMPLEADO(?,?,?,to_date(?,'DD/MM/YYYY'),to_date(?,'DD/MM/YYYY'),?,?,?,?,to_date(?,'DD/MM/YYYY'),?,?)");
    $stmt->bindParam(1, $olddni, PDO::PARAM_STR, 4000);
    $stmt->bindParam(2, $olddni, PDO::PARAM_STR, 4000);
    $stmt->bindParam(3, $puesto, PDO::PARAM_STR, 4000);
    $stmt->bindParam(4, $fechaInicio, PDO::PARAM_STR, 4000);
    $stmt->bindParam(5, $fechaFin, PDO::PARAM_STR, 4000);
    $stmt->bindParam(6, $directiva, PDO::PARAM_STR, 4000);
    $stmt->bindParam(7, $parcheIDTRABAJO, PDO::PARAM_STR, 4000);
    $stmt->bindParam(8, $nombre, PDO::PARAM_STR, 4000);
    $stmt->bindParam(9, $email, PDO::PARAM_STR, 4000);
    $stmt->bindParam(10, $fechaNacimiento, PDO::PARAM_STR, 4000);
    $stmt->bindParam(11, $direccion, PDO::PARAM_STR, 4000);
    $stmt->bindParam(12, $telefono, PDO::PARAM_STR, 4000);
    $stmt -> execute();
    cerrarConexionBD($conexion);
}

function editarEntrenador($olddni, $categoria, $nombre, $email, $fechaNacimiento, $direccion, $telefono){
    require_once (dirname(dirname(dirname(__FILE__)))."\gestionBD.php");
    $conexion = crearConexionBD();
    $stmt = $conexion -> prepare("CALL EDITAR_ENTRENADOR(?,?,?,?,?,to_date(?,'DD/MM/YYYY'),?,?)");
    $stmt->bindParam(1, $olddni, PDO::PARAM_STR, 4000);
    $stmt->bindParam(2, $olddni, PDO::PARAM_STR, 4000);
    $stmt->bindParam(3, $categoria, PDO::PARAM_STR, 4000);
    $stmt->bindParam(4, $nombre, PDO::PARAM_STR, 4000);
    $stmt->bindParam(5, $email, PDO::PARAM_STR, 4000);
    $stmt->bindParam(6, $fechaNacimiento, PDO::PARAM_STR, 4000);
    $stmt->bindParam(7, $direccion, PDO::PARAM_STR, 4000);
    $stmt->bindParam(8, $telefono, PDO::PARAM_STR, 4000);
    $stmt -> execute();
    cerrarConexionBD($conexion);
}

function editarJugador($olddni,$categoria, $posicion, $federado, $nombre, $email, $fechaNacimiento, $direccion, $telefono){
    require_once (dirname(dirname(dirname(__FILE__)))."\gestionBD.php");
    $conexion = crearConexionBD();
    $stmt = $conexion -> prepare("CALL EDITAR_JUGADOR(?,?,?,?,?,?,?,to_date(?,'DD/MM/YYYY'),?,?)");
    $stmt->bindParam(1, $olddni, PDO::PARAM_STR, 4000);
    $stmt->bindParam(2, $olddni, PDO::PARAM_STR, 4000);
    $stmt->bindParam(3, $categoria, PDO::PARAM_STR, 4000);
    $stmt->bindParam(4, $posicion, PDO::PARAM_STR, 4000);
    $stmt->bindParam(5, $federado, PDO::PARAM_STR, 4000);
    $stmt->bindParam(6, $nombre, PDO::PARAM_STR, 4000);
    $stmt->bindParam(7, $email, PDO::PARAM_STR, 4000);
    $stmt->bindParam(8, $fechaNacimiento, PDO::PARAM_STR, 4000);
    $stmt->bindParam(9, $direccion, PDO::PARAM_STR, 4000);
    $stmt->bindParam(10, $telefono, PDO::PARAM_STR, 4000);
    $stmt -> execute();
    cerrarConexionBD($conexion);
}

function editarMiembro($olddni, $nombre, $email, $fechaNacimiento, $direccion, $telefono){
    require_once (dirname(dirname(dirname(__FILE__)))."\gestionBD.php");
    $parcheTipo = 'afiliado';
    $conexion = crearConexionBD();
    $stmt = $conexion -> prepare("CALL CREAROACTUALIZARMIEMBRO(?,?,to_date(?,'DD/MM/YYYY'),?,?,?,?)");
    $stmt->bindParam(1, $olddni, PDO::PARAM_STR, 4000);
    $stmt->bindParam(2, $nombre, PDO::PARAM_STR, 4000);
    $stmt->bindParam(3, $fechaNacimiento, PDO::PARAM_STR, 4000);
    $stmt->bindParam(4, $email, PDO::PARAM_STR, 4000);
    $stmt->bindParam(5, $direccion, PDO::PARAM_STR, 4000);
    $stmt->bindParam(6, $telefono, PDO::PARAM_STR, 4000);
    $stmt->bindParam(7, $parcheTipo, PDO::PARAM_STR, 4000);
    $stmt -> execute();
    cerrarConexionBD($conexion);
}


function crearEmpleado($dni, $puesto,$fechaInicio,$fechaFin,$directiva, $nombre, $email, $fechaNacimiento, $direccion, $telefono){
    require_once (dirname(dirname(dirname(__FILE__)))."\gestionBD.php");
    $conexion = crearConexionBD();
    $stmt = $conexion -> prepare("CALL CREAR_EMPLEADO(?,?,to_date(?,'DD/MM/YYYY'),to_date(?,'DD/MM/YYYY'),?,?,?,to_date(?,'DD/MM/YYYY'),?,?)");
    $stmt->bindParam(1, $dni, PDO::PARAM_STR, 4000);
    $stmt->bindParam(2, $puesto, PDO::PARAM_STR, 4000);
    $stmt->bindParam(3, $fechaInicio, PDO::PARAM_STR, 4000);
    $stmt->bindParam(4, $fechaFin, PDO::PARAM_STR, 4000);
    $stmt->bindParam(5, $directiva, PDO::PARAM_STR, 4000);
    $stmt->bindParam(6, $nombre, PDO::PARAM_STR, 4000);
    $stmt->bindParam(7, $email, PDO::PARAM_STR, 4000);
    $stmt->bindParam(8, $fechaNacimiento, PDO::PARAM_STR, 4000);
    $stmt->bindParam(9, $direccion, PDO::PARAM_STR, 4000);
    $stmt->bindParam(10, $telefono, PDO::PARAM_STR, 4000);
    $stmt -> execute();
    cerrarConexionBD($conexion);
}

function crearEntrenador($dni, $categoria, $nombre, $email, $fechaNacimiento, $direccion, $telefono){
    require_once (dirname(dirname(dirname(__FILE__)))."\gestionBD.php");
    $conexion = crearConexionBD();
    $stmt = $conexion -> prepare("CALL CREAR_ENTRENADOR(?,?,?,?,to_date(?,'DD/MM/YYYY'),?,?)");
    $stmt->bindParam(1, $dni, PDO::PARAM_STR, 4000);
    $stmt->bindParam(2, $categoria, PDO::PARAM_STR, 4000);
    $stmt->bindParam(3, $nombre, PDO::PARAM_STR, 4000);
    $stmt->bindParam(4, $email, PDO::PARAM_STR, 4000);
    $stmt->bindParam(5, $fechaNacimiento, PDO::PARAM_STR, 4000);
    $stmt->bindParam(6, $direccion, PDO::PARAM_STR, 4000);
    $stmt->bindParam(7, $telefono, PDO::PARAM_STR, 4000);
    $stmt -> execute();
    cerrarConexionBD($conexion);
}

function crearJugador($dni,$categoria, $posicion, $federado, $nombre, $email, $fechaNacimiento, $direccion, $telefono){
    require_once (dirname(dirname(dirname(__FILE__)))."\gestionBD.php");
    $conexion = crearConexionBD();
    $stmt = $conexion -> prepare("CALL CREAR_JUGADOR(?,?,?,?,?,?,to_date(?,'DD/MM/YYYY'),?,?)");
    $stmt->bindParam(1, $dni, PDO::PARAM_STR, 4000);
    $stmt->bindParam(2, $categoria, PDO::PARAM_STR, 4000);
    $stmt->bindParam(3, $posicion, PDO::PARAM_STR, 4000);
    $stmt->bindParam(4, $federado, PDO::PARAM_STR, 4000);
    $stmt->bindParam(5, $nombre, PDO::PARAM_STR, 4000);
    $stmt->bindParam(6, $email, PDO::PARAM_STR, 4000);
    $stmt->bindParam(7, $fechaNacimiento, PDO::PARAM_STR, 4000);
    $stmt->bindParam(8, $direccion, PDO::PARAM_STR, 4000);
    $stmt->bindParam(9, $telefono, PDO::PARAM_STR, 4000);
    $stmt -> execute();
    cerrarConexionBD($conexion);
}

function crearMiembro($dni, $nombre, $email, $fechaNacimiento, $direccion, $telefono){
    require_once (dirname(dirname(dirname(__FILE__)))."\gestionBD.php");
    $parcheTipo = 'afiliado';
    $conexion = crearConexionBD();
    $stmt = $conexion -> prepare("CALL CREAROACTUALIZARMIEMBRO(?,?,to_date(?,'DD/MM/YYYY'),?,?,?,?)");
    $stmt->bindParam(1, $dni, PDO::PARAM_STR, 4000);
    $stmt->bindParam(2, $nombre, PDO::PARAM_STR, 4000);
    $stmt->bindValue(3, $fechaNacimiento, PDO::PARAM_STR);
    $stmt->bindParam(4, $email, PDO::PARAM_STR, 4000);
    $stmt->bindParam(5, $direccion, PDO::PARAM_STR, 4000);
    $stmt->bindParam(6, $telefono, PDO::PARAM_STR, 4000);
    $stmt->bindParam(7, $parcheTipo, PDO::PARAM_STR, 4000);
    $stmt -> execute();
    cerrarConexionBD($conexion);
}

function filtrarMiembrosConUsuario($miembros){
    $res = array();
    $index = 0;
    foreach($miembros as $fila){
        $dni = $fila['DNI'];
        if(existeCuenta($dni) == 'NO'){
            $res[$index]=$fila;
            $index = $index + 1;
        }
    }
    return $res;
}

function crearUsuario($dni,$usuario, $contrasena, $tipoUsuario){
    require_once (dirname(dirname(dirname(__FILE__)))."\gestionBD.php");
    $conexion = crearConexionBD();
    $stmt = $conexion -> prepare("CALL CREARUSUARIO(?,?,?,?)");
    $stmt->bindParam(1, $usuario, PDO::PARAM_STR, 4000);
    $stmt->bindParam(2, $contrasena, PDO::PARAM_STR, 4000);
    $stmt->bindParam(3, $dni, PDO::PARAM_STR, 4000);
    $stmt->bindParam(4, $tipoUsuario, PDO::PARAM_STR, 4000);
    $stmt -> execute();
    cerrarConexionBD($conexion);
}

function editarUsuario($usuario, $contrasena, $tipoUsuario){
    require_once (dirname(dirname(dirname(__FILE__)))."\gestionBD.php");
    $conexion = crearConexionBD();
    $stmt = $conexion -> prepare("CALL EDITAR_USUARIO(?,?,?)");
    $stmt->bindParam(1, $usuario, PDO::PARAM_STR, 4000);
    $stmt->bindParam(2, $contrasena, PDO::PARAM_STR, 4000);
    $stmt->bindParam(3, $tipoUsuario, PDO::PARAM_STR, 4000);
    $stmt -> execute();
    cerrarConexionBD($conexion);
}

function esSesionCorrecta($usuario, $contrasena){
    if(existeCuentaConUsuario($usuario)=='SI'){
        if(coincideUsuarioContrasena($usuario, $contrasena)=='SI'){
            $res = 'correcto';
        } else if (coincideUsuarioContrasena($usuario, $contrasena)=='NO'){
            $res = 'noCoincide';
        } else {
            $res = 'error';
        }
    } else if(existeCuentaConUsuario($usuario)=='NO'){
        $res = 'usuarioNoExiste';
    } else {
        $res = 'error';
    }
    return $res;
}

function existeCuentaConUsuario($usuario){
    if(count(obtenerCuentaConUsuario($usuario)) == 1){
        $res = 'SI';
    } else {
        $res = 'NO';
    }
    return $res;
}

function coincideUsuarioContrasena($usuario, $contrasena){
    $usuario = obtenerCuentaConUsuario($usuario);
    if($contrasena == $usuario[0]['PASSWORD']){
        $res = 'SI';
    } else {
        $res = 'NO';
    }
    return $res;
}



?>