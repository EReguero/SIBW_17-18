<!------------------------------------------------------------------------->
<!-- Header -->
<header id="logo">
  <img src="../img/logo.jpg" alt="logo">
  <h1>Guggenheim Bilbao</h1>
</header>
<!------------------------------------------------------------------------->
<!-- Barra de usuario -->
<div id="interbar">
<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {?>
      <div id="interbar_dcha">
        <p>Bienvenido, <?php echo $_SESSION['username']?></p>
        <a href="logout.php">(Logout)</a>
      </div>
      <div id="interbar_izq">
      <a href=""> Editar Perfil </a>
      <?php if($_SESSION['privilegios']>1){?>
          <a href="/panel.php">| Panel de Control</a>
      <?php
      }
      ?>
      </div>
  
  <?php } else { ?>
      <div id="interbar_dcha">
        <p>Bienvenido, Anónimo.</p>
      </div>
      <div id="interbar_izq">
        <a href="login.php"> Iniciar sesión |</a>
        <a href="registrer.php"> Registrate</a>
      </div>

<?php } ?>
</div>
<!------------------------------------------------------------------------->
<!-- Menu Horizontal-->
<nav id="menu">
  <ul>
    <li><a href="/">Inicio</a></li>
    <li><a href="">Obras</a>
      <ul>
        <?php while($row = $obras->fetch_assoc()){ ?>
    <li><a href='/?obra=<?php echo $row['id'] ?>'><?php echo $row['titulo'] ?></a></li>
       <?php } ?>  
      </ul>
    </li>
    <li><a href="">Artistas</a>
       <ul>
        <?php while($row = $autores->fetch_assoc()){ ?>
    <li><a href=''><?php echo $row['autor'] ?></a></li>
       <?php } ?>  
      </ul>
    </li>
    <li><a href="?page=entradas">Entradas</a></li>
    <li><a href="">Colecciones</a>
      <ul>
        <?php while($row = $colecciones->fetch_assoc()){ ?>
    <li><a href='/?coleccion=<?php echo $row['id'] ?>'><?php echo $row['nombre'] ?></a></li>
       <?php } ?>  
      </ul>
    </li>
  </ul>
</nav>
