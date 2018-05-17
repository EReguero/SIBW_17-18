    <!DOCTYPE html>
<html>
    <head>
        <!-- Titulo de la pestaña -->
        <title>Error</title>
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
            <h1>Error: La obra no existe.</h1>
        </div>
        <?php
            include 'recursos/footer.php';
        ?>
    </body>
</html>
    