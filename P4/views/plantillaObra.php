    <!DOCTYPE html>
<html>
    <head>
        <!-- Titulo de la pestaña -->
        <title>Guggenheim Bilbao - 24 Cabezas</title>
         <meta charset="utf-8">
        <!-- Palabras clave para el buscador--> 
        <meta name="keywords" content="Museo, Guggenheim, Bilbao, 24, cabezas, antonio, saura">
        <!-- Autores de la web -->
        <meta name="author" content="Emilio, Eric">
        <!-- Favicon de la web-->
        <link rel="icon" href="img/favicon.ico" type="image/x-icon">
        <!-- Estilo css de la pagina -->
        <link rel="stylesheet" type="text/css" href="css/style.css"/> 
        <!-- Linkeado Javascript-->
        <script src="js/funciones.js"></script>

    </head>
    <body>
        <?php
            include 'controladores/menu_controlador.php';
        ?>
        <div id="main">
            <!-- Enlaces laterales auxiliares -->
            <aside id="aux"> 
                <a target="_blank" href="<?php echo $datos['biografia_autor']; ?>"> 
                    <div id="biografia">
                       <p>Biografia de <?php echo $datos['autor']; ?></p>
                    </div>
                </a>
                <a target="_blank" href="<?php echo $datos['web_autor']; ?>">
                    <div id="web">
                       <p>Página web de <?php echo $datos['autor']; ?></p>
                    </div>
                </a>

            </aside>
            <?php
                include('views/obra.php');
            ?>
            <!-- Insertar Comentario -->
            <?php 
                include('recursos/comentarios.php'); 
            ?>
            <div id="botonessociales">
               
                <!-- Botón de pagina para imprimir -->
                <a target="_blank" href="imprimir.php?obra=<?php echo $datos['id']?>">
                    <img src="../img/print_button.jpg" alt="Boton imprimir">
                </a>

                <!-- Botón de Twitter -->
                <img src="img/twitter_button.png" alt="Boton twitter" onclick="window_open('<?php echo $datos['titulo'] ?>','<?php echo $datos['imagen']?>','Twitter');">
                <!-- Botón de Facebook -->
              
                <img src="../img/facebook_button.png" alt="Boton facebook" onclick="window_open('<?php echo $datos['titulo'] ?>','<?php echo $datos['imagen']?>','Facebook');">
            </div>  
        </div>
        <?php
            include 'recursos/footer.php';
        ?>
    </body>
</html>
    