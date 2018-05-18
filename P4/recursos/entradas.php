<table id="entradas">
  <tr id="title">
    <th>Tipo Entrada</th>
    <th>Precio</th> 
    <th>Detalles</th>
    <th>Edad</th>
    <th>Requisitos</th>
  </tr>
    <?php while($row = $datos->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $row['tipo'] ?></td>
            <td><?php echo $row['precio'] ?></td> 
            <td><?php echo $row['detalles'] ?></td> 
            <td><?php echo $row['edad'] ?> años</td> 
            <td><?php echo $row['requisitos'] ?></td> 
        </tr>
     <?php  } ?>
</table> 
    <button id="comprar_entradas">Comprar entradas</button>
