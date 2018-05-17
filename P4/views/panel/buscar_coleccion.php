<form action="" method="POST">                
  <label for="name">Nombre de la Colección: </label>
  <input type="text" name="name">
  <input type="submit" name="enviar" value="Enviar">
</form>
<?php
if(isset($_POST['enviar'])) 
{   
?>
   
  <div id="resultado_comentario" class="tabla_resultado"> 
   <!-- el resultado de la búsqueda lo encapsularemos en un tabla -->
    <table>
       <tr>
            <!--creamos los títulos de nuestras dos columnas de nuestra tabla -->
            <td><strong>Nombre</strong></td>
            <td><strong>Obras</strong></td>
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
        <td class=”estilo-tabla” align="center"><a href="?editar_coleccion=<?php echo $registro['id'] ?>">Editar</a></td>
        <td class="" align="center">
          <form action = "recursos/panel/eliminar_coleccion.php" method = "post" 
            onsubmit="return confirm('¿Esta seguro de querer eliminar esta coleccion?');">
            <input type="hidden" name="id" value="<?php echo $registro['id'] ?>">
            <input type="submit" name="delete" value="Eliminar"/>
          </form>
        </td>
      </tr> 

      <?php 
      } //fin blucle*/
     ?>

</table>
</div>
   <?php
} else{
}// fin if
?>