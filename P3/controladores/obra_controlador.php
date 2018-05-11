<?php
	require("models/obra_model.php");
	$obra = new obra_model();
	$datos = $obra->get_datos();
	$comentarios = $obra->get_comentarios();
	$palabrasprohibidas = $obra->get_palabrasprohibidas();

	require("views/plantillaObra.php")
?>