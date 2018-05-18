<div class="sep_form">
  <form action="" class="busqueda" method="POST">   
  <form action="" method="POST">                
    <label for="name">Nombre de la Colección: </label>
    <input type="text" class="text_busqueda" name="name"  placeholder="Introduzca su busqueda" value="<?php echo isset($_POST['name']) ? $_POST['name'] : '' ?>">
    <input type="submit" class="search" name="enviar" value="Buscar">
    <input type="submit" class="search" id="all" name="all" value="Mostrar todos">
  </form>
</div>

<?php
if(isset($_POST['enviar']) && !empty($_POST["name"]) || isset($_POST['all'])) 
{   
?>
   
  <div class="tabla_resultado"> 
   <!-- el resultado de la búsqueda lo encapsularemos en un tabla -->
    <table>
       <tr>
            <!--creamos los títulos de nuestras dos columnas de nuestra tabla -->
            <td class="title">Nombre</td>
            <td class="title">Obras</td>
            <td class="title">Editar</td>
            <td class="title">Eliminar</td>
       </tr> 
       <?php
       $buscar =$_POST["name"];
      
      $bd = db::conexion();
      $sql= "SELECT * FROM colecciones WHERE nombre LIKE '%".$buscar."%'";
      $result_collect = $bd->query($sql);

     

    
      while($registro = $result_collect->fetch_assoc()){
      ?> 
      <tr>     
        <td><?=$registro['nombre']?></td>
        <td>
          <?php 
             $sql_obras= "SELECT titulo FROM obras WHERE coleccion =".$registro['id'] ;
             $result_obras = $bd->query($sql_obras);
             while($row = $result_obras->fetch_assoc()){?>
              <p><?php echo $row['titulo'] ?></p>
            <?php }
            ?>
        </td>
        <td><a href="?editar_coleccion=<?php echo $registro['id'] ?>">Editar</a></td>
        <td>
          <form action = "recursos/panel/eliminar_coleccion.php" method = "post" 
            onsubmit="return confirm('¿Esta seguro de querer eliminar esta coleccion?');">
            <input type="hidden" name="id" value="<?php echo $registro['id'] ?>">
            <input type="submit" name="delete" class="delete" value="Eliminar"/>
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
  if(empty($_POST["name"]) && isset($_POST['enviar'])){
    ?>
    <p class="no_search">Introduzca una busqueda por favor.</p>
    <?php
  }
}// fin if
?>