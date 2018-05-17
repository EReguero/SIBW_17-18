<?php
  $datos = $panel ->get_obra($_GET["editar_obra"]);
  $colecciones = $panel ->get_colecciones();
?>
 <form action="/recursos/panel/update_obra.php" enctype="multipart/form-data" method="POST">                
  <label for="titulo">Titulo: </label>
  <input type="text" name="titulo" value="<?php echo $datos['titulo'] ?>"><br><br>
  
  <label for="autor">Autor: </label>
  <input type="text" name="autor"  value="<?php echo $datos['autor'] ?>"><br><br>
  
  <label for="fecha">Fecha: </label>
  <input type="number" name="fecha" value="<?php echo $datos['fecha'] ?>"><br><br>
 
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
  </select><br><br>
  
  <label for="imagen">Imagen: </label>
  <div id="thumb">
    <img id="miniatura" src="<?php echo $datos['imagen']?>"  alt="Preview">
  </div>
  <input type="file" onchange="preview_imagen(this);" name="imagen"><br><br>
  
  <label for="descripcion" >Descripcion </label>
  <input type="text" name="descripcion"  value="<?php echo $datos['descripcion'] ?>"><br><br>
  
  <label for="biografia">Bio: </label>
  <input type="text" name="biografia" value="<?php echo $datos['biografia_autor'] ?>"><br><br>
  
  <label for="web">Web: </label>
  <input type="text" name="web" value="<?php echo $datos['web_autor'] ?>"><br><br>

  <input type="hidden" name="id" value="<?php echo $datos['id'] ?>">

  <input type="submit" name="enviar" value="Enviar">
</form>



