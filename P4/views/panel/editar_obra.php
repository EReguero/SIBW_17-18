<?php
  $datos = $panel ->get_obra($_GET["editar_obra"]);
  $colecciones = $panel ->get_colecciones();
?>
 <form action="/recursos/panel/update_obra.php"  id="anadir_obra" enctype="multipart/form-data" method="POST">                
  <div class="column">  
    <label for="titulo">Titulo: </label>
    <input type="text" name="titulo" value="<?php echo $datos['titulo'] ?>">
  </div> 
  <div class="column">
    <label for="autor">Autor: </label>
    <input type="text" name="autor"  value="<?php echo $datos['autor'] ?>">
  </div> 
  <div class="column">
    <label for="fecha">Fecha: </label>
    <input type="number" name="fecha" value="<?php echo $datos['fecha'] ?>">
  </div>
 <div class="column">
    <label for="coleccion">Colección: </label>
    <select name="coleccion">
      <?php
      while($registro = $colecciones->fetch_assoc()){
        if($registro['id'] === $datos['coleccion']){?>
          <option value='<?php echo $registro['id'] ?>' selected><?php echo $registro['nombre']?></option> 
      <?php }else{ ?>
          <option value='<?php echo $registro['id'] ?>'><?php echo $registro['nombre']?></option> 
      <?php }
      }?>
    </select>
  </div>  	
  <div class="column">
    <label for="imagen">Imagen: </label>
    <input type="file" name="imagen" onchange="preview_imagen(this);">
  </div>  
  <div class="column">
    <label for="descripcion">Descripcion: </label>
    <textarea name="descripcion"><?php echo $datos['descripcion'] ?></textarea>
  </div> 
  <div class="column">
    <label for="biografia">Enlace Biografia: </label>
    <input type="text" name="biografia" value="<?php echo $datos['biografia_autor'] ?>">
  </div>
   <div class="column">
    <label for="web">Enlace Web: </label>
    <input type="text" name="web" value="<?php echo $datos['web_autor'] ?>">
  </div>
  
  
 

  <input type="hidden" name="id" value="<?php echo $datos['id'] ?>">

  <input type="submit" name="enviar" value="Enviar">
</form>
<div id="thumb_anadir">
    <img id="miniatura" src="<?php echo $datos['imagen'] ?>"  alt="Preview">
</div>



