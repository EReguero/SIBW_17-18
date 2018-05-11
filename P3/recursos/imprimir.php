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
            require("../models/obra_model.php");
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
            <H4>Fecha</H4>
            <div id="foto">
                <img src="../<?php echo $datos['imagen']?>" alt="<?php echo $datos['titulo']?>">
                <p><?php echo $datos['titulo']?></p>
            </div>
            <p><?php echo $datos['descripcion']?></p>
        </div>
        <!-- Información de Copyright -->
        <div id="copyright">
            <p>Copyright © Todos los derechos reservados - Sitio web creado por Eric y Emilio</p>
        </div>
    </body>
</html>