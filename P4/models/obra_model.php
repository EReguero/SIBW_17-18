<?php
class obra_model{
    private $db;
    private $obra_id;
 
    public function __construct(){
        $this->bd=db::conexion();
        $this->obra_id=$_GET["obra"];    
    }


    
    public function get_datos(){
        $sql = "SELECT * FROM obras WHERE ID= ".$this->obra_id;
        $result = $this->bd->query($sql);
        $row = $result->fetch_assoc();

        return $row;
    }

    public function get_comentarios (){
        $sql = "SELECT * FROM comentario WHERE obra_id= ".$this->obra_id." ORDER BY fecha ASC";
        $result = $this->bd->query($sql);

        return $result;
    }

    public function get_palabrasprohibidas (){
        $sql = "SELECT * FROM palabrasprohibidas";
        $result = $this->bd->query($sql);
        $palabras = array();
        while($row = $result->fetch_assoc()){
            $palabras[]=$row['palabra'];
        }

        return $palabras;
    }   

    public function get_galeria(){
        $sql = "SELECT imagen FROM galeria WHERE obra = ".$this->obra_id;
        $result = $this->bd->query($sql);
        return $result;
    }

    public function existe_obra(){
        $exist = false;
        $sql_check = "Select * FROM obras WHERE id=".$this->obra_id;

        $result = $this->bd->query($sql_check);
        $row_cnt = $result->num_rows;
        if($row_cnt > 0){
            $exist=true;
        }

        return $exist;
    }
}
?>