<?php 

include('../middleware/adminMiddleware.php'); 
include('includes/header.php'); 

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Room</h4>
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
                                                <option value="<?= $item['id']; ?>"><?= $item['name']; ?></option>
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
                            <div class="col-md-6">
                                <label class="mb-0">Name</label class="mb-0">
                                <input type="text" required name="name" placeholder="Enter Room Name" class="form-control mb-2">
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">Slug</label class="mb-0">
                                <input type="text" required name="slug" placeholder="Enter Slug" class="form-control mb-2">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Small Description</label class="mb-0">
                                <textarea rows="3" required name="small_description" placeholder="Enter small description" class="form-control mb-2"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Description</label class="mb-0">
                                <textarea rows="3" required name="description" placeholder="Enter description" class="form-control mb-2"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">Price</label>
                                <input type="number" required name="selling_price" value="<?= isset($data['selling_price']) ? $data['selling_price'] : ''; ?>" placeholder="Selling Price" class="form-control mb-2">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Upload Image</label>
                                <input type="file" required name="image" class="form-control mb-2">
                                <!-- <label class="mb-0">Current Image</label>
                                <img src="../Images/<?= isset($data['image']) ? $data['image'] : ''; ?>" alt="Rooms Image" height="50px" width="50px"> -->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="mb-0">Quantity</label class="mb-0">
                                    <input type="number" required name="qty" placeholder="Enter Quantity" class="form-control mb-2">
                                </div>
                                <div class="col-md-3">
                                    <label class="mb-0">Status</label class="mb-0"><br>
                                    <input type="checkbox" name="status">
                                </div>
                                <div class="col-md-3">
                                    <label class="mb-0">Trending</label class="mb-0"><br>
                                    <input type="checkbox" name="trending">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Meta Title</label class="mb-0">
                                <input type="text" required name="meta_title" placeholder="Enter Meta Title" class="form-control mb-2">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Meta Description</label class="mb-0">
                                <input type="text" required name="meta_description" placeholder="Enter Meta Description" class="form-control mb-2">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Meta Keywords</label class="mb-0">
                                <textarea rows="3" required name="meta_keywords" placeholder="Enter Meta Keywords" class="form-control mb-2"></textarea>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="add_rooms_btn">Add Room</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
