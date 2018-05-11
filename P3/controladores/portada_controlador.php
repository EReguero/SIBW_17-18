 <?php
    require_once("models/portada_model.php");
    $portada=new portada_model();
    $datos=$portada->get_datos();
    require("views/plantillaPortada.php");
?>