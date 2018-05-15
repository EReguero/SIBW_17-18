<?php
    include "db_helper.php";
    
    $bd=db::conexion();

   
    if(isset($_POST["enviar"])) {
        
        
        $sql = "INSERT INTO colecciones (nombre)
        VALUES ('$_POST[titulo]')";

        if ($bd->query($sql) === TRUE) {
            $sql_id = "SELECT id FROM colecciones WHERE nombre= '$_POST[titulo]'";
            $result = $bd->query($sql_id);
            $row = $result->fetch_assoc();
          echo "<script type='text/javascript'>alert('Obra añadida correctamente');window.open(href='/?coleccion=".$row['id']."', '_blank'); window.location.href='panel.php?anadir_coleccion';</script>";
          echo "Do";
        } else {
           echo "Error: " . $sql . "<br>" . $bd->error;
        }
    }else{

    }
   
?>