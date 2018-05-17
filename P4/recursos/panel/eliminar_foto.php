<?php
    require("../../db_helper.php");
    $db=db::conexion();
    $imagen = $_POST["imagen"];
    $message ="No se ha podido realizar la acción";
    
    if(existeFoto($imagen, $db)){
            $sql = "DELETE FROM galeria WHERE imagen='".$imagen."'" ;

            if ($db->query($sql) && unlink("../../".$imagen)) {
                $message ='La imagen se ha borrado correctamente.';
            } else {
                echo "Error updating record: " . $conn->error;
                $message ='No se ha podido eliminar la imagen del servidor.';
            }
    }else{
       $message ='La imagen no existe.';
    }
   
    echo "<script type='text/javascript'>alert('$message');window.location.href='../../panel.php?editar_imagenes';</script>";

    function existeFoto($imagen, $db){
        $exist = false;
        $sql = "SELECT * FROM galeria WHERE imagen='".$imagen."'";
        $result = $db->query($sql);
        if (!$result) {
            trigger_error('Invalid query: ' . $db->error);
        }
        $row_cnt = $result->num_rows;
        if($row_cnt == 1){
            $exist=true;
        }

        return $exist;
    }
?>
