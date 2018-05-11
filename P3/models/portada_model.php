<?php
class portada_model{
 private $db;



    public function __construct(){
        $this->bd=db::conexion();
    }


    public function get_datos(){

		$sql = "SELECT id, titulo, imagen FROM obras ORDER BY RAND()
		LIMIT 6";
    	$result = $this->bd->query($sql);
 	


    	return $result;
    } 
}
?>