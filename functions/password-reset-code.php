<?php
include('../config/dbcon.php');
include('../config/dbcon.php');
include('myfunctions.php');
include('../smtp/PHPMailerAutoload.php');

$subject = "Reset Password Notification";

if(isset($_POST['password_reset_link']))
{
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $token = md5(rand());

    $check_emai = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
    $check_email_query_run = mysqli_query($con, $check_emai);

    if(mysqli_num_rows($check_email_query_run) > 0)
    {
        $row = mysqli_fetch_array($check_email_query_run);
        $get_name = $row['name'];
        $get_email = $row['email'];

        $update_token = "UPDATE users SET verify_token='$token' WHERE email='$get_email' LIMIT 1";
        $update_token_run = mysqli_query($con, $update_token);

        if($update_token_run)
        {
            send_password_reset($get_name,$get_email,$token);
            $_SESSION['message'] = "We emailed you a password reset link";
            header("Location: ../password-reset.php");
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "No Email Found";
            header("Location: ../password-reset.php");
            exit(0);
        }    
    }
    else
    {
        $_SESSION['message'] = "No Email Found";
        header("Location: ../password-reset.php");
        exit(0);
    }
}
if (isset($_POST['password_update'])) 
{

    $email = mysqli_real_escape_string($con, $_POST['email']);
    $new_password = mysqli_real_escape_string($con, $_POST['new_password']);
    $confirm_pass = mysqli_real_escape_string($con, $_POST['confirm_pass']);

    $token = mysqli_real_escape_string($con, $_POST['password_token']);

        if(!empty($token))
        {
            if(!empty($email) && !empty($new_password) && !empty($confirm_pass))
            {
                $check_token = "SELECT verify_token FROM users WHERE verify_token = '$token' LIMIT 1";
                $check_token_run = mysqli_query($con, $check_token);

                if(mysqli_num_rows($check_token_run) > 0)
                {
                    if ($new_password == $confirm_pass)
                    {
                        $update_password = "UPDATE users SET password='$new_password' WHERE verify_token='$token' LIMIT 1";
                        $update_password_run = mysqli_query($con, $update_password);

                        if ($update_password_run)
                        {
                            $new_token = md5(rand());
                            $update_to_new_token = "UPDATE users SET verify_token='$new_token' WHERE verify_token='$token' LIMIT 1";
                            $update_to_new_token_run = mysqli_query($con, $update_to_new_token);
        
                            $_SESSION['message'] = "New Password Successfully Updated!";
                            header("Location: ../login.php");
                            exit(0);  
                        }
                        else
                        {
                            $_SESSION['message'] = "Did Not Update Password. Something Went Wrong!";
                            header("Location: ../password-change.php?token=$token&email=$email");
                            exit(0);
                        }
                    }
                    else
                    {
                        $_SESSION['message'] = "Password and Confirm Password does not match";
                        header("Location: ../password-change.php?token=$token&email=$email");
                        exit(0);
                
                    }
                }
            }
            else
            {
                $_SESSION['message'] = "All Filled are Mandatory";
                header("Location: ../password-change.php?token=$token&email=$email");
                exit(0);    
            }
        }
        else
        {
            $_SESSION['message'] = "No Token Available";
            header("Location: ../password-change.php?token=$token&email=$email");
            exit(0);
        }
}

function send_password_reset($subject,$get_email,$token)
{
    $mail = new PHPMailer(); 
	$mail->IsSMTP();  
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->SMTPDebug = 2; 
	$mail->Username = "eurasian32@gmail.com"; //write sender email address
	$mail->Password = "vvtkmgaebnqxmvjw"; //write app password of sender email
	$mail->SetFrom("eurasian32@gmail.com"); //write sender email address
	$mail->Subject = $subject;
    $emailbody=
    "<h2>You have Registered with Eurasian Paradise Resort</h2>
    <h5>Verify your email address to Login with the below given link</h5>
    <br></br>
    <a href='http://localhost/Eurasian%20Paradise%20Resort%20System/password-change.php?token=$token&email=$get_email'> Click Me </a>";
    $mail->Body =$emailbody;
	$mail->AddAddress($get_email);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else{
		echo "We've sent 6 Digit OTP code to your email: ".$get_email;
	}
}
?>