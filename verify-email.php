<?php
session_start();
include('config/dbcon.php');

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $verify_query = "SELECT verify_status FROM users WHERE verify_token='$token' LIMIT 1";
    $verify_query_run = mysqli_query($con, $verify_query);

    if (mysqli_num_rows($verify_query_run) > 0) {
        $row = mysqli_fetch_array($verify_query_run);
        $verify_status = $row['verify_status'];

        if ($verify_status == 0) {
            $update_query = "UPDATE users SET verify_status = 1, status = 0 WHERE verify_token='$token' LIMIT 1";
            $update_query_run = mysqli_query($con, $update_query);

            if ($update_query_run) {
                $_SESSION['message'] = "Your account has been verified successfully!";
                header('Location: login.php');
                exit(0);
            } else {
                $_SESSION['message'] = "Verification Failed";
                header("Location: login.php");
                exit(0);
            }
        } else {
            $_SESSION['message'] = "Email Already Verified. Please Login";
            header("Location: login.php");
            exit(0);
        }
    } else {
        $_SESSION['message'] = "This token does not exist";
        header("Location: login.php");
        exit(0);
    }
} else {
    $_SESSION['message'] = "Not Allowed";
    header("Location: login.php");
    exit(0);
}
?>
