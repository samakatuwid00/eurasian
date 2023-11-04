<?php 

include('functions/userfunctions.php');
include('includes/header.php'); 

if(isset($_GET['rooms']))
    {      
        $rooms_slug = $_GET['rooms'];
        $rooms_data = getSlugActive("rooms",$rooms_slug);
        $rooms = mysqli_fetch_array($rooms_data);

        if($rooms)
        {
            ?>
            <div class="py-3 bg-primary">
                <div class="container2">
                    <h6 class="text-white"> 
                    <a href="index.php">
                        Home / 
                    </a>
                    <a href="categories.php">
                        Rooms / 
                    </a>
                    <?= $rooms['name']; ?></h6>                    
                </div>
            </div>
            <div class="bg-light py-4">
                <div class="container rooms_data mt-3">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="shadow">
                                <img src="Images/<?= $rooms['image']; ?>" alt="Rooms Image" class="w-100">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-19" style="text-align: right">
                                    <h4>PHP<span class="text-success fw-bold"> <?= $rooms['selling_price']; ?></span></h4>
                                <div class="col-md-19" style="text-align: left">
                                    <h6><b>Room Name:</b></h6>
                            <h4 class="gw-bold"><?= $rooms['name']; ?></h4>
                            <hr>
                            <p><?= $rooms['small_description']; ?></p>
                            <hr>
                            <h6><b>Rooms Description:</b></h6>
                            <p><?= $rooms['description'] ?></p>
                            <hr>
                        <div class="row mt-3">
                            <div class="col-md-3">
                                <label for="check-in">Check-in</label>
                                <input type="date" style="height: 45px" id="check-in" name="check-in" required>                                
                            </div>
                            <div class="col-md-3">
                                <label for="check-out">Check-out</label>
                                <input type="date" style="height: 45px" id="check-out" name="check-out" required>
                            </div>
                            <?php
                            // Check if the user is logged in
                            if (isset($_SESSION['auth']) && $_SESSION['auth']) {
                                // User is logged in, display the "Check Availability" button
                                echo '<div class="col-md-3 custom-right-align">
                                        <label for="check-now">Check Availability</label>
                                        <button type="button" class="btn btn-primary">Check Now</button>
                                    </div>';
                            } else {
                                // User is not logged in, display a different button
                                echo '<div class="col-md-3 custom-right-align">
                                        <label for="login-now">Check Availability</label>
                                        <a href="login.php" class="btn btn-primary">Check Now</a>
                                    </div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <?php
        }
        else
        {
            echo "Rooms Not Found";
        }
    }   
else 
{
    echo "Something Went Wrong";
}

?>
<style>
    .container2 h6 {
    padding: 3px;
    font-size: 17px;
    margin-left: 20px;
    }
    .container2 h6 a {
    text-decoration: none; 
    color: #ffffff; 
    }   
    .container1 {
        padding: 20px;
    }
    .container {
        padding: 20px;
    }
    .card {
        border: 1px solid #ccc;
        border-radius: 5px;
        margin: 0px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        background-color: #fff; 
    }
    .card-body {
        padding: 20px;
    }

    .card img {
        max-width: 100%;
        height: auto;
    }
    h4 {
        font-size: 20px;
    }
    .custom-right-align {
        text-align: end;
    }
</style>
