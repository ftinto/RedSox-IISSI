<?php

function getObjetoFecha($fecha){
	$dia = getDiaFecha($fecha);
	$mes = getMesFecha($fecha);
	$ano = getAnoFecha($fecha);
	$date = $ano."-".$mes."-".$dia;
	return new DateTime($date);
}

function getDiaFecha($fecha){
	$claves = preg_split("#/#", trim($fecha), null, null);
	return $claves[0];
}

function getMesFecha($fecha){
	$claves = preg_split("#/#", trim($fecha));
	return $claves[1];
}

function getAnoFecha($fecha){
	$claves = preg_split("#/#", trim($fecha));
	return $claves[2];
}

function getStringMes($fecha){
    $claves = preg_split("#/#", trim($fecha));
    $mes = $claves[1];
    if($mes == '01'){
        $stringMes = 'Enero';
    } else if($mes == '02'){
        $stringMes = 'Febrero';
    } else if($mes == '03'){
        $stringMes = 'Marzo';
    } else if($mes == '04'){
        $stringMes = 'Abril';
    } else if($mes == '05'){
        $stringMes = 'Mayo';
    } else if($mes == '06'){
        $stringMes = 'Junio';
    } else if($mes == '07'){
        $stringMes = 'Julio';
    } else if($mes == '08'){
        $stringMes = 'Agosto';
    } else if($mes == '09'){
        $stringMes = 'Septiembre';
    } else if($mes == '10'){
        $stringMes = 'Octubre';
    } else if($mes == '11'){
        $stringMes = 'Noviembre';
    } else if($mes == '12'){
        $stringMes = 'Diciembre';
    }
    return $stringMes;
}

function compararFechas($fecha1, $fecha2){
	$diff =$fecha1 ->diff($fecha2);
	if($diff->invert == 0){
		$res = $diff->days;
	} else{
		$res= -1;
	}
	return $res;
}

function getStringSQLFecha($dia, $mes, $anio){
    if(!($dia=='') && !($mes=='') && !($anio=='')){
        $res = $dia.'/'.$mes.'/'.$anio;
    } else {
        $res = null;
    }
    return $res;
}

function getAniosDesde($fecha){
    $fecha2 = new DateTime('now');
    $diff = $fecha ->diff($fecha2);
    if($diff->invert == 0){
        $res = $diff->y;
    } else{
        $res= -1;
    }
    return $res;
}

function getStringSQLFechaActual(){
    $fecha = new DateTime('now');
    $stringFecha = date_format($fecha, 'd/m/y');
    return $stringFecha;
}

?>