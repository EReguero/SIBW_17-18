<?php
  $id= $_GET["editar_coleccion"];
  $datos = $panel ->get_coleccion($id);
  $nombre = $datos['nombre'];
  $obras = $panel ->get_obras_coleccion($id);
  $resto_colecciones = $panel ->get_resto_colecciones();
?>
<form id="editar_coleccion" action="recursos/panel/update_coleccion.php"  method="POST">                
  <div class="column">  
    <label for="titulo">Titulo de la colección: </label>
    <input type="text" name="titulo" value="<?php echo $datos['nombre'] ?>">
  </div> 
 <div class="column">
    <label for="descripcion">Descripcion: </label>
    <textarea name="descripcion"><?php echo $datos['descripcion'] ?></textarea>
  </div> 
  <div class="column">  
    <h4>Obras de la coleccion</h4>
  <?php
  while($row = $obras->fetch_assoc()){?>
      <div class="column coleccion_form" id="obra_<?php echo $row['id']?>">  
        <label for="coleccion" id="label_<?php echo $row['id']?>"><?php echo $row['titulo']?></label>
        <button class="coleccion_change" id="cambiar_boton_<?php echo $row['id']?>" onclick="changeColeccion( <?php echo "'".$nombre."'"?>,<?php echo $row['id']?>,<?php echo $resto_colecciones ?>);">+ Mover obra</button>
      </div>
  <?php }?>
  <div class="column">  

  
  <input type="hidden" name="coleccion" value="<?php echo $id ?>">
  <input type="submit" name="enviar" value="Enviar">
</form>




