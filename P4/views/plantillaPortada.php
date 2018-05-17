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
    <body>
       
        <!-- Header con el logo e imagen de fondo -->
        <?php
            include 'controladores/menu_controlador.php';
        ?>
        <!-- Contenedor principal -->
        <div id="main">
            <?php 
                include 'recursos/index_sidebar.php';
            ?>
            <!-- Contendor con las obras de index-->
            <div id="obras">
                <!-- 24 cabezas -->
                <?php
                    while($row = $datos->fetch_assoc()){
                        echo "<div class='contenedor_obra'>";    
                        echo "<a href='?obra=".$row['id']."''><img src=".$row['imagen']." alt=".$row['titulo']."></a>";
                        echo "<p>".$row['titulo']."</p>";
                        echo "</div>";  
                    }
                ?>  
            </div>   
        </div>
        <?php
            include 'recursos/footer.php';
        ?>
    </body>
</html>