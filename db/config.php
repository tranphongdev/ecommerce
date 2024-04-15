<?php
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $database = "phongshop"; 

    $conn = new mysqli($servername, $username, $password, $database);

    if (!$conn) {
        echo  "KẾT NỐI THẤT BẠI !!!";
    } 
?>
