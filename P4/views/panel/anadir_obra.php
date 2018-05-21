<h2> Añadir Obra</h2>
<form id="anadir_obra" action="recursos/panel/upload_obra.php" enctype="multipart/form-data" method="POST">                
  <div class="column">  
    <label for="titulo">Titulo: </label>
    <input type="text" name="titulo" placeholder="Introduzca titulo" required>
  </div>  
  <div class="column">
    <label for="autor">Autor: </label>
    <input type="text" name="autor"placeholder="Introduzca autor" required>
  </div>  
  <div class="column">
    <label for="fecha">Fecha: </label>
    <input type="number" name="fecha" placeholder="YYYY" min="0" max="2018" required>
  </div>  
  <div class="column">
    <label for="coleccion">Colección: </label>
    <select name="coleccion" required>
    	<?php
    		$colecciones = $panel ->get_colecciones();
    		while($registro = $colecciones->fetch_assoc()){?>
    		 <option value='<?php echo $registro['id'] ?>'><?php echo $registro['nombre']?></option>
    	<?php	
    		}
    	?>
    </select>
  </div>  
  <div class="column">
    <label for="imagen">Imagen: </label>
    <input type="file" name="imagen" onchange="preview_imagen(this);" required>
  </div>
  <div class="column">
    <label for="descripcion">Fuente imagen: </label>
    <input type="text" name="fuente" required>
  </div>    
  <div class="column">
    <label for="descripcion">Descripcion: </label>
    <textarea name="descripcion" required></textarea>
  </div>  
  <div class="column">
    <label for="biografia">Enlace Biografia: </label>
    <input type="text" name="biografia" placeholder="https://wwww.enlace.com">
   </div>  
  <div class="column">
    <label for="web">Enlace Web: </label>
    <input type="text" name="web" placeholder="http://wwww.enlace.com">
  </div>
  <input type="submit" name="enviar" value="Añadir Obra">
</form>
<div id="thumb_anadir">
    <img id="miniatura" src="img/image.png"  alt="Preview">
</div>



