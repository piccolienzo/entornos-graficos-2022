<?php
    session_start();
?>
<html>
    <body>
        <a href="4-cuenta.php"></a>
        <?php
            if (!isset($_SESSION["contador"])){
                $_SESSION["contador"] = 1;
            }else{
                $_SESSION["contador"]++;
            }
            echo "Has visitado " . $_SESSION["contador"] . " páginas";
        ?>
        <br>
        <a href="4-cuenta.php">Otra página</a>
    </body>
</html>