<div class="sep_form">
  <form action="" class="busqueda" method="POST">                
    <LABEL for="option">Buscar por: </LABEL>             
    <select name="table" id="comment_select" class="select">
      <option value='nome' <?php  if(isset($_POST['table']) && $_POST['table'] === 'titulo' ){ echo "selected";} ?>>
        Usuario
      </option>
      <option value='correo' <?php  if(isset($_POST['table']) && $_POST['table'] === 'titulo' ){ echo "selected";} ?>>
        Correo
      </option>
      <option value='ip' <?php  if(isset($_POST['table']) && $_POST['table'] === 'titulo' ){ echo "selected";} ?>>
        IP
      </option>
      <option value='fecha' <?php  if(isset($_POST['table']) && $_POST['table'] === 'titulo' ){ echo "selected";} ?>>
        Fecha
      </option>
      <option value="titulo"<?php  if(isset($_POST['table']) && $_POST['table'] === 'titulo' ){ echo "selected";} ?>>
        Obra
      </option>
    </select>
    <LABEL for="texto">Texto: </LABEL>
    <input type="text" class="text_busqueda" name="name"  placeholder="Introduzca su busqueda" value="<?php echo isset($_POST['name']) ? $_POST['name'] : '' ?>">
    
    <input type="submit" class="search" name="enviar" value="Buscar">
    <input type="submit" class="search" id="all" name="all" value="Mostrar todos">
  </form>
</div>


<?php
if(isset($_POST['enviar']) && !empty($_POST["name"]) || isset($_POST['all'])){   
?>
<?php
  
  if(isset($_POST['all'])){
    $buscar ="";
  }else{
    $buscar =$_POST["name"];
  }

  $tabla = $_POST['table'];
  
  $bd = db::conexion();
  $sql= "SELECT comentario.*, obras.titulo FROM comentario LEFT JOIN  obras ON comentario.obra_id = obras.id WHERE ".$tabla." LIKE '%".$buscar."%'";
  $result = $bd->query($sql); 
?>

  <div class="tabla_resultado"> 
   <!-- el resultado de la búsqueda lo encapsularemos en un tabla -->
    <table>
      <tr class="title">
        <!--creamos los títulos de nuestras dos columnas de nuestra tabla -->
        <td class="title">Usuario</td>
        <td class="title">Obra</td>
        <td class="title">Fecha</td>
        <td class="title">IP</td>
        <td class="title">Comentario</td>
        <td class="title">Editar</td>
        <td class="title">Eliminar</td>
      </tr> 
      <?php
      while($registro = $result->fetch_assoc()){
      ?> 
        <tr>     
          <td><?=$registro['nome']?></td>
          <td><?=$registro['titulo']?></td>        
          <td><?=$registro['fecha']?></td>
          <td><?=$registro['ip']?></td>
          <td><?=$registro['comment_text']?></td>
          <td>
            <a href="?editar_comentario=<?php echo $registro['id']?>">Editar</a>
          </td>
          <td>
            <form action = "recursos/panel/eliminar_comentario.php" method = "post" 
              onsubmit="return confirm('¿Esta seguro de querer eliminar este comentario?');">
              <input type="hidden" name="id" value="<?php echo $registro['id'] ?>">
              <input type="submit" name="delete" value="Eliminar" class="delete"/>
            </form>
          </td>
        </tr>
      <?php } ?> 
    </table>
  </div>

<?php
}else{
  if(empty($_POST["name"]) && isset($_POST['enviar'])){
    echo "Introduzca una busqueda por favor.";
  }
}?>
   