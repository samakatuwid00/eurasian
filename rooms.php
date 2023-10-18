<?php 

include('functions/userfunctions.php');
include('includes/header.php'); 

$category_slug = $_GET['categories'];
$category_data = getSlugActive("categories",$category_slug);
$category = mysqli_fetch_array($category_data);
$cid = $category['id'];

?>
<style>
    .container2 h6 {
    padding: 3px;
    font-size: 17px;
    margin-left: 20px;
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
        <h6 class="text-white">Home / Rooms /<?= $category['name']; ?></h6>
    </div>
</div>
<div class="py-5">
    <div class="container1">
        <div class="row">
            <div class="col-md-12">
                <div class = "row">
                    <?php 
                        $rooms = getRoomsByCategory($cid);

                        if(mysqli_num_rows($rooms) > 0)
                        {
                            foreach($rooms as $item)
                            {
                                ?>
                                    <div class ="col-md-4 mb-2">
                                        <a href="#">
                                            <div class="card">
                                                <div class="card-body">
                                                    <img src="Images/<?= $item['image']; ?>" alt="Room Image" class="w-100">
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