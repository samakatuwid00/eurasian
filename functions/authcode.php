<?php
session_start();
include('../config/dbcon.php');
include('myfunctions.php');

$email = $password = $err_msg = "";
$remember = "";

if(isset($_POST['register_btn']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $contact = mysqli_real_escape_string($con, $_POST['contact']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $confirmPass = mysqli_real_escape_string($con, $_POST['confirmPass']);

    $check_email_query = "SELECT email FROM users WHERE email = '$email' ";
    $check_email_query_run = mysqli_query($con, $check_email_query);

    if (mysqli_num_rows($check_email_query_run) > 0)
    {
        $_SESSION['message'] = "Email already registered";
        header('Location: ../registration.php');
    }
    else 
    {
        if($password == $confirmPass)
        {
            $insert_query = "INSERT INTO users (name,email,contact,address,password,confirmPass) VALUES ('$name','$email','$contact','$address','$password','$confirmPass')";
            $insert_query_run = mysqli_query($con, $insert_query);

            if($insert_query_run)
            {
                $_SESSION['message'] = "Registered Successfully";
                header('Location: ../login.php');
            }
            else
            {
                $_SESSION['message'] = "Something went wrong";
                header('Location: ../registration.php');
            }
            }
        else 
        {
            $_SESSION['message'] = "Passwords do not match";
            header('Location: ../registration.php');
        }
    }
}
else if(isset($_POST['login_btn'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    if (isset($_POST['remember'])) {
        $remember = $_POST['remember'];
    }

    $login_query = "SELECT * FROM users WHERE email = '$email' AND password = '$password' ";
    $login_query_run = mysqli_query($con, $login_query);

    if (mysqli_num_rows($login_query_run) > 0) {
        $userdata = mysqli_fetch_array($login_query_run);
        $username = $userdata['name'];
        $useremail = $userdata['email'];
        $role_as = $userdata['role_as'];
        $status = $userdata['status']; // Add this line to get the user's status

        if ($status == 2) {
            // User is banned, prevent login
            $_SESSION['message'] = "Sorry, You Are Banned And Cannot Log In";
            header('Location: ../login.php');
        } else {
            $_SESSION['auth'] = true;
            $_SESSION['auth_user'] = [
                'name' => $username,
                'email' => $useremail
            ];
            $_SESSION['role_as'] = $role_as;

            if ($role_as == 1) {
                redirect("../Admin/index.php", "Welcome to Dashboard");
            } else {
                redirect("../index.php", "Logged In Successfully");
            }

            if (isset($_POST['remember'])) {
                $remember = $_POST['remember'];
                setcookie("remember_email", $email, time() + 3600 * 24 * 365);
                setcookie("remember", $remember, time() + 3600 * 24 * 365);
            } else {
                setcookie("remember_email", "", time() - 36000);
                setcookie("remember", "", time() - 3600);
            }
        }
    } else {
        $_SESSION['message'] = "Invalid Credentials";
        header('Location: ../login.php');
    }
}

