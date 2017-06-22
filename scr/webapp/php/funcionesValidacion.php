<?php

function esInputLongitudMaxima($input, $intLongitudMaxima)
{
    $length = strlen(utf8_decode($input));
    if ($length > $intLongitudMaxima) {
        $res = 'NO';
    } else {
        $res = 'SI';
    }
    return $res;
}

function esInputNumeroMayorQue($input, $numero)
{
    if(esInputTodoNumerico($input) == 'SI'){
        if ($input > $numero) {
            $res = 'SI';
        } else {
            $res = 'NO';
        }
    } else {
        $res = 'NO';
    }
    return $res;
}

function esInputPerteneceArray($input, $array){
    if(in_array($input,$array)){
        $res = 'SI';
    } else {
        $res = 'NO';
    }
    return $res;
}


function esInputTodoNumerico($input)
{
    $booleano = ctype_digit($input);
    if ($booleano == true) {
        $res = 'SI';
    } else if ($booleano == false) {
        $res = 'NO';
    }
    return $res;

}

function esInputTodoAlfabetico($input)
{
    $input = chop($input, "ñ");

    $input = chop($input, "á");
    $input = chop($input, "é");

    $input = chop($input, "í");
    $input = chop($input, "ó");

    $input = chop($input, "ú");
    $input = chop($input, "à");

    $input = chop($input, "è");
    $input = chop($input, "ì");

    $input = chop($input, "ò");
    $input = chop($input, "ù");

    $input = chop($input, "â");
    $input = chop($input, "ê");

    $input = chop($input, "î");
    $input = chop($input, "ò");

    $input = chop($input, "û");

    $input = chop($input, "ä");
    $input = chop($input, "ë");

    $input = chop($input, "ï");
    $input = chop($input, "ö");

    $input = chop($input, "ü");
    $input = chop($input, "ç");

    $input = $input . 'a';


    $booleano = ctype_alpha($input);
    if ($booleano == true) {
        $res = 'SI';
    } else if ($booleano == false) {
        $res = 'NO';
    }
    return $res;

}

function esInputTodoAlfanumerico($input)
{

    $input = chop($input, "ñ");

    $input = chop($input, "á");
    $input = chop($input, "é");

    $input = chop($input, "í");
    $input = chop($input, "ó");

    $input = chop($input, "ú");
    $input = chop($input, "à");

    $input = chop($input, "è");
    $input = chop($input, "ì");

    $input = chop($input, "ò");
    $input = chop($input, "ù");

    $input = chop($input, "â");
    $input = chop($input, "ê");

    $input = chop($input, "î");
    $input = chop($input, "ò");

    $input = chop($input, "û");

    $input = chop($input, "ä");
    $input = chop($input, "ë");

    $input = chop($input, "ï");
    $input = chop($input, "ö");

    $input = chop($input, "ü");
    $input = chop($input, "ç");

    $input = $input . 'a';
    $booleano = ctype_alnum($input);
    if ($booleano == true) {
        $res = 'SI';
    } else if ($booleano == false) {
        $res = 'NO';
    }
    return $res;

}

function esInputLongitudExacta($input, $intLongitudExacta)
{
    $length = strlen(utf8_decode($input));
    if ($length == $intLongitudExacta) {
        $res = 'SI';
    } else {
        $res = 'NO';
    }
    return $res;

}

function esInputLongitudMinima($input, $intLongitudMinima)
{
    $length = strlen(utf8_decode($input));
    if ($length < $intLongitudMinima) {
        $res = 'NO';
    } else {
        $res = 'SI';
    }
    return $res;

}

function esInputCategoriaValida($input)
{
    if (($input == 'senior') || ($input == 'sub-21') || ($input == 'sub-19')) {
        $res = 'SI';
    } else {
        $res = 'NO';
    }
    return $res;

}

function esInputEmailValido($input)
{
    if (strpos($input, '@') != false) {
        $claves = preg_split("#@#", trim($input), null, null);
        if (strpos($claves[1], '.') != false) {
            $claves2 = preg_split('/[.]/', trim($claves[1]), null, null);
            if ((esInputLongitudMinima($claves[0], 1) == 'SI') && (esInputLongitudMinima($claves2[0], 1) == 'SI') && (esInputLongitudMinima($claves2[1], 1) == 'SI')) {
                $res = 'SI';
            } else {
                $res = 'NO';

            }
        } else {
            $res = 'NO';
        }

    } else {
        $res = 'NO';
    }

    return $res;

}

function esInputTelefonoValido($input)
{
    if ((esInputTodoNumerico($input) == 'SI') && (esInputLongitudMinima($input, 6) == 'SI') && (esInputLongitudMaxima($input, 11) == 'SI')) {
        $res = 'SI';
    } else {
        $res = 'NO';
    }
    return $res;
}

