<?php

include "../../db_helper.php";

$correo = $_POST["email"];

function is_valid_email($str)
{
  $matches = null;
  return (1 === preg_match('/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/', $str, $matches));
}

function exist_email($str){

}

function haySuperUsuarios($bd,$usuario){
  $exist = false;
  $sql_ex = "SELECT id FROM usuarios WHERE id !=".$usuario." AND tipo_usuario = 4";

  $result = $bd->query($sql_ex);
  $row_cnt = $result->num_rows;
  if($row_cnt > 0){
      $exist=true;
  }

  return $exist;
}

$usuario = $_POST["usuario"];
$correo = $_POST["email"];

if(is_valid_email($correo) && !empty($usuario)){

  $bd=db::conexion();

  $pass="";

  if(!empty($_POST['new_password'])){
    $form_pass = $_POST['new_password'];
    $hash = password_hash($form_pass, PASSWORD_BCRYPT);
    $pass= "password = '".$hash."',";
  }

  if(haySuperUsuarios($bd,$_POST['id']) ){
    
    $bio = addslashes($_POST['biografia']);

    $sql = "UPDATE usuarios SET usuario='$usuario', ".$pass." correo='$correo',tipo_usuario = $_POST[tipo_usuario],fecha_nacimiento = '$_POST[fecha_nacimiento]', biografia= '$bio' WHERE id=".$_POST['id'];

    if ($bd->query($sql) === TRUE) {
      session_start();  
      $message="El perfil se ha actualizado correctamente.";
      if($usuario === $_SESSION['username'] && $_POST['tipo_usuario'] != $_SESSION['privilegios']){
        
        echo "<script type='text/javascript'>alert('El perfil se ha actualizado correctamente. Has modificado tus datos, debes volver a iniciar sesión por seguridad.');window.location.href='/logout.php';</script></script>";
        
      }
    } else {
       echo "Error: " . $sql . "<br>" . $bd->error;
    }
  }else{
    $message="Eres el ultimo Superusuario, no puedes modificar tu rol.";
  }
}else{

  $message = "Error: Comprueba los datos introducidos.";
  if (is_valid_email($correo)){
    if (empty($usuario)){
        $message = "Rellene el usuario.";
    }else{
      if(empty($email)){
         $message ="El email está vacio";
      }
    }
  }else{
      $message = "El email introducido no es correcto.";
  }
}
 
echo "<script type='text/javascript'>alert('".$message."');window.location.href='/panel.php?gestionar_usuarios';</script>";


?>