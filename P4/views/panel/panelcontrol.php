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
        <link rel="stylesheet" type="text/css" href="css/style_panel.css"/>
        <script src="js/funciones_panel.js"></script>

    </head>
    <body>
        <!-- Header con el logo e imagen de fondo -->
        <header id="logo">
            <img src="../img/logo.jpg" alt="logo">
            <h1>Guggenheim Bilbao</h1>
            <h2>Panel de Control</h2>
        </header>
        <!-- Contenedor principal del panel de control -->
        <div id="panel">
            <div id="informacion">
                <div id="leftbox">  
                    <p>Bienvenido <?php echo $_SESSION['username']?>.</p>
                    <a href="logout.php"> (Logout) </a>
                </div>
                <div id="rightbox">
                   <p> <a href="/">Salir del panel de control.</a></p>
                </div>
            </div>
            <div id="menu">
                <ul>
                <?php
                    while($row = $menu->fetch_assoc()){
                        ?><li><a href='<?php echo $row['src'] ?>'><?php echo $row['nombre'] ?></a></li>
                    <?php }?>
                </ul>
                
            </div>
            <div id="main">
                <?php 
                   if(count($_GET) == 0) {
                    
                    }else{
                        include ("views/panel/".key($_GET).".php");
                    }
                ?>
            </div>
        </div>
    </body>
</html>