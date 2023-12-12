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
                                <h4>PHP<span class="text-success fw-bold"> <?= $rooms['selling_price']; ?></span> per night</h4>
                            <div class="col-md-19" style="text-align: left">
                                <h6><b>Room Name:</b></h6>
                        <h4 class="gw-bold"><?= $rooms['name']; ?></h4>
                        <hr>
                        <p><?= $rooms['small_description']; ?></p>
                        <hr>
                        <h6><b>Rooms Description:</b></h6>
                        <p><?= $rooms['description'] ?></p>
                        <hr>
                        <?php
                        // Check if the user is logged in
                        if (isset($_SESSION['auth']) && $_SESSION['auth']) {
                            // User is logged in, display the "Check Availability" button to the left
                            echo '<div class="row">
                                    <div class="col-md-19" style="text-align: right">
                                        <a href="bookNow.php?room_name=' . urlencode($rooms['name']) . '" class="btn btn-primary" id="book-now">Book Now!</a>
                                    </div>';
                        } else {
                            // User is not logged in, display a different button to the left
                            echo '<div class="row">
                                    <div class="col-md-19" style="text-align: right">
                                        <a href="login.php" class="btn btn-primary">Book Now!</a>
                                    </div>
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
    position: relative;
    margin-top: -50px;
    padding: 20px;
    background-color: #f3f3f3;
    border-radius: 20px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    display: flex;
    justify-content: center;
    align-items: center;    }
h4 {
    font-size: 20px;
}
</style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

