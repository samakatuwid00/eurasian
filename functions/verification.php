<?php
include('../config/dbcon.php');
include('myfunctions.php');
include('../smtp/PHPMailerAutoload.php');

$subject = "Email Verification from Eurasian Paradise Resort";

if(isset($_POST['resend_email_verify_btn']))
{
    if(!empty(trim($_POST['email'])))
    {
        $email = mysqli_real_escape_string($con, $_POST['email']);
        
        $check_email_query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
        $check_email_query_run = mysqli_query($con, $check_email_query);

        if(mysqli_num_rows($check_email_query_run) > 0)
        {
            $row = mysqli_fetch_array($check_email_query_run);
            if($row['verify_status'] == 0)
            {
                $name = $row['name'];
                $email = $row['email'];
                $verify_token = $row['verify_token'];
                
                resend_email_verify($email,$verify_token,$subject);

                $_SESSION['message'] = "Verification Email Link has been sent to your email address!";
                header("Location: ../login.php");
                exit(0);
        
            }
            else
            {
                $_SESSION['message'] = "Email Already Verified. Please Login!";
                header("Location: ../resend-email-verification.php");
                exit(0);        
            }
        }
        else
        {
            $_SESSION['message'] = "Email is not registered. Please Register Now!";
            header("Location: ../register.php");
            exit(0);    
        }
    }
    else
    {
        $_SESSION['message'] = "Please enter the email field!";
        header("Location: ../resend-email-verification.php");
        exit(0);
    }
}

$receiverEmail=$email;

function resend_email_verify($email,$verify_token,$subject)
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
    <a href='http://localhost/Eurasian%20Paradise%20Resort%20System/verify-email.php?token=$verify_token'> Click Me </a>";
    $mail->Body =$emailbody;
	$mail->AddAddress($email);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else{
		echo "We've sent 6 Digit OTP code to your email: ".$email;
	}
}

?>