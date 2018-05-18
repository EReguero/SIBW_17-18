<?php
  require("../../db_helper.php");
  $db=db::conexion();
  $message ="No se ha realizado ninguna operacion, error POST.";


  if($_POST['enviar']){
    
    $sql_only = "UPDATE colecciones SET nombre='$_POST[titulo]', descripcion = '$_POST[descripcion]' WHERE id=".$_POST['coleccion'];

    if ($db->query($sql_only) === TRUE) {
      $message ="Cambios realizados correctamente.";
    } else {
      echo "Error updating record: " . $conn->error;
    }  


    if(!empty($_POST['nueva_coleccion'])){
      for($i = 0; $i < count($_POST["nueva_coleccion"]); $i++) {
        $nueva_coleccion = $_POST['nueva_coleccion'][$i];
        $obra_id = $_POST['obras'][$i];
        if($_POST['coleccion'] != $nueva_coleccion){
          
          $sql = "UPDATE obras SET coleccion='$nueva_coleccion' WHERE id=".$obra_id;
       
          if ($db->query($sql) === TRUE) {
            $message.="Se han movido obras a otras colecciones correctamente.";
          } else {
            echo "Error updating record: " . $conn->error;
          }
        }
      }
    }
  }

  echo "<script type='text/javascript'>alert('".$message."'); window.location.href='/panel.php?editar_coleccion=".$_POST['coleccion']."';</script>"; 

?>
