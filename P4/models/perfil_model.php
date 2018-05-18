<?php
class perfil_model{
    private $db;

 
    public function __construct(){
        $this->db=db::conexion();
    }


    
    public function get_datos(){
        $sql = "SELECT usuario, correo, fecha_nacimiento, biografia FROM usuarios WHERE usuario = '".$_SESSION['username']."'";
        
        if($this->db->query($sql)){
            $result = $this->db->query($sql);
         
            $datos = $result->fetch_assoc();

             return $datos;
        }else{
            echo "Error: " . $sql . "<br>" . $this->db->error;
        }
    }


    

}
?>