<?php
$dni1 = '12443898R';
$dni2 = '25704673B';
$dni3 = '86917931B';
require_once("pagosMiembro.php");
$resultado = obtenerPagosDeMiembro($dni3);
$resultado = ordenarPagosCronologicamente($resultado);
$numeroDePagos =  count($resultado);
foreach ($resultado as $fila){
    echo $fila["FECHALIQUIDACION"];
    echo esPagoLiquidado($fila);
}
?>


<div class="nombreMiembro">José Carreras</div>
<h2 class="tituloSeccionPerfil">Datos Generales</h2>
<div class="seccionPerfil datosGenerales">
    <div class="subSeccionPerfil">
        <div class="contenedorDato">
            <span class="nombreDato">DNI: </span><span> 999999999D</span>
        </div>
        <div class="contenedorDato">
            <span class="nombreDato">Email: </span><span> arrobaes@arrobea.com</span>
        </div>
        <div class="contenedorDato">
            <span class="nombreDato">Tipo Miembro: </span><span> empleado</span>
        </div>
    </div>
    <div class="subSeccionPerfil">
        <div class="contenedorDato">
            <span class="nombreDato">Fecha de Nacimiento: </span><span> 04/10/93</span>
        </div>
        <div class="contenedorDato">
            <span class="nombreDato">Número de Teléfono: </span><span> 999999999</span>
        </div>
        <div class="contenedorDato">
            <span class="nombreDato">Dirección: </span><span> Calle la Calle, 9, Sevilla</span>
        </div>
    </div>
    <div class="subSeccionPerfil">
        <div class="contenedorDato">
            <button class="button">Editar Datos Generales</button>
        </div>
        <div class="contenedorDato">
            <button class="button">Eliminar Miembro</button>
        </div>
    </div>
</div>
<h2 class="tituloSeccionPerfil">Datos Empleado</h2>
<div class="seccionPerfil datosEmpleado">
    <div class="subSeccionPerfil">
        <div class="contenedorDato">
            <span class="nombreDato">Puesto: </span><span> Tesorero</span>
        </div>
        <div class="contenedorDato">
            <span class="nombreDato">Fecha de Inicio: </span><span> 01/01/16</span>
        </div>
        <div class="contenedorDato">
            <span class="nombreDato">ID de Trabajador: </span><span> 043</span>
        </div>
    </div>
    <div class="subSeccionPerfil">
        <div class="contenedorDato">
            <span class="nombreDato">Directiva: </span><span> SÍ</span>
        </div>
        <div class="contenedorDato">
            <span class="nombreDato">Fecha de Fin: </span><span>Todavía Activo</span>
        </div>
    </div>
    <div class="subSeccionPerfil">
        <div class="contenedorDato">
            <button class="button">Editar Datos Empleado</button>
        </div>
        <div class="contenedorDato">
            <button class="button">Eliminar Empleado</button>
        </div>
    </div>
</div>
<h2 class="tituloSeccionPerfil">Datos Entrenador</h2>
<div class="seccionPerfil datosEntrenador">
    <div class="subSeccionPerfil">
        <div class="contenedorDato">
            <span class="nombreDato">Categoría:</span><span> Senior</span>
        </div>
    </div>
    <div class="subSeccionPerfil">
        <div class="contenedorDato">
            <button class="button">Editar Categoría</button>
        </div>
        <div class="contenedorDato">
            <button class="button">Eliminar Entrenador</button>
        </div>
    </div>
</div>
<h2 class="tituloSeccionPerfil">Datos Jugador</h2>
<div class="seccionPerfil datosEmpleado">
    <div class="subSeccionPerfil">
        <div class="contenedorDato">
            <span class="nombreDato">Categoría: </span><span> Senior</span>
        </div>
        <div class="contenedorDato">
            <span class="nombreDato">Posición: </span><span> Catcher</span>
        </div>
        <div class="contenedorDato">
            <span class="nombreDato">Federado: </span><span> SÍ</span>
        </div>
    </div>
    <div class="subSeccionPerfil">
        <div class="contenedorDato">
            <button class="button">Editar Datos Empleado</button>
        </div>
        <div class="contenedorDato">
            <button class="button">Eliminar Empleado</button>
        </div>
    </div>
</div>
<h2 class="tituloSeccionPerfil">Cuenta</h2>
<div class="seccionPerfil cuenta">
    <div class="subSeccionPerfil">
        <div class="contenedorDato">
            <span class="nombreDato">Nombre de la Cuenta: </span><span> Josecar</span>
        </div>
        <div class="contenedorDato">
            <span class="nombreDato">Tipo de Cuenta: </span><span> Tesorero</span>
        </div>
    </div>
    <div class="subSeccionPerfil">
        <div class="contenedorDato">
            <button class="button">Editar Cuenta</button>
        </div>
        <div class="contenedorDato">
            <button class="button">Eliminar Cuenta</button>
        </div>
    </div>
</div>
<h2 class="tituloSeccionPerfil">Otros</h2>
<div class="seccionPerfil otraInformacion">
    <div class="subSeccionPerfil">
        <div class="contenedorDato">
            <button class="button">Ver Pagos</button>
        </div>
    </div>
    <div class="subSeccionPerfil">
        <div class="contenedorDato">
            <button class="button">Ver Solicitudes</button>
        </div>
    </div>
</div>



<?php if(existeEntrenador($dniMiembro)=='NO'){ ?>
    <p class="mensajeOperacion">Este miembro no es un entrenador.</p>
    <button class="button">Convertir a Entrenador</button>
<?php } else if(existeEntrenador($dniMiembro)=='SI'){
    $infoEmpleado = obtenerEmpleado($dniMiembro) ?>
<?php } ?>




