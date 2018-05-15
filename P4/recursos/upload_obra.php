<?php
    include "db_helper.php";
    
    $bd=db::conexion();

   
    if(isset($_POST["enviar"])) {
        
        $dir_subida = 'img/';
        $fichero_subido = $dir_subida . basename($_FILES['imagen']['name']);

        echo '<pre>';
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $fichero_subido)) {
            echo "El fichero es válido y se subió con éxito.\n";
        } else {
            echo "¡Posible ataque de subida de ficheros!\n";
        }


        /*
        $date = date("Y-m-d");
        
        $sql = "INSERT INTO obras (titulo, autor, fecha, coleccion, imagen, fuente_imagen, descripcion, fecha_creacion, web_autor, biografia_autor)
        VALUES ('$_POST[titulo]','$_POST[autor]','$_POST[fecha]','$_POST[coleccion]','$_POST[imagen]', 'Guggenheim Bilbao','$_POST[descripcion]', '$date','$_POST[biografia]','$_POST[web]')";

        if ($bd->query($sql) === TRUE) {
          /*echo "<script type='text/javascript'>alert('Mensaje enviado correctamente');window.location.href='/?obra=".$_POST['obra']."';</script>";
          echo "Do";
        } else {
           echo "Error: " . $sql . "<br>" . $bd->error;
        }
    }else{
 */
    }
   
?>