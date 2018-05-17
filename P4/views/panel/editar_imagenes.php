<?php
  $obras = $panel->get_obras();
?>

<form action="" method="POST">                
  <select name="table" onchange="">
      <?php
      while($row = $obras->fetch_assoc()){ 
        $id = $row['id']
      ?>
        <option value='<?php echo $id?>' <?php if(isset($_POST['table']) && $_POST['table']==$id) echo "selected"; ?>><?=$row['titulo']?></option>
      <?php 
      } //fin blucle*/
     ?>
  </select>
  <input type="submit" name="enviar" value="Enviar">
</form>
<?php
if(isset($_POST['enviar'])) 
{    
      $obra =$_POST["table"];
      
      $bd = db::conexion();
      $sql= "SELECT id, imagen FROM galeria WHERE obra=".$obra;
      $result = $bd->query($sql);
   
?>
    <div id="upload_foto">
      <button id="upload_boton" onclick="subida_form(<?php echo $obra?>);">+ Añadir imagen</button>
    </div>
    <div id="imagenes">
      <!-- 24 cabezas -->
      <?php
          while($row = $result->fetch_assoc()){?>
              <div class='contenedor_obra'>  
                <img src="<?=$row['imagen']?>" alt="<?=$row['imagen']?>">
                <form method="POST" action="recursos/panel/eliminar_foto.php">
                  <input type="hidden" name="imagen" value="<?php echo $row['imagen'] ?>">
                  <input type="submit" class="eliminar" name="delete" value="Eliminar"/>
                </form>
              </div>
         <?php } ?>
    </div> 
<?php  
} else{
}// fin if
?>