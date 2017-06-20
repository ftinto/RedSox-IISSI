<?php

function esInputLongitudMaxima($input, $intLongitudMaxima){
    $length = strlen(utf8_decode($input));
    if($length > $intLongitudMaxima){
        $res = 'NO';
    } else {
        $res = 'SI';
    }
    return $res;
}
?>