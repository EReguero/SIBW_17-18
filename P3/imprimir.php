<!DOCTYPE html>
<html lang="es">
    <head>
    	<title>Página de Impresión</title>
        <meta charset="utf-8">
        <!-- Favicon de la web-->
        <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
        <!-- Estilo css de la pagina -->
        <link rel="stylesheet" type="text/css" href="../css/style_imprimir.css"/> 
        <!-- Autores de la web --> 
        <meta name="author" content="Emilio,Eric"> 
    </head>
    <!-- Cuerpo con la información a imprimir -->
    <body>
        <?php
            require("db_helper.php");
            require("models/obra_model.php");
            $obra = new obra_model();
            $datos = $obra->get_datos();
            $comentarios = $obra->get_comentarios();
            $palabrasprohibidas = $obra->get_palabrasprohibidas();
        ?>
        <div id="logo">
                <img src="../img/logo.jpg" alt="logo">
        </div>
        <div id="texto_imprimir">     
            <h2><?php echo $datos['titulo']?></h2>
            <h3><?php echo $datos['autor']?></h3>
            <H4><?php echo $datos['fecha']?></H4>
           
            <?php 
            $texto =  $datos['descripcion'];
            $lon = strlen ($texto)/2;

            $p1= substr($texto, 0, $lon);
            $p2 = substr($texto, $lon);

            $p3 = explode(" ", $p2, 2);
            $p1.=$p3[0];
            $p2 = $p3[1];

            ?>
            <p id="left_col">
            <?php echo $p1 ?>   
            </p>

            <p id="right_col">
            <?php echo $p2 ?>
            </p>    


            <img src="../<?php echo $datos['imagen']?>" alt="<?php echo $datos['titulo']?>">
    
        </div>
        <!-- Información de Copyright -->
        <div id="copyright">
            <p>Copyright © Todos los derechos reservados - Sitio web creado por Eric y Emilio</p>
        </div>
    </body>
</html>