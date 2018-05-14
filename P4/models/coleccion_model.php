<?php
class coleccion_model{
    private $db;
    private $coleccion_id;
 
    public function __construct(){
        $this->bd=db::conexion();
        $this->coleccion_id=$_GET["coleccion"];
    }


    
    public function get_obras(){
        $sql = "SELECT id, titulo, imagen FROM obras WHERE coleccion= ".$this->coleccion_id;
        $result = $this->bd->query($sql);

        return $result;
    }


    public function get_coleccion(){
        
        $sql = "SELECT *  FROM colecciones WHERE ID= ".$this->coleccion_id;
        $result = $this->bd->query($sql);
        $row = $result->fetch_row();

        return $row;
    }
    public function get(){
        return $this->coleccion_id;
    }
}
?>