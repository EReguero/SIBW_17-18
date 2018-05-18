<!DOCTYPE html>
<html>
    <head>
        <!-- Titulo de la pestaña-->
        <title>Guggenheim Bilbao</title>
        <meta charset="utf-8">
        <!-- Palabras clave para el buscador-->   
        <meta name="keywords" content="Museo, Guggenheim, Bilbao, arte">
        <!-- Descripcion de la web -->
        <meta name="description" content="Página Web del Museo Guggenheim Bilbao">
        <!-- Autores de la web -->
        <meta name="author" content="Emilio, Eric">
        <!-- Favicon de la web-->
        <link rel="icon" href="img/favicon.ico" type="image/x-icon">
        <!-- Estilo css de la pagina -->
        <link rel="stylesheet" type="text/css" href="css/style.css"/> 
           <script src="js/funciones.js"></script>
    </head>

   </body>
        
        <?php
            include 'controladores/menu_controlador.php';
        ?>
        <div id=main>
           <?php include ($page_select.'.php'); ?>
        </div>
           <?php include 'recursos/footer.php';
        ?>
        </div>
    </body>
</html>