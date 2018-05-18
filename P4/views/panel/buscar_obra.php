<div class="sep_form">
  <form action="" class="busqueda" method="POST">                
    <LABEL for="option">Buscar por: </LABEL>
    <select name="table" class="select">
        <option class="option" value='titulo' <?php  if(isset($_POST['table']) && $_POST['table'] === 'titulo' ){ echo "selected";} ?>
        >Titulo</option>
        <option class="option" value='autor' <?php  if(isset($_POST['table']) && $_POST['table'] === 'autor' ){ echo "selected";} ?>>Autor</option>
        <option class="option" value='fecha' <?php  if(isset($_POST['table']) && $_POST['table'] === 'fecha' ){ echo "selected";} ?>>Año</option>
        <option class="option" value='descripcion' <?php  if(isset($_POST['table']) && $_POST['table'] === 'descripcion' ){ echo "selected";} ?>>Descripcion</option>
      </select> 
       <LABEL for="texto">Texto: </LABEL>
      <input type="text" class="text_busqueda" name="name" placeholder="Introduzca su busqueda" value="<?php if(isset($_POST['name'])){echo $_POST['name']; } ?>">
      <input type="submit" class="search" name="enviar" value="Buscar">
      <input type="submit" class="search" id="all" name="all" value="Mostrar todas">
  </form>
</div>

<?php


/******************************************************************************************/
/* TABLA BUSQUEDA*/
/******************************************************************************************/

if((isset($_POST['enviar']) && !empty($_POST["name"])) || isset($_POST['all']) ) 
{   
?>
   <!-- el resultado de la búsqueda lo encapsularemos en un tabla -->
    <div class="tabla_resultado">
      <table>
         <tr class="title">
              <!--creamos los títulos de nuestras dos columnas de nuestra tabla -->
            <td class="title">Titulo</td>
            <td class="title">Autor</td>
            <td class="title">Ver</td>
            <td class="title">Editar</td>
            <td class="title">Eliminar</td>

         </tr> 
         <?php
        
        if(isset($_POST['all'])){
          $buscar ="";
        }else{
          $buscar =$_POST["name"];
        }
        
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
            <a href="?editar_obra=<?php echo $registro['id']?>">Editar</a>
          </td>
          <td class="" align="center">  
            <form action = "recursos/panel/eliminar_obra.php" method = "post" 
              onsubmit="return confirm('¿Esta seguro de querer eliminar <?php echo $registro['titulo'] ?>? Tambien eliminará todos los comentarios e imagenes.');">
              <input type="hidden" name="id" value="<?php echo $registro['id'] ?>">
              <input type="submit" class="delete" name="delete" value="Eliminar"/>
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
    echo "Introduzca una busqueda por favor.";
  }
}// fin if
?>