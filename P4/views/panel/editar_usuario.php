<?php
  $datos = $panel ->get_usuario($_GET["editar_usuario"]);
  $roles = $panel -> get_roles();
?>
<div id="edit_form_container">
	<form id="edit_perfil_form" action="recursos/panel/update_usuarios.php" enctype="multipart/form-data" method="POST">
		<div class="column">
			<label for="usuario">Usuario: </label>
			<input type="text" class="username" name="usuario" value='<?php echo $datos['usuario']?>'>
		</div>
		<div class="column">  
			<label for="new_password">Contraseña nueva: </label>
			<input type="password" class="password" name="new_password">
		</div>
		<div class="column"> 
		 	<label for="correo">Correo: </label>
		 	<input type="text" class="email" name="email" value="<?php echo $datos['correo']?>">
		</div>
		<div class="column"> 
			<label for="correo">Fecha de Nacimiento: </label> 
		 	<input type="date"  name="fecha_nacimiento" value="<?php echo $datos['fecha_nacimiento']?>">
		</div>
		<div class="column"> 	
			<label for="tipo_usuario">Tipo de usuario: </label> 
			<select name="tipo_usuario"> 
			 <?php
		     while($registro = $roles->fetch_assoc()){
		        if($registro['id'] === $datos['tipo_usuario']){?>
		          <option value='<?php echo $registro['id'] ?>' selected><?php echo $registro['tipo']?></option> 
		      	<?php }else{ ?>
		          <option value='<?php echo $registro['id'] ?>'><?php echo $registro['tipo']?></option> 
		      	<?php }
	      	}?>
	      	</select>
	    </div>
		<div class="column">  
		  	<label for="correo">Biografia: </label>
		  	<textarea name="biografia"><?php echo $datos['biografia']?></textarea>
		</div>
	  	<div class="column">  
	  		<input type="submit" id="actualizar_perfil" class="submit" name="enviar" value="Actualizar Perfil de <?php echo $datos['usuario']?>">
	  	</div>
	  	<input type="hidden" name="id" value="<?php echo $datos['id']?>">
	</form>
</div>