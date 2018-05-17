<?php

	session_start();

	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
		if($_SESSION['privilegios'] == 1){
			echo "No tienes privilegios";
			exit;
		}
	} else {
	  
	  header("Location: /");
	   exit;
	}
	
	$now = time();

	if($now > $_SESSION['expire'])
	session_destroy();

	include "db_helper.php";
	require("models/panel_model.php");
	$panel = new panel_model();
	$menu = $panel->get_menu();
	require("views/panel/panelcontrol.php");
?>
