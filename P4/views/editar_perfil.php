
<div id="edit_form_container">
	<form id="edit_perfil_form" action="recursos/upload_perfil.php" enctype="multipart/form-data" method="POST">
		<div class="column">
			<label for="usuario">Usuario: </label>
			<input type="text" class="username" name="usuario" value='<?php echo $perfil['usuario']?>'>
		</div>
		<div class="column"> 
			<label for="old_password">Contraseña actual: </label>
			<input type="password" class="password" name="old_password">
		</div>
		<div class="column">  
			<label for="new_password">Contraseña nueva: </label>
			<input type="password" class="password" name="new_password">
		</div>
		<div class="column"> 
		 	<label for="correo">Correo: </label>
		 	<input type="text" class="email" name="email" value="<?php echo $perfil['correo']?>">
		</div>
		<div class="column"> 
			<label for="correo">Fecha de Nacimiento: </label> 
		 	<input type="date"  name="fecha_nacimiento" value="<?php echo $perfil['fecha_nacimiento']?>">
		</div>
		<div class="column">  
		  	<label for="correo">Biografia: </label>
		  	<textarea name="biografia"><?php echo $perfil['biografia']?></textarea>
		</div>
	  	<div class="column">  
	  		<input type="submit" id="actualizar_perfil" class="submit" name="enviar" value="Actualizar Perfil">
	  	</div>
	</form>
</div>