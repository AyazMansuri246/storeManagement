<?php

    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dname = "storemanager";

    $conn = mysqli_connect($servername , $username , $password , $dname);

    if($conn -> connect_error){
        die("Failed");
    }
    // echo "Done";
    
?>
