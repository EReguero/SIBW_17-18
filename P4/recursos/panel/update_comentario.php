<?php
    require("../../db_helper.php");
    $db=db::conexion();
    $date = date("Y-m-d H-i-s");
    
    if($_POST['enviar']){	

        
        if(!isset($_POST['nueva_coleccion'])){
    	   $obra=$_POST['obra_old'];
        }else{
            $obra=$_POST['nueva_coleccion'][0];
        }


        $sql = "UPDATE comentario SET comment_text='$_POST[texto]', fecha_edicion='$date', obra_id='$obra' WHERE id=".$_POST['comentario_id'];;


     
        if ($db->query($sql) === TRUE) {
          echo "<script type='text/javascript'>alert('Comentario actualizado correctamente.'); window.location.href='../../panel.php?buscar_comentario';</script>";  
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

?>
