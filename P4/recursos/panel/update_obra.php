<?php
    require("../../db_helper.php");
    $db=db::conexion();
    $date = date("Y-m-d");
    


    if($_FILES['imagen']){
    	
    	$sql_imagen = "SELECT imagen from obras WHERE id=".$_POST['id'];
	    $dir_imagen = $db->query($sql_imagen);

	    $imagen=$dir_imagen->fetch_assoc();

    	$dir_subida = '../../img/';
    	$dir_absoluta = 'img/'.$_FILES['imagen']['name'];
    	$fichero_subido = $dir_subida . basename($_FILES['imagen']['name']);

    	if (move_uploaded_file($_FILES['imagen']['tmp_name'], $fichero_subido)) {
        	unlink("../../".$imagen['imagen']);
	    } else {
	        echo "¡Posible ataque de subida de ficheros!\n";
	        echo $_FILES['imagen']['error'];
	    }
    	
    	
    	$sql = "UPDATE obras SET titulo ='$_POST[titulo]', autor ='$_POST[autor]', fecha='$_POST[fecha]', coleccion='$_POST[coleccion]', imagen = '$dir_absoluta', fuente_imagen = 'Guggenheim Bilbao', descripcion='$_POST[descripcion]', fecha_modificacion='$date',biografia_autor='$_POST[biografia]',web_autor='$_POST[web]' WHERE id=".$_POST['id'];
    }else{

    	$sql = "UPDATE obras SET titulo ='$_POST[titulo]', autor ='$_POST[autor]', fecha='$_POST[fecha]', coleccion='$_POST[coleccion]', fuente_imagen = 'Guggenheim Bilbao', descripcion='$_POST[descripcion]', fecha_modificacion='$date',biografia_autor='$_POST[biografia]',web_autor='$_POST[web]' WHERE id=".$_POST['id'];
    }
   


 
    if ($db->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

?>
