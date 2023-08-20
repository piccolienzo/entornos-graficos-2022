<?php
    $numeros = "01234567890";
    $letras = "  abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZáéíóúÁÉÍÓÚ";
    $numerosYLetras = $numeros.$letras;

    function contiene($cadena, $caracteresValidos) {
        for($i = 0; $i < strlen($cadena); $i++) {
            if(strpos($caracteresValidos,substr($cadena,$i,1)) == false) {
                return false;
            }
        }
        return true;
    }
?>