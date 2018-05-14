<?php
    require("models/menu_model.php");
    $menu = new menu_model();
    $obras = $menu->get_menu_obras();
    $autores = $menu->get_menu_autores();
    $colecciones = $menu->get_menu_colecciones();
    require("recursos/header.php");
?>