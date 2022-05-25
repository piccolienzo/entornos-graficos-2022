<?php 
    session_start(); 
    $carro=$_SESSION['carro']; 
    $products=''; 
    $products2=''; 
    foreach($carro as $k => $v){ 
        $unidad=$v['cantidad']>1?" unidades de ":" unidad de "; 
        $products.=$v['cantidad'].$unidad.$v['producto']." + "; 
        $products2.=$v['cantidad'].$unidad.$v['producto'].", "; 
    } 
    $products=substr($products,0,(strlen($products)-1)); 
    $products2=substr($products2,0,(strlen($products2)-2)); 
?> 
<html> 
    <head> 
        <title>Finalizar Compra</title> 
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
        <style type="text/css"> 
            .tit { 
            font-family: Verdana, Arial, Helvetica, sans-serif; 
            font-size: 9px; 
            color: #FFFFFF; 
            } 
            .prod { 
            font-family: Verdana, Arial, Helvetica, sans-serif; 
            font-size: 9px; 
            color: #333333; 
            } 
            h1 { 
            font-family: Verdana, Arial, Helvetica, sans-serif; 
            font-size: 20px; 
            color: #990000; 
            } 
        </style> 
    </head> 
    
    <body> 
        <form action="7-procesar.php" name="f1" id="f1" method="post"> 
            <table width="100%" border="0" align="center" cellpadding="3" cellspacing="0" 
                bgcolor="#EABB5D" style=" border-color:#000000; border-style:solid;borderwidth:1px;"> 
                <tr> 
                    <td align="left" valign="top">
                        <span class="prod"><strong>Detalle de los Productos Seleccionados</strong>:</span><br> 
                        <span class="texto1negro"> </span><span class="prod"><strong>Productos:</strong> 
                            <?php echo $products; ?><br> 
                            <strong>Pecio Total:</strong> $<?php echo number_format($_GET['costo'],2) ?> 
                        </span>
                    </td> 
                </tr> 
            </table> 
            <input type="submit" name="Submit" value="Enviar"> 
        </form> 
    </body> 
</html>