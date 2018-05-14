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
            <td width="100" align="center"><strong>Nombre</strong></td>
            <td width="100" align="center"><strong>Apellidos</strong></td>
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
        <td class=”estilo-tabla” align="center"><?=$registro['autor']?></td>
      </tr> 

      <?php 
      } //fin blucle*/
     ?>

</table>
   <?php
} else{
}// fin if
?>