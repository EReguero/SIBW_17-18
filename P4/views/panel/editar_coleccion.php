<?php
  $id= $_GET["editar_coleccion"];
  $datos = $panel ->get_coleccion($id);
  $nombre = $datos['nombre'];
  $obras = $panel ->get_obras_coleccion($id);
  $resto_colecciones = $panel ->get_resto_colecciones($id);
?>
 <form action="recursos/panel/update_coleccion.php"  method="POST">                
  <p>Coleccion: <?php echo  $nombre; echo $datos['id'] ?></p><br><br>

  <?php
  while($row = $obras->fetch_assoc()){?>
    <div id="obra_<?php echo $row['id']?>">  
      <p><?php echo $row['titulo']?></p>
      <button id="cambiar_boton_<?php echo $row['id']?>" onclick="changeColeccion( <?php echo "'".$nombre,"'"?>,<?php echo $row['id']?>,<?php echo $resto_colecciones ?>);">+ Mover obra</button>
    </div>
  <?php }?>
  
  <input type="hidden" name="coleccion" value="<?php echo $id ?>">
  <input type="submit" name="enviar" value="Enviar">
</form>




