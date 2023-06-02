<?php
   
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: Content-Type");
    // Database connection configuration
    $servername = "localhost";
    $username = "mrsomebo_root";
    $password = "scandiweb2468";
    $dbname = "mrsomebo_scandiweb";

    // Create a database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    global $conn;


?>