<?php 

include('functions/userfunctions.php');
include('includes/header.php'); 

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
</style>
<div class="py-3 bg-primary">
    <div class="container2">
        <h6 class="text-white"> 
        <a href="index.php">
            Home / 
        </a>
        <a href="categories.php">
            Rooms / 
        </a></h6>
    </div>
</div>
<div class="py-3">
    <div class="container1">
        <div class="row">
            <div class="col-md-12">
                <h2>Our Rooms</h2>
                <div class = "row">
                    <?php 
                        $categories = getAllActive("categories");

                        if(mysqli_num_rows($categories) > 0)
                        {
                            foreach($categories as $item)
                            {
                                ?>
                                    <div class ="col-md-3 mb-2">
                                        <a href="rooms.php?categories=<?= $item['slug']; ?>">
                                            <div class="card shadow">
                                                <div class="card-body">
                                                    <img src="Images/<?= $item['image']; ?>" alt="Category Image" class="w-100">
                                                    <h4 class ="text-center"><?= $item['name']; ?></h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php
                            }
                        }
                        else
                        {
                            echo "No data available";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

