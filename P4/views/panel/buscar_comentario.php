<div id="buscar_comentario" class="formulario">
  <form action="" method="POST">                
    <select name="table" onchange="">
      <option value='nome'>Usuario</option>
      <option value='correo'>Correo</option>
      <option value='ip'>IP</option>
      <option value='fecha'>Fecha</option>
      <option value="titulo">Obra</option>
    </select>
    <input type="text" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : '' ?>">
    <input type="submit" class="send" name="enviar" value="Enviar">
  </form>
</div>
<?php
if(isset($_POST['enviar'])) 
{   
?>
  

  <div id="resultado_comentario" class="tabla_resultado"> 
   <!-- el resultado de la búsqueda lo encapsularemos en un tabla -->
    <table>
      <tr>
        <!--creamos los títulos de nuestras dos columnas de nuestra tabla -->
        <td><strong>Usuario</strong></td>
        <td><strong>Obra</strong></td>
        <td><strong>Fecha</strong></td>
        <td><strong>IP</strong></td>
        <td><strong>Comentario</strong></td>
        <td><strong>Editar</strong></td>
        <td><strong>Eliminar</strong></td>

      </tr> 
      <?php
      $buscar =$_POST["name"];
      $tabla = $_POST['table'];
      
      $bd = db::conexion();
      $sql= "SELECT comentario.*, obras.titulo FROM comentario LEFT JOIN  obras ON comentario.obra_id = obras.id WHERE ".$tabla." LIKE '%".$buscar."%'";
      $result = $bd->query($sql);
    

    
      while($registro = $result->fetch_assoc()){
      ?> 
      <tr>     
        <td class="" align="center"><?=$registro['nome']?></td>
        <td class=”” align="center"><?=$registro['titulo']?></td>        
        <td class=”” align="center"><?=$registro['fecha']?></td>
        <td class=”” align="center"><?=$registro['ip']?></td>
        <td class=”” align="center"><?=$registro['comment_text']?></td>
        <td class=”” align="center">
          <form action = "recursos/panel/eliminar_comentario.php" method = "post" 
            onsubmit="return confirm('¿Esta seguro de querer eliminar este comentario?');">
            <input type="hidden" name="id" value="<?php echo $registro['id'] ?>">
            <input type="submit" name="delete" value="Eliminar"/>
          </form>
        </td>
        <td class=”estilo-tabla” align="center">
          <a href="?editar_comentario=<?php echo $registro['id']?>">Editar</a>
        </td>
       
      </tr> 

      <?php 
      } //fin blucle*/
     ?>
    </table>
  </div>
<?php
}
?>