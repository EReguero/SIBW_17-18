<article id="descripcion">
    <h2><?php echo $datos['titulo']; ?></h2>
    <h3><?php echo $datos['autor']; ?></h3>
    <H4><?php echo $datos['fecha']; ?></H4>
    <div id="foto">
        <img class= "mySlides" src="<?php echo $datos['imagen'] ;?>" alt="<?php echo $datos['titulo'] ;?>">
        <?php  $galeria = $obra->get_galeria();
            if(mysqli_num_rows($galeria)!=0){
                while($row = $galeria->fetch_assoc()){?>
                    <img class= "mySlides" id="hidden" src="<?php echo $row['imagen'] ;?>" alt="<?php echo $datos['titulo'] ;?>">
                <?php 
                } ?>
            <div id=buttons_fl>  
                <button class="flecha_izquierda" onclick="plusDivs(-1)">&#10094;</button>
                <button class="flecha_derecha" onclick="plusDivs(+1)">&#10095;</button>
            </div>
            <?php } ?> 

        <p><?php echo $datos['titulo']; ?></p>
        <p id='fuente'>Fuente:"<?php echo $datos['fuente_imagen']  ?>"</p>
          
    </div>
    <p><?php echo $datos['descripcion']; ?></p>
</article>
<div id="fechas">
<p id="fecha_creacion">Obra añadida el: <?php echo $datos['fecha_creacion']?></p>
<p id="fecha_modificacion">Obra modificada el: <?php echo $datos['fecha_modificacion']?></p>
</div> 