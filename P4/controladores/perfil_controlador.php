<?php
    
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
		require("models/perfil_model.php");
    	$edicion = new perfil_model();
    	$perfil = $edicion->get_datos($_SESSION['username']);
    	require("views/editar_perfil.php");

	} else {
	  

	   echo "<script type='text/javascript'>window.location.href='/';alert('Debes poder iniciar_sesion para acceder.');</script>";
	   exit;
	}

   
?>