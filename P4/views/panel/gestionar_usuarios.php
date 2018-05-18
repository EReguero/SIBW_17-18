<div class="sep_form">
  <form action="" class="busqueda" method="POST">                
    <LABEL for="option">Buscar por: </LABEL>
    <select name="table" class="select">
        <option class="option" value='usuario' <?php  if(isset($_POST['table']) && $_POST['table'] === 'titulo' ){ echo "selected";} ?>
        >Usuario</option>
        <option class="option" value='correo' <?php  if(isset($_POST['table']) && $_POST['table'] === 'autor' ){ echo "selected";} ?>>Email</option>
        <option class="option" value='id' <?php  if(isset($_POST['table']) && $_POST['table'] === 'fecha' ){ echo "selected";} ?>>ID</option>
      </select> 
       <LABEL for="texto">Texto: </LABEL>
      <input type="text" class="text_busqueda" name="name" placeholder="Introduzca su busqueda" value="<?php if(isset($_POST['name'])){echo $_POST['name']; } ?>">
      <input type="submit" class="search" name="enviar" value="Buscar">
      <input type="submit" class="search" id="all" name="all" value="Mostrar todos">
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
         <tr>
              <!--creamos los títulos de nuestras dos columnas de nuestra tabla -->
            <td class="title">ID</td>
            <td class="title">Usuario</td>
            <td class="title">Correo</td>
            <td class="title">Permisos</td>
            <td class="title">Editar</td>

         </tr> 
         <?php
        
        if(isset($_POST['all'])){
          $buscar ="";
        }else{
          $buscar =$_POST["name"];
        }
        
        $tabla = $_POST['table'];
        
        $bd = db::conexion();
        $sql= "SELECT usuarios.*, tipo_usuario.tipo FROM usuarios LEFT JOIN tipo_usuario ON usuarios.tipo_usuario=tipo_usuario.id WHERE usuarios.".$tabla." LIKE '%".$buscar."%'";

        $result = $bd->query($sql);
           
        while($registro = $result->fetch_assoc()){
        ?> 
        <tr>     
          <td><?=$registro['id']?></td>
          <td><?php echo $registro['usuario']?></td>
          <td><?php echo $registro['correo']?></td>
          <td><?php echo $registro['tipo']?></td>
          <td><a href="?editar_usuario=<?php echo $registro['id']?>"> Modificar Perfil</a></td>

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