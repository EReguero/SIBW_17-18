<?php
    include "db_helper.php";
    require("models/panel_model.php");
    $panel = new panel_model();
    $menu = $panel->get_menu();
   
    require("views/panelcontrol.php");
?>