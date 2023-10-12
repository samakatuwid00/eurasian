<!-- Navigation Bar -->
<div class="navbar">
    <div class="navbar-logo">Eurasian Paradise Resort</div>
        <ul class="navbar-menu" id="navLinks">
            <span class="material-symbols-outlined" onclick="hideMenu()"> close </span>                    
                <li><a class="navbar-menu-item" href="index.php">Home</a></li>
                <li><a class="navbar-menu-item" href="#">Our Rooms</a></li>
                <li><a class="navbar-menu-item" href="#">Services</a></li>
                <li><a class="navbar-menu-item" href="#">About Us</a></li>
                <li><a class="navbar-menu-item" href="#">Contact</a></li>
                
    <div class="navbar-cta-container">
        <?php
        if(isset($_SESSION['auth']))
        {
            ?>
            <div class="btn-group">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <?=$_SESSION['auth_user']['name']; ?>
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another</a></li>
                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            </ul>
            </div>            
            <?php
        }                
        else 
        {
        ?>
            <a href="login.php" class="btn btn-primary navbar-cta-login">Login</a>
            <a href="registration.php" class="btn btn-primary navbar-cta-register">Register</a>
        </ul>
        <?php
        }
        ?>
        <span class="material-symbols-outlined" onclick="showMenu()"> menu </span>
    </div>
</div>
<script>
    var navLinks = document.getElementById("navLinks");
    function showMenu() {
        navLinks.style.right = "0";
    }
    function hideMenu() {
        navLinks.style.right = "-200px";
    }
</script>
</body>
