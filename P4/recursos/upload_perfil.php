<?php

include "../db_helper.php";
$bd=db::conexion();
session_start();
$usuario = $_POST["usuario"];
$error_pass = false;
$pass="";

if(!empty($_POST['old_password']) && !empty($_POST['new_password'])){
  
  $old_pass_sql ="SELECT password FROM usuarios WHERE usuario='".$_SESSION['username']."'";
  
  $check = $bd->query($old_pass_sql);
  $old_pass = $check->fetch_assoc();
  
  if(password_verify($_POST['old_password'],$old_pass['password'])){  
    $form_pass = $_POST['new_password'];
    $hash = password_hash($form_pass, PASSWORD_BCRYPT);
    $pass= "password = '".$hash."',";
  }else{
    $error_pass = true;
  }
}

$correo = $_POST["email"];

function is_valid_email($str)
{
  $matches = null;
  return (1 === preg_match('/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/', $str, $matches));
}

function exist_email($str){

}

if(is_valid_email($correo) && !empty($usuario) && !$error_pass){
 
  $sql = "UPDATE usuarios SET usuario='$usuario', ".$pass." correo='$correo', fecha_nacimiento = '$_POST[fecha_nacimiento]', biografia='$_POST[biografia]' WHERE usuario='".$_SESSION['username']."'";

  if ($bd->query($sql) === TRUE) {
    $_SESSION['username']=$usuario;
    $_SESSION['email'] = $correo;
    $message="El perfil se ha actualizado correctamente.";
  } else {
     echo "Error: " . $sql . "<br>" . $bd->error;
  }
}else{

  $message = "Error: Comprueba los datos introducidos.";
  if (is_valid_email($correo)){
    if (empty($usuario)){
        $message = "Rellene el usuario.";
    }else{
      if($error_pass){
         $message ="La contraseña antigua no es correcta.";
      }
    }
  }else{
      $message = "El email introducido no es correcto.";
  }
}

echo "<script type='text/javascript'>alert('".$message."');window.location.href='/?page=editar_perfil';</script>";

?>