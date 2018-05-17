<?php
    require("../../db_helper.php");
    $db=db::conexion();
    $date = date("Y-m-d H-i-s");
    
    	
    	
	$sql = "UPDATE comentario SET comment_text='$_POST[texto]', fecha_edicion='$date', obra_id='$_POST[obra_id]' WHERE id=".$_POST['comentario_id'];;


 
    if ($db->query($sql) === TRUE) {
        echo "Mensaje editado correctamente";
    } else {
        echo "Error updating record: " . $conn->error;
    }

?>
