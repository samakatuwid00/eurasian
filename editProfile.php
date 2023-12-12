<?php 
include('index.php'); 
if(isset($_SESSION['auth']))
{
    ?>
    <div class="overlay" id="overlay">
        <div class="register-page">
            <div class="form">
                <span class="close-icon" id="close-register-form">×</span>
                <form action="functions/authcode.php" method="POST" enctype="multipart/form-data">
                <?php
                if (isset($_SESSION['message'])) {
                    ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <?= $_SESSION['message']; ?>.
                        <button type="submit" name="register_btn" class="button">Create</button>
                    </div>                
                        <?php
                    unset($_SESSION['message']);
                }
                ?>
                <h2 style="color: black;">My Profile</h2>
                <p style="color: red;">Note: Your email address and status cannot be changed.</p>
                <div class="row">
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text" name="name" required>
                        <label for="name">Name:</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="call-outline"></ion-icon>
                        <input type="text" name="contact" required>
                        <label for="contact">Phone Number:</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="location-outline"></ion-icon>
                        <input type="text" name="address" required>
                        <label for="address">Address:</label>
                    </div>
                    <button type="submit" name="editProfile_btn" class="button">Confirm</button>
                </div>
            </div>
        </div>
    </div>
<?php
    } 
?>
<script>
    // JavaScript to close the register form
    document.getElementById("close-register-form").addEventListener("click", function () 
    {
        document.querySelector(".register-page").style.display = "none";
        document.querySelector(".overlay").style.display = "none";
    });
</script>
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
        background: rgba(255, 255, 255, 0.8);
        box-sizing: border-box;
        box-shadow: 0 15px 25px rgba(30, 56, 28, 0.6);
        border-radius: 10px;
        background-size: cover; 
        background-repeat: no-repeat; 
    }
    .form .message {
        margin: 20px 0;
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
    .button {
        width: 40%;
        position: relative;
        display: inline-block;
        padding: 10px 20px;
        color: #289bb8;
        font-size: 14px;
        text-decoration: none;
        border: 2px solid #289bb8;
        border-radius: 5px;
        background-color: transparent;
        transition: 0.5s;
        margin-top: 15px;
        letter-spacing: 2px;
        overflow: hidden;
        cursor: pointer;
        margin-left: auto;
        margin-right: auto;
    }
    .button:hover {
        background: #289bb8;
        color: #dae3e8;
    }
    input, textarea {
        color: black;
    }
    input::placeholder, textarea::placeholder {
        color: black;
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
    .inputbox {
        position: relative;
    }
    .inputbox ion-icon {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        right: 8px;
        color: #289bb8;
        font-size: 15px;
    }
    .inputbox input {
        width: 100%;
        height: 60px;
        color: black;
        background: transparent;
        border: none;
        outline: none;
        font-size: 14px;
        border-bottom: 1px solid black;
        padding: 10px 0;
        font-size: 12px;
        margin-bottom: 5px;
    }
    .inputbox label {
        font-weight: bolder;
        color: black;
        position: absolute;
        top: 50%;
        left: 10px;
        transform: translateY(-50%);
        font-size: 15px;
        pointer-events: none;
        transition: .5s;
    }
    input:focus ~ label,
    input:valid ~ label{
        top: 8px;
    }
    

</style>
