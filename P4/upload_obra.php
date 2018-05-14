<?php
    include "db_helper.php";
    
    $bd=db::conexion();

    if(isset($_POST["enviar"])) {
        
        $target_dir = "img/";
        $target_file = $target_dir . basename($_FILES["imagen"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
    
        $check = getimagesize($_FILES["imagen"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        
        $date = date("Y-m-d");
        $sql = "INSERT INTO obras (titulo, autor, fecha, coleccion, imagen, fuente_imagen, descripcion, fecha_creacion, web_autor, biografia_autor)
        VALUES ('$_POST[titulo]','$_POST[autor]','$_POST[fecha]','$_POST[coleccion]','$_POST[imagen]', 'Guggenheim Bilbao','$_POST[descripcion]', '$date','$_POST[biografia]','$_POST[web]')";

      if ($bd->query($sql) === TRUE) {
          echo "<script type='text/javascript'>alert('Mensaje enviado correctamente');window.location.href='/?obra=".$_POST['obra']."';</script>";
        } else {
           echo "Error: " . $sql . "<br>" . $bd->error;
        }
    }else{

    }
?>