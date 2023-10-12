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
    .register-page {
        width: 500px; /* Reduced width */
        margin: auto;
    }
    .form {
        position: fixed;
        text-align: center;
        top: 50%;
        left: 50%;
        width: 350px; /* Reduced width */
        padding: 20px; /* Reduced padding */
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
        padding: 10px 0; /* Reduced padding */
        font-size: 12px; /* Reduced font size */
        color: #fdfcfc;
        margin-bottom: 20px; /* Reduced margin */
        border: none;
        border-bottom: 1px solid #fff;
        outline: none;
        background: transparent;
    }
    .form .message {
        margin: 20px 0 0; /* Reduced margin */
        color: #f2ebeb;
        font-size: 13px; /* Reduced font size */
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
    .button {
        position: relative;
        display: inline-block;
        padding: 10px 20px;
        color: #289bb8;
        font-size: 14px;
        text-decoration: none;
        border: 2px solid #289bb8; /* Add border */
        border-radius: 5px;
        background-color: transparent; /* Transparent background */
        transition: .5s;
        margin-top: 15px;
        letter-spacing: 2px;
        overflow: hidden;
        cursor: pointer; /* Add cursor pointer */
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
</style>

<div class="overlay" id="overlay"></div>
<div class="register-page">
    <div class="form">
        <form class="register-form" action="functions/authcode.php" method="POST">
            <h2 style="color: white;">Register</h2>
            <?php
            if (isset($_SESSION['message'])) {
                ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']; ?>.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                unset($_SESSION['message']);
            }
            ?>
            <input type="text" name="name" placeholder="Name *" required />
            <input type="email" name="email" placeholder="Email *" required />
            <input type="number" name="contact" placeholder="Phone Number *" required />
            <input type="address" name="address" placeholder="Address *" required />
            <input type="password" name="password" placeholder="Password *" required />
            <input type="password" name="confirmPass" placeholder="Confirm Password *" required />

            <button type="submit" name="register_btn" class="button">Create</button>
            <p class="message">Already registered? <a href="login.php">Sign In</a></p>
        </form>
    </div>
</div>
