<?php
    require_once("models/perfil_model.php");
    
    $coleccion=new coleccion_model();
    $datos=$coleccion->get_coleccion();
    $obras_coleccion = $coleccion->get_obras();

    require("views/plantillaColeccion.php")
?>