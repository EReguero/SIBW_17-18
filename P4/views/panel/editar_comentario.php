<?php
  $datos = $panel ->get_comentario($_GET["editar_comentario"]);
  $obra= $panel ->get_obra($datos['obra_id']);
  $resto_obras = $panel ->get_resto_obras();

?>
<form id="editar_coleccion" action="/recursos/panel/update_comentario.php" method="POST">                
  <div class="column">  
    <label for="Usuario">Usuario:</label>
    <input type="text" name="user" value="<?php echo $datos['nome'] ?>" readonly>
  </div>
  <div class="column coleccion_form" id="obra_<?php echo $datos['obra_id']?>">  
    <label for="coleccion" id="label_<?php echo $datos['obra_id']?>">Comentario en <span class="underline"><?php echo $obra['titulo']?></span></label>
    <button class="coleccion_change" id="cambiar_boton_<?php echo $datos['obra_id']?>" onclick="changeColeccion(<?php echo "'".$obra['titulo']."'"?>,<?php echo $datos['obra_id']?>,<?php echo $resto_obras ?>);">+ Mover comentario a otra obra</button>
  </div>
  <div class="column">  
    <label for="texto" >Texto: </label>
    <textarea type="text" name="texto"><?php echo $datos['comment_text'] ?></textarea>
  </div>
  <input type="hidden" name="obra_old" value="<?php echo $datos['obra_id']?>">
  <input type="hidden" name="comentario_id" value="<?php echo $datos['id'] ?>">
  <input type="submit" name="enviar" value="Enviar">
</form>




