<?php
    function getQueryArray($result, $field = 'id') {
        if(mysqli_num_rows($result) > 0) {
            $ids = "(";
            while($row = mysqli_fetch_array($result)){
                $ids .= $row["id"].',';
            }
            $ids = substr($ids, 0, -1);
            $ids .= ')';
            
            $query = $field." in ".$ids;
        
            return($query);
        }
        else return('');
    }
?>