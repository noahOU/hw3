<?php
function get_db_connection(){
    // Create connection
    $conn = new mysqli('mis-4013.mysql.database.azure.com', 'User', '!Thunder935', 'hw3');
    
    // Check connection
    if ($conn->connect_error) {
      return false;
    }
    return $conn;
}
?>
