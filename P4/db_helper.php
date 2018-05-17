<?php
class db{  
    
    function conexion(){
        $servername = "localhost";
        $username = "admin_p3";
        $password = "practica3";
        $dbname = "GuggenheimBilbao";


        // Create connection
        global $conn;
        $conn = new mysqli($servername, $username, $password, $dbname);
        mysqli_set_charset($conn,"utf8");
        
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
       
        return $conn;
    }
  
    public static function close_conexion($conn){
        $conn->close();
    }
}

?>
