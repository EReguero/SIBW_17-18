<?php
class panel_model{
    private $db;

 
    public function __construct(){
        $this->bd=db::conexion();
    }


    
    public function get_menu(){
        $sql = "SELECT * FROM panel_menu WHERE privilegios <= '$_SESSION[privilegios]' ORDER BY orden ASC";
        $result = $this->bd->query($sql);

        return $result;
    }


    public function get_colecciones(){
        
        $sql = "SELECT *  FROM colecciones";
        $result = $this->bd->query($sql);

        return $result;
    }

    public function get_obras(){
        $sql = "SELECT *  FROM obras";
        $result = $this->bd->query($sql);

        return $result;
    }

    public function get_coleccion($coleccion_id){
        
        $sql = "SELECT *  FROM colecciones WHERE id=".$coleccion_id;
        $result = $this->bd->query($sql);
        $datos = $result->fetch_assoc();

        return $datos;
    }

    public function get_obras_coleccion($coleccion_id){
        
        $sql = "SELECT *  FROM obras WHERE coleccion=".$coleccion_id;
        $result = $this->bd->query($sql);

        return $result;
    }

    public function get_resto_colecciones(){
        $sql = "SELECT *  FROM colecciones";
        $result = $this->bd->query($sql);
      
        while($row = $result->fetch_assoc()){
          $rows[] = "'".$row['nombre']."','".$row['id']."'";
        }
        
        $string = implode(",",$rows);
        return $string;
    }

    public function get_resto_obras(){
        $sql = "SELECT id,titulo  FROM obras";
        $result = $this->bd->query($sql);
      
        while($row = $result->fetch_assoc()){
          $rows[] = "'".$row['titulo']."','".$row['id']."'";
        }
        
        $string = implode(",",$rows);
        return $string;
    }

    public function get_obra($obra_id){
        $sql = "SELECT *  FROM obras WHERE id=".$obra_id;
        $result = $this->bd->query($sql);
        $datos = $result->fetch_assoc();

        return $datos;
    }

    public function get_comentario($comentario_id){
        $sql = "SELECT *  FROM comentario WHERE id=".$comentario_id;
        $result = $this->bd->query($sql);
        $datos = $result->fetch_assoc();

        return $datos;
    }

    public function get_usuario($usuario_id){
        $sql = "SELECT id, usuario, correo, tipo_usuario, fecha_nacimiento, biografia  FROM usuarios WHERE id=".$usuario_id;
        $result = $this->bd->query($sql);
        $datos = $result->fetch_assoc();

        return $datos;
    }

       public function get_roles(){
        $sql = "SELECT *  FROM tipo_usuario";
        $result = $this->bd->query($sql);

        return $result;
    }
}
?>