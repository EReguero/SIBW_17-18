<?php
  require("../../db_helper.php");
  $db=db::conexion();
  $date = date("Y-m-d");
  


  if($_POST['enviar']){
    if(!empty($_POST['nueva_coleccion'])){
      for($i = 0; $i < count($_POST["nueva_coleccion"]); $i++) {
        if($_POST['coleccion'] != $_POST['nueva_coleccion']){
          $sql_id = "SELECT id FROM colecciones WHERE nombre=".$_POST['obras'][$i];
          $result_id = $db->query($sql_id);
          $result_id->fetch_assoc();

          $sql = "UPDATE obras SET coleccion='' WHERE id=".$result_id['id'];
       
          if ($db->query($sql) === TRUE) {
          echo "Mensaje editado correctamente";
          } else {
              echo "Error updating record: " . $conn->error;
          }
        }
      }
    }
  }
?>
