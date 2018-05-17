<?php
session_start();

require "db_helper.php";

$username = $_POST['username'];
$password = $_POST['password'];
 
$sql = "SELECT * FROM usuarios WHERE usuario = '$username'";

$db=db::conexion();
$result = $db->query($sql);

$row = $result->fetch_array(MYSQLI_ASSOC);


if (password_verify($password, $row['password'])) { 
 
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $row['correo'];
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (60 * 60);


    $_SESSION['privilegios'] = $row['tipo_usuario'];

    echo "Bienvenido! " . $_SESSION['username'];
    header("Location: /");

 } else { 
   echo "Username o Password estan incorrectos.";

   echo "<br><a href='login.php'>Volver a Intentarlo</a>";
 }


 ?>