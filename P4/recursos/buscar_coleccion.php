<form action="" method="POST">                
  <label for="name">Nombre de la Colección: </label>
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
            <td width="100" align="center"><strong>Usuario</strong></td>
            <td width="100" align="center"><strong>Texto</strong></td>
       </tr> 
       <?php
       $buscar =$_POST["name"];
      
      $bd = db::conexion();
      $sql= "SELECT * FROM colecciones WHERE nombre LIKE '%".$buscar."%'";
      $result_collect = $bd->query($sql);

     

    
      while($registro = $result_collect->fetch_assoc()){
      ?> 
      <tr>     
        <td class="estilo-tabla" align="center"><?=$registro['nombre']?></td>
        <td class=”estilo-tabla” align="center">
          <?php 
             $sql_obras= "SELECT titulo FROM obras WHERE coleccion =".$registro['id'] ;
             $result_obras = $bd->query($sql_obras);
             while($row = $result_obras->fetch_assoc()){?>
              <p><?php echo $row['titulo'] ?></p>
            <?php }
            ?>
        </td>
          <td class=”estilo-tabla” align="center"><a href="?editar_obra=<?php echo $registro['id']?>">Editar</td>
        <td class="" align="center"><a href="?eliminar_obra=<?php echo $registro['id']?>">Eliminar</a>
      </tr> 

      <?php 
      } //fin blucle*/
     ?>

</table>
   <?php
} else{
}// fin if
?>