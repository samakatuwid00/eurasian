<?php 
include('index.php'); ?>
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
        background: rgba(128, 128, 128, 0.7);
        box-sizing: border-box;
        box-shadow: 0 15px 25px rgba(30, 56, 28, 0.6);
        border-radius: 10px;
        background-image: url('Images/image\ \(70\).jpg');
        background-size: cover; 
        background-repeat: no-repeat; 
    }
    .form input {
        width: 100%;
        padding: 10px 0; 
        font-size: 12px; 
        color: #fdfcfc;
        margin-bottom: 20px; 
        border: none;
        border-bottom: 1px solid #fff;
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
    input, textarea {
        color: white;
    }
    input::placeholder, textarea::placeholder {
        color: white;   
    }
        .close-icon {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 35px;
    cursor: pointer;
    color: white;
}
</style>

<div class="overlay" id="overlay"></div>
<div class="login-page">
    <div class="form">
    <span class="close-icon" id="close-login-form">×</span>
    <form class="login-form" action="functions/authcode.php" method="POST">
        <h2 style="color: white;"><i>Welcome to Eurasian!</i></h2>
        <input type="text" name="email" placeholder="Email" required />
        <input type="password" name="password" placeholder="Password" required />
        <button type="submit" name="login_btn" class="button">Log In</button>
        <p class="message">Not registered? <a href="registration.php">Create an account</a></p>
    </form> 
    </div>
</div>
<script>
    // JavaScript to close the register form
    document.getElementById("close-login-form").addEventListener("click", function () {
        document.querySelector(".login-page").style.display = "none";
    });
</script>

