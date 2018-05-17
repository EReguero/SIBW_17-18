<?php
    require("../../db_helper.php");
    $db=db::conexion();
    $id = $_POST["id"];
    
    if(is_numeric($id) && $id > 0 && existeColeccion($id, $db)){
	    if(coleccionVacia($id,$db)){
		    $sql_comments = "DELETE FROM colecciones WHERE id=".$id;

		    if ($db->query($sql_comments)) {
		       echo "<script type='text/javascript'>alert('La coleccion se ha borrado correctamente');window.location.href='../../panel.php?buscar_coleccion';</script>"; 
		    } else {
		        echo "Error updating record: " . $conn->error;
		    }
		}else{
			echo "<script type='text/javascript'>alert('Para eliminar una colección debe estar vacia, por favor editela antes de eliminar.');window.location.href='../../panel.php?editar_coleccion=".$id."';</script>";
		}
	}else{
		echo "<script type='text/javascript'>alert('La coleccion que ha intentado eliminar no existe o no ha sido posible eliminarla.');window.location.href='../../panel.php?buscar_coleccion';</script>";
	}


	function existeColeccion($id, $db){
		$exist = false;
		$sql = "SELECT * FROM colecciones WHERE id=".$id;

		$result = $db->query($sql);
		$row_cnt = $result->num_rows;
		if($row_cnt > 0){
		 	$exist=true;
		}

		return $exist;
	}

	function coleccionVacia($id, $db){
		$vacia=false;
		$sql = "SELECT id FROM obras WHERE coleccion=".$id;
		$result = $db->query($sql);
		$row_cnt = $result->num_rows;
		if($row_cnt === 0){
		 	$vacia=true;
		}

		return $vacia;

	}
?>
