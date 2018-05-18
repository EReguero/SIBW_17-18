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
  <a href="?page=editar_perfil"> Editar Perfil </a>
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
    <button id="button_interbar" onclick="showLogin();">Iniciar sesión</button>
    <!----------------------------------------------------------------------------------------->
    <!-- MENU OCULTO PARA LOGEAR -->
    <div id="login" class="hide">
      <div id="formulario"> 
        <span onclick="closeLogin();" class="close">&times;</span>
        <form action="login.php" method="post">
          <div class= "column"> 
            <input name="username" type="text" id="username" class="username" placeholder="Usuario" required>
          </div>
          <div class= "column">
            <input name="password" type="password" class="password" id="password_login" placeholder="Contraseña" required>
          </div>
          <div class= "column">
            <input type="submit" name="Submit" class="submit" id="loguear" value="Iniciar Sesión">
          </div>
        </form>
        <div class="column login_links login_links">
          <button id="button_interbar" onclick="closeLogin(); showRegistro();">Registrarse</button>
        </div>
        <div class="column login_links login_links">  
          <button id="button_interbar">¿Contraseña olvidada?</button>  
        </div>
      </div>
    </div>
    <!----------------------------------------------------------------------------------------->
    <p> | </p>
    <button id="button_interbar" onclick="showRegistro()">Registrate</button>
    <!----------------------------------------------------------------------------------------->
    <!-- MENU OCULTO REGISTRO -->
    <div id="registro" class="hide">
      <div id="formulario"> 
        <span onclick="closeRegistro();" onload="errorRegistro();" class="close">&times;</span>
        <form id="formulario_registro" action="register.php" method="post">
          <div class= "column">
          <h3>Crea una cuenta</h3>  
           <input type="text" id="register_username" name="username" class="username" placeholder="Nombre de Usuario" maxlength="32" required>
          </div>
          <div class= "column">  
           <input type="password" id="password"  class="password" name="password" placeholder="Contraseña" maxlength="18" required>
          </div>
          <div class= "column">  
           <input type="password" id="password2"  class ="password" name="password2" placeholder="Vuelva a introducir la contraseña" maxlength="18" required>
          </div>
          <div class= "column"> 
           <input type="text" id="email" name="email" placeholder="Email"  maxlength="160" required>
          </div>
          <div class="column">
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>
          </div>
          <div class= "column">
            <input type="submit" name="Submit" class="submit" id="registrar" value="Registrarse">
          </div>
        </form>
      </div>
    </div>
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
