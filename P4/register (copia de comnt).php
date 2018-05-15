<?php
    include "db_helper.php";
    function getip(){
            if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
                $ip = getenv("HTTP_CLIENT_IP");
            else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
                $ip = getenv("HTTP_X_FORWARDED_FOR");
            else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
                $ip = getenv("REMOTE_ADDR");
            else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
                $ip = $_SERVER['REMOTE_ADDR'];
            else
                $ip = "unknown";
            return($ip);
    }


    $bd=db::conexion();
    $ip = getip();

    function is_valid_email($str)
    {
      $matches = null;
      return (1 === preg_match('/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/', $str, $matches));
    }

    if(is_valid_email($_POST['email']) && !empty($_POST['entrada_nombre']) && !empty($_POST['entrada_texto'])){
        $sql = "INSERT INTO comentario (correo, obra_id, nome, ip, comment_text)
        VALUES ('$_SESSION[correo]','$_POST[obra]','$_SESSION[username]','$ip' ,'$_POST[entrada_texto]')";

        if ($bd->query($sql) === TRUE) {
          echo "<script type='text/javascript'>alert('Mensaje enviado correctamente');window.location.href='/?obra=".$_POST['obra']."';</script>";
        } else {
           echo "Error: " . $sql . "<br>" . $bd->error;
        }
    }else{
      
        $message = "Error: Comprueba los datos introducidos.";
        if (is_valid_email($_POST['email'])){
            if (!empty($_POST['entrada_nombre'])){
                if (empty($_POST['entrada_texto'])){
                   $message = "Rellene el texto del comentario.";
                }
            }
            else{
                $message = "Rellene el nombre.";
            }
        }
        else{
            $message = "El email introducido no es correcto.";
        }

      echo "<script type='text/javascript'>alert('".$message."');window.location.href='/?obra=".$_POST['obra']."';</script>";
    }
?>