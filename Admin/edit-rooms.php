<?php 

include('../middleware/adminMiddleware.php'); 
include('includes/header.php'); 

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
                if(isset($_GET['id']))
                {
                    $id = $_GET['id'];

                    $rooms = getByID("rooms", $id);

                    if(mysqli_num_rows($rooms) > 0)
                    {
                        $data = mysqli_fetch_array($rooms);
                        ?>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Edit Room
                                        <a href="rooms.php" class="btn btn-primary float-end">Back</a>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <form action="code.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="mb-0" for="name">Category</label class="mb-0">
                                                <select name="category_id" class="form-select mb-2" required>
                                                    <option selected>Select Category</option>                                    
                                                    <?php   
                                                        $categories = getAll("categories");
        
                                                        if(mysqli_num_rows($categories) > 0)
                                                        {
                                                            foreach ($categories as $item)
                                                            {
                                                                ?>
                                                                <option value="<?= $item['id']; ?>"<?=$data['category_id'] == $item['id']? 'selected':'' ?> ><?= $item['name']; ?></option>
                                                                <?php
                                                            }
                                                        }
                                                        else
                                                        {
                                                            echo "No category available";
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <input type="hidden" name="rooms_id" value="<?= $data['id']; ?>">
                                            <div class="col-md-6">
                                                <label class="mb-0">Name</label class="mb-0">
                                                <input type="text" required name="name" value="<?= $data['name']; ?>" placeholder="Enter Room Name" class="form-control mb-2">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="mb-0">Slug</label class="mb-0">
                                                <input type="text" required name="slug" value="<?= $data['slug']; ?>" placeholder="Enter Slug" class="form-control mb-2">
                                            </div>
                                            <div class="col-md-12">
                                                <label class="mb-0">Small Description</label class="mb-0">
                                                <textarea rows="3" required name="small_description" placeholder="Enter small description" class="form-control mb-2"><?= $data['small_description']; ?></textarea>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="mb-0">Description</label class="mb-0">
                                                <textarea rows="3" required name="description" placeholder="Enter description" class="form-control mb-2"><?= $data['description']; ?></textarea>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="mb-0">Price</label class="mb-0">
                                                <input type="text" required name="selling_price" value="<?= $data['selling_price']; ?>" placeholder="Selling Price" class="form-control mb-2">
                                            </div>
                                            <div class="col-md-12">
                                                <label class="mb-0">Upload Image</label class="mb-0">
                                                <input type="hidden" name="old_image" value="<?= $data['image']; ?>" >
                                                <input type="file" name="image" class="form-control mb-2">
                                                <label class="mb-0">Current Image</label>
                                                <img src=" ../Images/<?= $data['image']; ?>" alt="Rooms Image" height="50px" width="50px">
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="mb-0">Quantity</label class="mb-0">
                                                    <input type="number" required name="qty" value="<?= $data['qty']; ?>" placeholder="Enter Quantity" class="form-control mb-2">
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="mb-0">Status</label class="mb-0"><br>
                                                    <input type="checkbox" name="status" <?= $data['status'] == '0'?'':'checked' ?>>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="mb-0">Trending</label class="mb-0"><br>
                                                    <input type="checkbox" name="trending" <?= $data['trending'] == '0'?'':'checked' ?>> 
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="mb-0">Meta Title</label class="mb-0">
                                                <input type="text" required name="meta_title" value="<?= $data['meta_title']; ?>" placeholder="Enter Meta Title" class="form-control mb-2">
                                            </div>
                                            <div class="col-md-12">
                                                <label class="mb-0">Meta Description</label class="mb-0">
                                                <input type="text" required name="meta_description" value="<?= $data['meta_description']; ?>" placeholder="Enter Meta Description" class="form-control mb-2">
                                            </div>
                                            <div class="col-md-12">
                                                <label class="mb-0">Meta Keywords</label class="mb-0">
                                                <textarea rows="3" required name="meta_keywords" placeholder="Enter Meta Keywords" class="form-control mb-2"><?= $data['meta_keywords']; ?></textarea>
                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary" name="update_rooms_btn">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        <?php    
                    }
                    else
                    {
                        echo "Rooms Not Found For Given ID";
                    }        
                }
            else
            {
                echo "Id missing from url";
            }
            ?>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
