<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $data_name = "kaif";
    $conn = new mysqli($servername, $username, $password, $db_name);
    if($conn->connect_error){
        die("cennection failed".$conn->connect_error);
    }
    echo "";
?>