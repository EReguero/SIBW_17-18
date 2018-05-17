<?php

    include "db_helper.php";
    $bd=db::conexion();

    $usuario = $_POST["usuario"];

    $form_pass = $_POST['password'];
    $hash = password_hash($form_pass, PASSWORD_BCRYPT);

    $correo = $_POST["correo"];

     function is_valid_email($str)
     {
       $matches = null;
       return (1 === preg_match('/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/', $str, $matches));
     }

     if(is_valid_email($correo) && !empty($usuario) && !empty($hash)){
            session_start();

            $sql = "UPDATE usuarios SET usuario='$usuario',password='$hash', correo='$correo'  WHERE usuario='$_SESSION[username]'";

            if ($bd->query($sql) === TRUE) {
              $_SESSION['username']=$usuario;
              $_SESSION['email'] = $correo;
              echo "<script type='text/javascript'>alert('Perfil modificado correctamente.');window.location.href='/';</script>";
            } else {
               echo "Error: " . $sql . "<br>" . $bd->error;
            }
        }else{

            $message = "Error: Comprueba los datos introducidos.";
            if (is_valid_email($correo)){
                if (!empty($usuario)){
                    if (empty($hash)){
                       $message = "Rellene la password.";
                    }
                }
                else{
                    $message = "Rellene el usuario.";
                }
            }
            else{
                $message = "El email introducido no es correcto.";
            }

          echo "<script type='text/javascript'>alert('".$message."');window.location.href='/';</script>";
        }
    ?>


