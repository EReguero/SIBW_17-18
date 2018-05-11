<?php
class menu_model{
    private $db;
    private $obra_id;
 
    public function __construct(){
        $this->bd=db::conexion();
        $this->obras=array();
    }


    
    public function get_menu_obras(){

        $sql = "SELECT id, titulo FROM obras ORDER BY titulo";
        $result = $this->bd->query($sql);

        return $result;
    }


    public function get_menu_autores(){
        $sql = "SELECT DISTINCT autor FROM obras ORDER BY autor";
        $result = $this->bd->query($sql);
        return $result;
    }


    public function get_menu_colecciones(){
        $sql = "SELECT id, nombre FROM colecciones ORDER BY nombre";
        $result = $this->bd->query($sql);

        return $result;
    }

}

    
?>