<?php
    include "../../db_helper.php";
    
    $bd=db::conexion();

   
    if(isset($_POST["enviar"])) {
        
        $dir_subida = '../../img/';
        $fichero_subido = $dir_subida . basename($_FILES['imagen']['name']);
        $name_image="img/".$_FILES['imagen']['name'];

        echo '<pre>';
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $fichero_subido)) {

        } else {
            echo "¡Posible ataque de subida de ficheros!\n";
            echo $_FILES['imagen']['error'];
        }

        $sql = "INSERT INTO galeria (imagen, obra) VALUES ('$name_image','$_POST[obra]')";

        if ($bd->query($sql) === TRUE) {
           echo "<script type='text/javascript'>alert('Imagen añadida correctamente'); window.location.href='../../panel.php?editar_imagenes';</script>";   
        } else {
           echo "Error: " . $sql . "<br>" . $bd->error;
        }
    }
?>