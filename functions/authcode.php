<?php
include('../config/dbcon.php');
include('myfunctions.php');
include('../smtp/PHPMailerAutoload.php');

$email = $password = $err_msg = "";
$remember = "";
$subject = "Email Verification from Eurasian Paradise Resort";

if (isset($_POST['register_btn'])) 
{
    // Your existing code for other user inputs
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $contact = mysqli_real_escape_string($con, $_POST['contact']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $confirmPass = mysqli_real_escape_string($con, $_POST['confirmPass']);
    $verify_token = md5(rand());

    // Check if email exists
    $check_email_query = "SELECT email FROM users WHERE email = '$email' LIMIT 1";
    $check_email_query_run = mysqli_query($con, $check_email_query);

    if (mysqli_num_rows($check_email_query_run) > 0) {
        // Email already registered, decline sending verification
        $_SESSION['message'] = "Email already registered";
        header('Location: ../registration.php');
    } else {
        // Assume $status is the value you want to set (you can change it accordingly)
        $status = 2;

        if ($password == $confirmPass) {
            $insert_query = "INSERT INTO users (name, email, contact, address, status, password, confirmPass, verify_token) 
                            VALUES ('$name','$email','$contact','$address','$status','$password','$confirmPass','$verify_token')";
            $insert_query_run = mysqli_query($con, $insert_query);

            if ($insert_query_run) {
                // Send verification email
                $subject = "Email Verification from Eurasian Paradise Resort";
                $emailbody = "<h2>You have Registered with Eurasian Paradise Resort</h2>
                    <h5>Verify your email address to Login with the below given link</h5>
                    <br></br>
                    <a href='http://localhost/Eurasian%20Paradise%20Resort%20System/verify-email.php?token=$verify_token'> Click Me </a>";
                smtp_mailer($email, $verify_token, $subject);

                // Update the status to 2
                $update_status_query = "UPDATE users SET status = '$status' WHERE email = '$email'";
                mysqli_query($con, $update_status_query);

                $_SESSION['message'] = "Registered Successfully. Check your email for verification.";
                header('Location: ../login.php');
            } else {
                $_SESSION['message'] = "Something went wrong";
                header('Location: ../registration.php');
            }
        } else {
            $_SESSION['message'] = "Passwords Do Not Match!";
            header('Location: ../registration.php');
        }
    }
}
    //  else {
    //     // Insert user with OTP into the database
        // $insert_query = "INSERT INTO users (name,email,contact,address,status,password,confirmPass,verify_token) VALUES ('$name','$email','$contact','$address','$status','$password','$confirmPass','$verify_token')";
    //     $insert_query_run = mysqli_query($con, $insert_query);

    //     if ($insert_query_run) {
    //         // Send verification email
    //         $subject = "Email Verification from Eurasian Paradise Resort";
    //         // $emailbody=
    //         // "<h2>You have Registered with Eurasian Paradise Resort</h2>
    //         // <h5>Verify your email address to Login with the below given link</h5>
    //         // <br></br>
    //         // <a href='http://localhost/Eurasian%20Paradise%20Resort%20System/verify-email.php?token=$verify_token'> Click Me </a>";
    //         // //$msg = $emailbody . $otp;
    //         smtp_mailer($email,$verify_token,$subject);

    //         $_SESSION['message'] = "Registered Successfully. Check your email for verification.";
    //         header('Location: ../login.php');
    //     } else {
    //         $_SESSION['message'] = "Something went wrong";
    //         header('Location: ../registration.php');
    //     }
    // }
if(isset($_POST['login_btn'])) 
{
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    if (isset($_POST['remember'])) {
        $remember = $_POST['remember'];
    }

    $login_query = "SELECT * FROM users WHERE email = '$email' AND password = '$password' ";
    $login_query_run = mysqli_query($con, $login_query);

    // $result=mysqli_query($con,$login_query);
    // $row=mysqli_fetch_array($result);

    // if($row["role_as"]==0)
    // {
    //     $_SESSION['username'] = $name;
    //     $_SESSION['role_as'] = 0;
    //     header("Location: ../myProfile.php");
    // }
    // elseif($row["role_as"]==1)
    // {
    //     $_SESSION['username'] = $name;
    //     $_SESSION['role_as'] = 1;
    //     header("Location: ../myProfile.php");
    // }

    if (mysqli_num_rows($login_query_run) > 0) {
        $userdata = mysqli_fetch_array($login_query_run);
        $users_id = $userdata['id'];
        $username = $userdata['name'];
        $useremail = $userdata['email'];
        $usercontact = $userdata['contact'];
        $useraddress = $userdata['address'];
        $role_as = $userdata['role_as'];
        $status = $userdata['status']; 

        if ($status != 0) {
            // User is banned, prevent login
            $_SESSION['message'] = "Sorry, You Are Banned And Cannot Log In";
            header('Location: ../login.php');
        } else {
            $_SESSION['loggedinId'] = $users_id;
            $_SESSION['auth'] = true;
            $_SESSION['auth_user'] = [
                'name' => $username,
                'email' => $useremail,
                'contact' => $usercontact,
                'address' => $useraddress,
                'status' => $status
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
if (isset($_POST['editProfile_btn'])) {
    $name = $_REQUEST['name'];
    $contact = $_REQUEST['contact'];
    $address = $_REQUEST['address'];

    if ((!empty($name)) && (!empty($contact)) && (!empty($address))) {
        $users_id = $_SESSION['loggedinId'];
        $updateQuery = "UPDATE users SET name = '$name', contact = '$contact', address = '$address' WHERE id = '$users_id'";

        $updateQuery_run = mysqli_query($con, $updateQuery);

        if ($updateQuery_run) {
            $_SESSION['message'] = "Please Login Again. To See Changes!";
            header('Location: ../logout.php');
            exit; // Add exit to stop further execution

            // The code below won't be reached
            if ($updateQuery_run) {
                header('Location: ../login.php');
                exit; // Make sure to add exit here as well
            }
        } else {
            $_SESSION['message'] = "Error updating profile: " . mysqli_error($con);
            header('Location: ../myProfile.php');
            exit; // Make sure to add exit here as well
        }
    }
}
// {

// }
// $otp=rand(100000,999999);
// if (isset($_POST['editProfile_btn'])) {
//     if(isset($_SESSION['auth']))
//     {
//         $name = mysqli_real_escape_string($con, $_POST['name']);
//         $contact = mysqli_real_escape_string($con, $_POST['contact']);
//         $address = mysqli_real_escape_string($con, $_POST['address']);

//         // Assuming $_SESSION['auth'] contains the user's ID
//         $userId = $_SESSION['auth'];
        // $updateQuery = "UPDATE users SET name = '$name', contact = '$contact', address = '$address' WHERE id = $userId";

//         $updateQuery_run = mysqli_query($con, $updateQuery);

//         if ($updateQuery_run) {
//             $_SESSION['message'] = "Please Login Again. To See Changes!";
//             header('Location: ../myProfile.php');
//         } else {
//             $_SESSION['message'] = "Error updating profile: " . mysqli_error($con);
//             header('Location: ../myProfile.php');
//         }
//     }                
// }
if(isset($_POST['sendMessage_btn']))
{
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

}
if(isset($_POST['book_btn']))
{
    $user_id = mysqli_real_escape_string($con, $_POST['user_id']);
    $room_name = mysqli_real_escape_string($con, $_POST['room_name']);
    $book_name = mysqli_real_escape_string($con, $_POST['book_name']);
    $book_email = mysqli_real_escape_string($con, $_POST['book_email']);
    $book_address = mysqli_real_escape_string($con, $_POST['book_address']);
    $book_contact = mysqli_real_escape_string($con, $_POST['book_contact']);
    $book_persons = mysqli_real_escape_string($con, $_POST['book_persons']);
    $referenceNum = mysqli_real_escape_string($con, $_POST['referenceNum']);
    $book_date = mysqli_real_escape_string($con, $_POST['book_date']);
    $book_checkout = mysqli_real_escape_string($con, $_POST['book_checkout']);

    $insert_booking_query = "INSERT INTO booking (user_id,room_name,book_name,book_email,book_address,book_contact,book_persons,referenceNum,book_date,book_checkout)
                            VALUES('$user_id','$room_name','$book_name','$book_email','$book_address','$book_contact','$book_persons','$referenceNum','$book_date','$book_checkout')";
    
    $result = mysqli_query($con,$insert_booking_query);

    if($result)
    {
        header('Location: ../myBooking.php');    
    }
}

$receiverEmail=$email;

// echo smtp_mailer($receiverEmail,$subject,$emailbody);
function smtp_mailer($email,$verify_token,$subject){
	$mail = new PHPMailer(); 
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	//$mail->SMTPDebug = 2; 
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


