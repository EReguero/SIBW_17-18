<?php
	require("models/obra_model.php");
	$obra = new obra_model();
	
	if($obra->existe_obra()){
		$datos = $obra->get_datos();
		$comentarios = $obra->get_comentarios();
		$palabrasprohibidas = $obra->get_palabrasprohibidas();
		require("views/plantillaObra.php");
	}else{
		require("views/errorObra.php");
	}
?>