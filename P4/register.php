<?php

require "db_helper.php";
$db=db::conexion();
if($_POST['password'] === $_POST['password2']){
	$form_pass = $_POST['password'];

	$hash = password_hash($form_pass, PASSWORD_BCRYPT); 




	$buscarUsuario = "SELECT * FROM usuarios
	WHERE usuario = '$_POST[username]' ";

	$result = $db->query($buscarUsuario);

	$count = mysqli_num_rows($result);

	if ($count == 1) {
		echo "<br />". "El Nombre de Usuario ya existe." . "<br />";

		echo "<a href='index.html'>Por favor escoga otro Nombre</a>";
	}
	else{

		$query = "INSERT INTO usuarios (usuario, password, correo, fecha_nacimiento)
		           VALUES ('$_POST[username]', '$hash', '$_POST[email]', '$_POST[fecha_nacimiento]')";

		if ($db->query($query) === TRUE) {
		    echo "<script type='text/javascript'>window.location.href='/';alert('Usuario registrado correctamente. Puede iniciar sesión.');</script>";
		}else {
		 echo "Error al crear el usuario." . $query . "<br>" . $db->error; 
		}
	}
	mysqli_close($db);
}else{

	echo "<script type='text/javascript'>window.location.href='/';alert('Las contraseñas no coinciden.');</script>";
}
?>

