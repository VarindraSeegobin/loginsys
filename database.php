<?php 
    $server_name = "localhost";
    $server_username = "root";
    $server_password = "";
    $database_name = "test";


    try {
        $connection = mysqli_connect($server_name,$server_username,$server_password, $database_name);
        echo "SQL server connection established.";
    }
    catch (Exception $e) {
        echo "SQL server connection not established. Check if xampp is running.";
    }

?>