<form action="" method="POST">                
  <select name="table" onchange="">
    <option value='titulo'>Titulo</option>
    <option value='autor'>Autor</option>
    <option value='fecha'>Año</option>
  </select>
  <input type="text" name="name">
  <input type="submit" name="enviar" value="Enviar">
</form>
<?php
if(isset($_POST['enviar'])) 
{   
?>
   <!-- el resultado de la búsqueda lo encapsularemos en un tabla -->
    <table width="100%" border="0" align="center" cellpadding="1" cellspacing="1">
       <tr>
            <!--creamos los títulos de nuestras dos columnas de nuestra tabla -->
          <td width="100" align="center"><strong>Titulo</strong></td>
          <td width="100" align="center"><strong>Autor</strong></td>
          <td width="100" align="center"><strong>Ver</strong></td>
          <td width="100" align="center"><strong>Editar</strong></td>
          <td width="100" align="center"><strong>Eliminar</strong></td>

       </tr> 
       <?php
       $buscar =$_POST["name"];
       $tabla = $_POST['table'];
      
      $bd = db::conexion();
      $sql= "SELECT * FROM obras WHERE ".$tabla." LIKE '%".$buscar."%'";
      $result = $bd->query($sql);

    
      while($registro = $result->fetch_assoc()){
      ?> 
      <tr>     
        <td class="estilo-tabla" align="center"><?=$registro['titulo']?></td>
        <td class=”estilo-tabla” align="center"><?php echo $registro['autor']?></td>
        <td class=”estilo-tabla” align="center"><a href="/?obra=<?php echo $registro['id']?>" target ="_blank">Ver</a></td>
        <td class=”estilo-tabla” align="center">
          <a href="?editar_obra=<?php echo $registro['id']?>">Editar
        </td>
        <td class="" align="center">  
          <form action = "recursos/panel/eliminar_obra.php" method = "post" 
            onsubmit="return confirm('¿Esta seguro de querer eliminar <?php echo $registro['titulo'] ?>? Tambien eliminará todos los comentarios e imagenes.');">
            <input type="hidden" name="id" value="<?php echo $registro['id'] ?>">
            <input type="submit" name="delete" value="Eliminar"/>
          </form>
        </td>

      </tr> 

      <?php 
      } //fin blucle*/
     ?>

</table>
   <?php
} else{
}// fin if
?>