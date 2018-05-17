<?php
    require("../../db_helper.php");
    $db=db::conexion();
    $id = $_POST["id"];

    echo $id;
    if(is_numeric($id) && $id > 0 && existeObra($id, $db)){
	    
	    $sql_comments = "DELETE FROM comentario WHERE obra_id=".$id;
	   
	    $sql = "DELETE FROM obras WHERE id=".$id;
	    
	    $sql_imagen = "SELECT imagen from obras WHERE id=".$id;
	    $dir_imagen = $db->query($sql_imagen);
	    $dir="../../";
	    $imagen=$dir_imagen->fetch_assoc();

	    if ($db->query($sql_comments) === TRUE && $db->query($sql) === TRUE && unlink($dir.$imagen['imagen'])) {
	       echo "<script type='text/javascript'>alert('La obra y los comentarios se han eliminado correctamente.');window.location.href='../../panel.php?buscar_obra';</script>"; 
	    } else {
	        echo "Error updating record: " . $conn->error;
	    }
	}else{
		echo "<script type='text/javascript'>alert('La obra que se ha intentando eliminar no existe.');window.location.href='http://localhost/panel.php?buscar_obra';</script>";
	}


	function existeObra($id, $db){
		$exist = false;
		$sql = "Select * FROM obras WHERE id=".$id;

		$result = $db->query($sql);
		$row_cnt = $result->num_rows;
		if($row_cnt > 0){
		 	$exist=true;
		}

		return $exist;
	}
?>
