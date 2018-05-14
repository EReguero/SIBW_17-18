<?php
    require("../db_helper.php");
    $db=db::conexion();
    $name = $_POST["name"];

    $sql = "UPDATE obras SET titulo='$name' WHERE id=1";

    if ($db->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

?>
