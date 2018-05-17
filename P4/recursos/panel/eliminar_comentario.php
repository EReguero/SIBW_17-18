<?php
    require("../../db_helper.php");
    $db=db::conexion();
    $id = $_POST["id"];
    
    if(is_numeric($id) && $id > 0 && existeComentario($id, $db)){
	    
	    $sql_comments = "DELETE FROM comentario WHERE id=".$id;

	    if ($db->query($sql_comments)) {
	       echo "<script type='text/javascript'>alert('El comentario se ha borrado correctamente');window.location.href='../../panel.php?buscar_comentario';</script>"; 
	    } else {
	        echo "Error updating record: " . $conn->error;
	    }
	}else{
		echo "<script type='text/javascript'>alert('El comentario que ha intentado eliminar no existe.');window.location.href='../../panel.php?buscar_comentario';</script>";
	}


	function existeComentario($id, $db){
		$exist = false;
		$sql = "SELECT * FROM comentario WHERE id=".$id;

		$result = $db->query($sql);
		$row_cnt = $result->num_rows;
		if($row_cnt > 0){
		 	$exist=true;
		}

		return $exist;
	}
?>
