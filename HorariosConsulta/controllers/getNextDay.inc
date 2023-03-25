<?php
    date_default_timezone_set('America/Argentina/Buenos_Aires');

    function getNextDay($dayLabel) {
        $todayDate = date('y-m-d');
        $weekdays = array(
            0 => "DOMINGO",
            1 => "LUNES",
            2 => "MARTES",
            3 => "MIÉRCOLES",
            4 => "JUEVES",
            5 => "VIERNES",
            6 => "SABADO"
        );
        
        $getDay = false;
        $dateNumber;
        $dateNumberDay;
        $dateNumberMonth;
        
        $i = 0;

        while($i <= 6 && $getDay == false) {
            $label = "+".$i." days";
            $dayNumber = date('w', strtotime($todayDate. $label));
            $currentDayLabel = $weekdays[$dayNumber];
            if($currentDayLabel == $dayLabel) {
                $getDay = true;
                $dateNumberDay = date('d', strtotime($todayDate. $label));
                $dateNumberMonth = date('m', strtotime($todayDate. $label));
            }
            $i++;
        }

        $months = array(
            1 => "Enero",
            2 => "Febrero",
            3 => "Marzo",
            4 => "Abril",
            5 => "Mayo",
            6 => "Junio",
            7 => "Julio",
            8 => "Agosto",
            9 => "Septiembre",
            10 => "Octubre",
            11 => "Noviembre",
            12 => "Diciembre"
        );

        $dateNumberMonth = str_replace("0","",$dateNumberMonth);

        return (
            array(
                "label" => ($dateNumberDay." de ".$months[$dateNumberMonth]),
                "dateNumberDay" => $dateNumberDay,
                "dateNumberMonth" => $dateNumberMonth
            )
        );
    }
?>