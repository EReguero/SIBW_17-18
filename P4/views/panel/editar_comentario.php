<?php
  $datos = $panel ->get_comentario($_GET["editar_comentario"]);
  $obras = $panel ->get_obras();
?>
 <form action="/recursos/panel/update_comentario.php" enctype="multipart/form-data" method="POST">                
  <p>Usuario: <?php echo $datos['nome'] ?></p><br><br>
 
  <label for="coleccion">Colección: </label>
  <select name="obra_id">
  	<?php
      while($row = $obras->fetch_assoc()){
        if($row['id'] === $datos['obra_id']){?>
          <option value='<?php echo $row['id'] ?>' selected><?php echo $row['titulo']?></option> 
  <?php }else{ ?>
  		    <option value='<?php echo $row['id'] ?>'><?php echo $row['titulo']?></option> 
  <?php }
      }?>
  </select><br><br>
  
  
  <label for="texto" >Texto </label>
  <textarea type="text" name="texto"><?php echo $datos['comment_text'] ?></textarea>

  <input type="hidden" name="comentario_id" value="<?php echo $datos['id'] ?>">

  <input type="submit" name="enviar" value="Enviar">
</form>



