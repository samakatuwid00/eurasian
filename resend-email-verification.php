<?php
include('index.php');
?>
<style>
    html {
        height: 100%;
    }
    body {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
        background-size: cover;
    }
    .login-page {
        width: 500px;
        margin: auto;
    }
    .form {
        position: fixed;
        text-align: center;
        top: 50%;
        left: 50%;
        width: 350px;
        padding: 20px;
        transform: translate(-50%, -50%);
        background: rgba(255, 255, 255, 0.8); /* Slightly darker background */
        box-sizing: border-box;
        box-shadow: 0 15px 25px rgba(30, 56, 28, 0.6);
        border-radius: 10px;
        background-size: cover;
        background-repeat: no-repeat;
    }
    .form input {
        width: 100%;
        padding: 10px 0;
        font-size: 12px;
        color: black; /* Set the text color to black */
        margin-bottom: 20px;
        border: none;
        border-bottom: 1px solid black; 
        outline: none;
        background: transparent;
    }
    .form textarea {
        width: 100%;
        padding: 10px;
        font-size: 12px;
        color: black; 
        margin-bottom: 20px;
        border: 1px solid black; 
        outline: none;
        background: transparent;
    }    
    .form .message {
        margin: 20px 0 0; 
        color: #f2ebeb;
        font-size: 13px; 
    }
    .form .message a {
        color: #34bcde;
        text-decoration: none;
        position: relative;
        transition: border-color 0.3s;
    }
    .form .message a:hover {
        border-bottom: 1px solid #34bcde;
    }
    .form .register-form {
        display: none;
    }
    .button {
        position: relative;
        display: inline-block;
        padding: 10px 20px;
        color: #289bb8;
        font-size: 14px;
        text-decoration: none;
        border: 2px solid #289bb8; 
        border-radius: 5px;
        background-color: transparent; 
        transition: .5s;
        margin-top: 15px;
        letter-spacing: 2px;
        overflow: hidden;
        cursor: pointer; 
    }
    .button:hover {
        background: #289bb8;
        color: #dae3e8;
    } 
    .close-icon {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 35px;
        cursor: pointer;
        color: black;
        transition: color 0.3s; /* Add the transition property for color change */
    }
    .close-icon:hover {
        color: red; /* Change the color when hovered */
    }
    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
    }
    .remember-forget {
        display: flex;  /* Use flexbox for layout */
        justify-content: space-between; /* Separate them with space */
        align-items: left; /* Vertically center align */
    }
    .remember-forget label {
        display: flex;
        align-items: center;
    }
    .inputbox {
        position: relative;
    }
    .inputbox ion-icon {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        right: 8px;
        color: #289bb8;
        font-size: 1.2em;
    }
    input:focus ~ label
    input:focus ~ :valid {
        top:-5;
    }
    .remember-forget a {
        color: #34bcde;
        text-decoration: underline;
        position: relative;
        transition: border-color 0.3s;
    }
    .inputbox label {
        font-weight: bolder;
        color: black;
        position: absolute;
        top: 50%;
        left: 5px;
        transform: translateY(-50%);
        font-size: 1em;
        pointer-events: none;
        transition: .5s;
    }
    input:focus ~ label,
    input:valid ~ label{
        top: -1px;
    }
    .inputbox input {
        width: 100%;
        height: 50px;
        color: black;
        background: transparent;
        border: none;
        outline: none;
        font-size: 1em;
        padding:0 35px 0 5px;
        border-bottom: 1px solid black; 
    }
</style>

<div class="overlay" id="overlay"></div>
<div class="login-page">
    <div class="form">
        <?php
            if(isset($_SESSION['status']))
            {
                ?>
                <div class = "alert alert-success">
                    <h5><?= $_SESSION['status']; ?></h5>
                </div>
                <?php
                unset($_SESSION['status']);
            }
        ?>
        <span class="close-icon" id="close-login-form">×</span>
        <form class="login-form" action="functions/verification.php" method="POST">
            <h2 style="color: black;"><i>Resend Email Verification</i></h2>
            <div class="inputbox">
                <ion-icon name="mail-outline"></ion-icon>
                <input type="text" name="email" id="email" value="<?php if (!empty($email)) { echo $email; } elseif (isset($_COOKIE["remember_email"])) { echo $_COOKIE["remember_email"]; } ?>" required>
                <label for="">Email</label>
            </div>
            <button type="submit" name="resend_email_verify_btn" class="button">Submit</button>
            <p class="message" style = "color: black">Not registered? <a href="registration.php">Create an account</a></p>
        </form> 
    </div>
</div>
<script>
    // JavaScript to close the register form
    document.getElementById("close-login-form").addEventListener("click", function () 
    {
        document.querySelector(".login-page").style.display = "none";
        document.querySelector(".overlay").style.display = "none";
    });
</script>

