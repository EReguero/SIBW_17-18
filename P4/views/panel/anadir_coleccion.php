<?php
?>
<h2> Añadir Coleccion</h2>
<form id="anadir_obra" action="/recursos/panel/upload_coleccion.php"  method="POST" required>                        
  <div class="column">  
    <label for="titulo">Titulo: </label>
    <input type="text" name="titulo" placeholder="Introduzca titulo" required>
  </div>  
  <div class="column">
    <label for="descripcion">Descripcion: </label>
    <textarea name="descripcion"></textarea>
  </div> 
    <input type="submit" name="enviar" value="Enviar">
</form>





