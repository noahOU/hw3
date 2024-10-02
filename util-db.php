<?php
function get_db_connection(){
    // Create connection
    $conn = new mysqli('68.97.31.197', 'User', '!Thunder935', 'mis-4013.mysql.database.azure.com');
    
    // Check connection
    if ($conn->connect_error) {
      return false;
    }
    return $conn;
}
?>
