<?php
    
    function getAmOrPm($hour) {
    
        $am = array(
            "00" => "00"
            ,"01" => "01"
            ,"02" => "02"
            ,"03" => "03"
            ,"04" => "04"
            ,"05" => "05"
            ,"06" => "06"
            ,"07" => "07"
            ,"08" => "08"
            ,"09" => "09"
            ,"10" => "10"
            ,"11" => "11"
        );
        $pm = array(
            "12" => "12"
            ,"13" => "13"
            ,"14" => "14"
            ,"15" => "15"
            ,"16" => "16"
            ,"17" => "17"
            ,"18" => "18"
            ,"19" => "19"
            ,"20" => "20"
            ,"21" => "21"
            ,"22" => "22"
            ,"23" => "23"
        );
        if(in_array(substr($hour,0,2),$am)) {
            return 'a.m';
        }
        else {
            return '';
        }
    }
?>