<button id="boton_comentarios" onclick="mostrarComentarios()">Comentarios</button>
<div id ="box_comentarios">
    <div id="comentarios">
        <?php
            while($row = $comentarios->fetch_assoc()){
                echo"<div class='comentario'>";
                echo"<p class='nombre'>".$row['nome']."</p>";
                echo"<p class='fecha'>".$row['fecha']."</p>";
                echo "<p class='text'>".$row['comment_text']."</p>";
                echo "</div>";
            }
        ?>  
    </div>
    <form id="comentar" action="insertar_comentario.php" method="post" target="_self">
        <input type="hidden" name="obra" value=<?php echo $_GET["obra"]?>>
        <label for="entrada_nombre">Nombre:  </label>
        <input type="text" name="entrada_nombre" id="entrada_nombre" placeholder="Nombre completo">
        <label for="email">Email:  </label>
        <input type="text" name="email" id="email" placeholder="example@email.es">
        <textarea name="entrada_texto" id="entrada_texto"  onkeyup="validarTexto(<?php foreach ($palabrasprohibidas as $palabra) {
            if ($palabra === end($palabrasprohibidas)){
                echo "'".$palabra."'";
            }else{
                echo "'".$palabra."',";  
            }
        } ?>)" placeholder="Introduzca aquí su comentario." ></textarea>
        <input type="submit" id="crear_comentario" value="Enviar">
    </form>    
</div>    