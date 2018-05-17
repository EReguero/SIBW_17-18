<?php
	require("models/obra_model.php");
	
	$_GET['obra'] = $_GET['imprimir'];
	$obra = new obra_model();
	$datos = $obra->get_datos();

    $texto =  $datos['descripcion'];
    $lon = strlen ($texto)/2;

    $p1= substr($texto, 0, $lon);
    $p2 = substr($texto, $lon);

    $p3 = explode(" ", $p2, 2);
    $p1.=$p3[0];
    $p2 = $p3[1];

	require("views/imprimir.php");
?>