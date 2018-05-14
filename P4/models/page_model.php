<?php
class page_model{
    private $db;
    private $page;
 
    public function __construct(){
        $this->bd=db::conexion();  
    }


    
    public function get_entradas(){
        $sql = "SELECT * FROM entradas";
        $result = $this->bd->query($sql);


        return $result;
    }  
}
?>