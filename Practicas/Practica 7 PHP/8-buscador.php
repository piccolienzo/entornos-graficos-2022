<!DOCTYPE html PUBLIC "‐//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1‐transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http‐equiv="Content‐Type" content="text/html; charset=utf‐8" />
        <title>Buscador</title>
    </head>
    <body>
        <?php
            include("conexion.inc");
            $pal = $_POST['palabra'];
            $resp = mysqli_query($link, "select * from buscador where canciones LIKE '%".$pal."%'") or die(mysqli_error($link));
            if(mysqli_num_rows($resp) == "0") {
                echo "No hay resultados respecto a la palabra que busca.";
            } else {
                echo "
                    <center>
                        <strong>RESULTADOS DE BUSQUEDA</strong>
                    </center>
                    <br>";
                while($cat = mysqli_fetch_array($resp)) { ?>
                    <td> <?php echo ($cat['canciones']); 
        ?>
            </td>            
        </tr>    
        <tr>
            <td colspan="5">
            <?php } }
                echo "
                    <p>
                        <a href='8-form-buscador.html'>Volver al Buscador de Canciones</a>
                    </p>  
                "
            ?>
    </body>
</html>