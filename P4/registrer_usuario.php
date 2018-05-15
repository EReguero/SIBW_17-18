<?php

 require "db_helper.php";
 $db=db::conexion();

 $form_pass = $_POST['password'];
 
 $hash = password_hash($form_pass, PASSWORD_BCRYPT); 




 $buscarUsuario = "SELECT * FROM usuarios
 WHERE usuario = '$_POST[username]' ";

 $result = $db->query($buscarUsuario);

 $count = mysqli_num_rows($result);

 if ($count == 1) {
 echo "<br />". "El Nombre de Usuario ya a sido tomado." . "<br />";

 echo "<a href='index.html'>Por favor escoga otro Nombre</a>";
 }
 else{

 $query = "INSERT INTO usuarios (usuario, password, correo)
           VALUES ('$_POST[username]', '$hash', '$_POST[email]')";

 if ($db->query($query) === TRUE) {
 
 echo "<br />" . "<h2>" . "Usuario Creado Exitosamente!" . "</h2>";
 echo "<h4>" . "Bienvenido: " . $_POST['username'] . "</h4>" . "\n\n";
 echo "<h5>" . "Hacer Login: " . "<a href='login.php'>Login</a>" . "</h5>"; 
 }

 else {
 echo "Error al crear el usuario." . $query . "<br>" . $db->error; 
   }
 }
 mysqli_close($db);
?>