<button id="boton_comentarios" onclick="mostrarComentarios()">Comentarios</button>
<div id ="box_comentarios">
    <div id="comentarios">
        <?php
            while($row = $comentarios->fetch_assoc()){?>
            <div class='comentario'>
                <p class='nombre'><?php echo $row['nome']?></p>
                <p class='fecha'>Publicado el: <?php echo $row['fecha']?></p>
                <p class='text'><?php echo $row['comment_text']?></p>
                <?php if($row['fecha_edicion'] != '0000-00-00 00:00:00'){?>
                    <p class='fecha_mod'>Mensaje editado el <?php echo $row['fecha_edicion']?></p>
                <?php } ?>
            </div>
            <?php }
        ?>  
    </div>
    
    <div id="comentar">
    <?php  
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {?>  
        <form id="comentar" action="comentar.php" method="post" target="_self">
            <input type="hidden" name="obra" value=<?php echo $_GET["obra"]?>>
            <textarea name="entrada_texto" id="entrada_texto"  onkeyup="validarTexto(<?php foreach ($palabrasprohibidas as $palabra) {
                if ($palabra === end($palabrasprohibidas)){
                    echo "'".$palabra."'";
                }else{
                    echo "'".$palabra."',";  
                }
            } ?>)" placeholder="Introduzca aquí su comentario." required></textarea>
            <input type="submit" id="crear_comentario" value="Enviar">
        </form>
    <?php }else{ ?>    
        <div id="require">
            <p>Es necesario estar registrado para poder comentar, por favor inicie sesión o registrese.</p> 
        </div>   
    <?php } ?>  
    </div>  
</div>    

