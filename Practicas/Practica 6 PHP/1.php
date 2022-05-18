<?php
    $vResultado = array(
        array("alejo", "cuello", 1),
        array("dana", "jimenez", 2),
        array("enzo", "piccoli", 3),
    );

    $i = 0;
    while ($i < count($vResultado)){
        echo   "<tr>
                    <td>".$vResultado[$i][0]."</td>
                    <td>".$vResultado[$i][1]."</td>
                    <td>".$vResultado[$i][2]."</td>
                    <td colspan='5'>
                </tr>";
        $i++;
    }
    // mysqli_free_result($vResultado);
    // mysqli_close($link);
?>