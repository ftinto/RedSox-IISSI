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

function compararFechas($fecha1, $fecha2){
	$diff =$fecha1 ->diff($fecha2);
	$res;
	if($diff->invert == 0){
		$res = $diff->days;
	} else{
		$res= -1;
	}
	return $res;
}

?>