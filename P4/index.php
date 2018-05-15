<?php
  require("db_helper.php");
  if(count($_GET) == 0) {
    include ("controladores/portada_controlador.php");
  } else {
    switch(key($_GET)) {
      case 'obra':
          include("controladores/obra_controlador.php");
          break;
      
      case 'coleccion':
        include("controladores/coleccion_controlador.php");
        break;
      
      case 'page':
        include ("controladores/page_controlador.php");
        break;


      case 'editar_perfil':
        include ("controladores/perfil_controlador.php");
        break;
    }
  }
;?>
