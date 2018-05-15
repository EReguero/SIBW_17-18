<?php
class panel_model{
    private $db;

 
    public function __construct(){
        $this->bd=db::conexion();
    }


    
    public function get_menu(){
        $sql = "SELECT* FROM panel_menu ORDER BY orden ASC";
        $result = $this->bd->query($sql);

        return $result;
    }


    public function get_colecciones(){
        
        $sql = "SELECT *  FROM colecciones";
        $result = $this->bd->query($sql);

        return $result;
    }


    public function eliminar_obra(){

    }

}
?>