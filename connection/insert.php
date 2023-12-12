<?php
    include('../config/dbcon.php');

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $message = mysqli_real_escape_string($con, $_POST['message']);

    $insert_query = "INSERT INTO notifications(name,email,message,seen)VALUES('$name','$email','$message','1')";
    
    $result = mysqli_query($con,$insert_query);

    if($result)
    {
        $_SESSION['message'] = "Message Sent! Check Your Email For Updates";
        header('Location: ../index.php');    
    }
    
?>