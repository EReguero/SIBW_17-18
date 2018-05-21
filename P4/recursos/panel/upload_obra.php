<?php
    include ("../../db_helper.php");
    
    $bd=db::conexion();

   
    if(isset($_POST["enviar"])) {
        
        $dir_subida = '../../img/';
        $fichero_subido = $dir_subida . basename($_FILES['imagen']['name']);
        $name_image="img/".$_FILES['imagen']['name'];

        echo '<pre>';
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $fichero_subido)) {
            echo "El fichero es válido y se subió con éxito.\n";
        } else {
            echo "¡Posible ataque de subida de ficheros!\n";
            echo $_FILES['imagen']['error'];
        }

        $date = date("Y-m-d");
        $descripcion = addslashes($_POST['descripcion']);

        $sql = "INSERT INTO obras (titulo, autor, fecha, coleccion, imagen, fuente_imagen, descripcion, fecha_creacion, web_autor, biografia_autor)
        VALUES ('$_POST[titulo]','$_POST[autor]','$_POST[fecha]','$_POST[coleccion]','$name_image', '$_POST[fuente]' ,'$descripcion', '$date','$_POST[biografia]','$_POST[web]')";

        if ($bd->query($sql) === TRUE) {
            $sql_id = "SELECT id FROM obras WHERE titulo= '$_POST[titulo]'";
            $result = $bd->query($sql_id);
            $row = $result->fetch_assoc();
          echo "<script type='text/javascript'>alert('Obra añadida correctamente');window.open(href='/?obra=".$row['id']."', '_blank'); window.location.href='../../panel.php?anadir_obra';</script>";
          echo "Do";
        } else {
           echo "Error: " . $sql . "<br>" . $bd->error;
        }
    }else{

    }
   
?>