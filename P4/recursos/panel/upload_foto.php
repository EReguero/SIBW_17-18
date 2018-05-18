<?php
    include "../../db_helper.php";
    
    $bd=db::conexion();
    $message = "No se ha podido subir la imagen.";
   
    if(isset($_POST["enviar"]) && $_FILES['imagen']['size'] != 0) {
        
        $dir_subida = '../../img/';
        $fichero_subido = $dir_subida . basename($_FILES['imagen']['name']);
        $name_image="img/".$_FILES['imagen']['name'];

        echo '<pre>';
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $fichero_subido)) {

        } else {
            echo "¡Posible ataque de subida de ficheros!\n";
            echo $_FILES['imagen']['error'];
        }

        if(!existeFotoEnBD($bd,$_FILES['imagen']['name'])){
           $sql = "INSERT INTO galeria (imagen, obra) VALUES ('$name_image','$_POST[obra]')";
        
            if ($bd->query($sql) === TRUE) {
                $message = "La imagen se ha subido correctamente.";
            } else {
               echo "Error: " . $sql . "<br>" . $bd->error;
            }
        }else{
            $message = "Ya existe esa imagen.";
        }



       
    }else{
         
    }

    echo "<script type='text/javascript'>alert('".$message."'); window.location.href='../../panel.php?editar_imagenes';</script>"; 

    
    function existeFotoEnBD($bd,$name){
        $exist = false;
        $sql_ex = "Select * FROM galeria WHERE imagen= 'img/".$name."'";

        $result = $bd->query($sql_ex);
        $row_cnt = $result->num_rows;
        if($row_cnt > 0){
            $exist=true;
        }

        return $exist;
    }
?>