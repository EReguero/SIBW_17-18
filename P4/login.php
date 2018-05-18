<?php
session_start();

require "db_helper.php";

$username = $_POST['username'];
$password = $_POST['password'];
 
$sql = "SELECT * FROM usuarios WHERE usuario = '$username'";

$db=db::conexion();
$result = $db->query($sql);

$row = $result->fetch_array(MYSQLI_ASSOC);

if(!empty($row)){
    if (password_verify($password, $row['password'])) { 

        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $row['correo'];
        $_SESSION['start'] = time();
        $_SESSION['expire'] = $_SESSION['start'] + (60 * 60);


        $_SESSION['privilegios'] = $row['tipo_usuario'];

        header("Location: /");

    } else { 
        $message = "La contraseña introducida no es correcta.";
    }
}else{
     $message = "El usuario que ha introducido no existe.";
}

echo "<script type='text/javascript'>alert('".$message."'); window.location.href='/';</script>"; 
?>