<?php

    $host = "localhost";
    $user_name="root";
    $password="";
    $database = "eurasian";

    //Creating database connection
    $con = mysqli_connect($host, $user_name, $password, $database);

    //Check database connection
    if(!$con) {
        die("Connection Failed". mysqli_connect_error()); 
    }
    else {
        echo "Connected successfully";
    }

    ?>