function esInputContraseniaValida($input)
{
    if ((esInputTodoAlfanumerico($input) == 'SI') && (esInputLongitudMinima($input, 8) == 'SI') && (esInputLongitudMaxima($input, 30) == 'SI')) {
        $res = 'SI';
    } else {
        $res = 'NO';
    }
    return $res;
}

function esInputUsuarioValido($input)
{
    require_once('phpAdmin/Miembros/operacionesMiembros.php');
    if ((existeCuentaConUsuario($input) == 'NO') && (esInputTodoAlfanumerico($input) == 'SI') && (esInputLongitudMinima($input, 1) == 'SI') && (esInputLongitudMaxima($input, 20) == 'SI')) {
        $res = 'SI';

    } else {
        $res = 'NO';
    }
    return $res;
}

function esInputDniNieValido($input)
{
    if (esInputLongitudMaxima($input, 10) == 'SI') {
        if (strlen($input) < 9) {
            return "NO";
        }

        $dni = strtoupper($input);

        $letra = substr($input, -1, 1);
        $numero = substr($input, 0, 8);

        // Si es un NIE hay que cambiar la primera letra por 0, 1 ó 2 dependiendo de si es X, Y o Z.
        $numero = str_replace(array('X', 'Y', 'Z'), array(0, 1, 2), $numero);

        $modulo = $numero % 23;
        $letras_validas = "TRWAGMYFPDXBNJZSQVHLCKE";
        $letra_correcta = substr($letras_validas, $modulo, 1);


        if ($letra_correcta != $letra) {
            return "Letra incorrecta, la letra deber&iacute;a ser la $letra_correcta.";
        } else {
            return "SI";
        }
    } else {
        return 'NO';
    }
}

function esInputFechaValida($dia, $mes, $anio)
{
    if ((esInputDiaValido($dia) == 'SI') && (esInputMesValido($mes) == 'SI') && (esInputAnioValido($anio))) {
        if (($mes == 1) || ($mes == 3) || ($mes == 5) || ($mes == 7) || ($mes == 8) || ($mes == 10) || ($mes == 12)) {
            if ($dia > 31) {
                $res = 'NO';
            } else {
                $res = 'SI';
            }
        } else if ($mes == 2) {
            if (($anio % 4) == 0) {
                if ($dia > 29) {
                    $res = 'NO';
                } else {
                    $res = 'SI';
                }
            } else {
                if ($dia > 28) {
                    $res = 'NO';
                } else {
                    $res = 'SI';
                }
            }
        } else {
            if ($dia > 30) {
                $res = 'NO';
            } else {
                $res = 'SI';
            }
        }
    } else {
        $res = 'NO';
    }
    return $res;
}

function esInputDiaValido($input)
{
    if ((esInputTodoNumerico($input)) && ($input > 0) && ($input <= 31) && (esInputLongitudExacta($input, 2) == 'SI')) {
        $res = 'SI';
    } else {
        $res = 'NO';
    }
    return $res;
}

function esInputMesValido($input)
{
    if ((esInputTodoNumerico($input)) && ($input > 0) && ($input <= 12) && (esInputLongitudExacta($input, 2) == 'SI')) {
        $res = 'SI';
    } else {
        $res = 'NO';
    }
    return $res;
}

function esInputAnioValido($input)
{
    if ((esInputTodoNumerico($input)) && ($input > 0) && ($input <= 2500) && (esInputLongitudExacta($input, 4) == 'SI')) {
        $res = 'SI';
    } else {
        $res = 'NO';
    }
    return $res;
}

function esInputFechaAnterior($fecha1,$fecha2)
{
    require_once ('funcionesTipos/funcionesFechas.php');
    $fecha1 = getObjetoFecha($fecha1);
    $fecha2 = getObjetoFecha($fecha2);
    $resultado = compararFechas($fecha1, $fecha2);
    if ($resultado > 0) {
        $res = 'SI';
    } else {
        $res = 'NO';
    }
    return $res;
}

function esInputFechaPosterior($fecha1,$fecha2)
{
    require_once ('funcionesTipos/funcionesFechas.php');
    $fecha1 = getObjetoFecha($fecha1);
    $fecha2 = getObjetoFecha($fecha2);
    $resultado = compararFechas($fecha1, $fecha2);
    if ($resultado == -1) {
        $res = 'SI';
    } else {
        $res = 'NO';
    }
    return $res;
}

function esInputFechaIgual($fecha1,$fecha2)
{
    require_once ('funcionesTipos/funcionesFechas.php');
    $fecha1 = getObjetoFecha($fecha1);
    $fecha2 = getObjetoFecha($fecha2);
    $resultado = compararFechas($fecha1, $fecha2);
    if ($resultado == 0) {
        $res = 'SI';
    } else {
        $res = 'NO';
    }
    return $res;
}

?>
