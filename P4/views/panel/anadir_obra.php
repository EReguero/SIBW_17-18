<?php
?>
 <form action="recursos/panel/upload_obra.php" enctype="multipart/form-data" method="POST">                
  <label for="titulo">Titulo: </label>
  <input type="text" name="titulo"><br><br>
  <label for="autor">Autor: </label>
  <input type="text" name="autor"><br><br>
  <label for="fecha">Fecha: </label>
  <input type="number" name="fecha"><br><br>
  <label for="coleccion">Colección: </label>
  <select name="coleccion">
  	<?php
  		$colecciones = $panel ->get_colecciones();
  		while($registro = $colecciones->fetch_assoc()){?>
  		 <option value='<?php echo $registro['id'] ?>'><?php echo $registro['nombre']?></option>
  	<?php	
  		}
  	?>
  </select><br><br>
  <label for="imagen">Imagen: </label>
  <input type="file" name="imagen"><br><br>
  <label for="descripcion">Descripcion </label>
  <input type="text" name="descripcion"><br><br>
  <label for="biografia">Bio: </label>
  <input type="text" name="biografia"><br><br>
  <label for="web">Web: </label>
  <input type="text" name="web"><br><br>
  <input type="submit" name="enviar" value="Enviar">
</form>



