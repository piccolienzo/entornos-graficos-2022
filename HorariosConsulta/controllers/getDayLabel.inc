<?php
    $dayNumber = date('w', strtotime($date));
    $weekdays = array(
        0 => "DOMINGO",
        1 => "LUNES",
        2 => "MARTES",
        3 => "MIÉRCOLES",
        4 => "JUEVES",
        5 => "VIERNES",
        6 => "SABADO"
    );
    $dayLabel = $weekdays[$dayNumber];
?>