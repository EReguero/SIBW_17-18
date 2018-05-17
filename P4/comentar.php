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


    if(!empty($_POST['entrada_texto'])){
        session_start();

        $sql = "INSERT INTO comentario (correo, obra_id, nome, ip, comment_text)
        VALUES ('$_SESSION[email]','$_POST[obra]','$_SESSION[username]','$ip' ,'$_POST[entrada_texto]')";

        if ($bd->query($sql) === TRUE) {
          echo "<script type='text/javascript'>alert('Mensaje enviado correctamente');window.location.href='/?obra=".$_POST['obra']."';</script>";
        } else {
           echo "Error: " . $sql . "<br>" . $bd->error;
        }
    }else{
        $message = "Rellene el texto del comentario.";     
        echo "<script type='text/javascript'>alert('".$message."');window.location.href='/?obra=".$_POST['obra']."';</script>";
    }
?>