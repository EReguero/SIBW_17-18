<?php

	session_start();

	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
		if($_SESSION['privilegios'] == "comentarista"){
			echo "No tienes privilegios";
			exit;
		}
	} else {
	   echo "Esta pagina es solo para usuarios registrados.<br>";
	   echo "<br><a href='login.php'>Login</a>";
	   echo "<br><br><a href='registrer.php'>Registrarme</a>";
	   exit;
	}
	
	$now = time();

	if($now > $_SESSION['expire'])
	session_destroy();

	include "db_helper.php";
	require("models/panel_model.php");
	$panel = new panel_model();
	$menu = $panel->get_menu();
	require("views/panelcontrol.php");
?>
