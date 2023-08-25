<?php

    function sortByDate($consultation1, $consultation2) {

        $array1 = getNextDay($consultation1['dia']);
        $array2 = getNextDay($consultation2['dia']);

        $datetime1 = strtotime("22-".$array1["dateNumberMonth"]."-".$array1["dateNumberDay"]);
        $datetime2 = strtotime("22-".$array2["dateNumberMonth"]."-".$array2["dateNumberDay"]);

        return ($datetime1 - $datetime2);
    }

?>