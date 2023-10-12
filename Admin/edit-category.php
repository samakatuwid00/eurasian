<?php 
include('includes/header.php'); 
include('../middleware/adminMiddleware.php'); 
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
                $category = getByID("categories", $id);

                if(mysqli_num_rows($category) > 0)
                {
                    $data = mysqli_fetch_array($category);
                    ?>
                        <div class="card">
                    <div class="card-header">
                        <h4>Edit Category</h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="hidden" name="category_id" value="<?= $data['id']?>">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" value="<?= $data['name']?>" placeholder="Enter Category Name" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="slug">Slug</label>
                                    <input type="text" name="slug" value="<?= $data['slug']?>" id="slug" placeholder="Enter Slug" class="form-control">
                                </div>
                                <div class="col-md-12">
                                    <label for="description">Description</label>
                                    <textarea rows="3" name="description" id="description" placeholder="Enter Description" class="form-control"><?= $data['description']?></textarea>
                                </div>
                                <div class="col-md-12">
                                    <label for="image">Upload Image</label>
                                    <input type="file" name="image" id="image" class="form-control">
                                    <label for="image">Current Image</label>
                                    <input type="hidden" name="old_image" value="<?= $data['image']?>">
                                    <img src="../Images/<?= $data['image']?>" height="50px" width="50px" alt="">
                                </div>
                                <div class="col-md-12">
                                    <label for="meta_title">Meta Title</label>
                                    <input type="text" name="meta_title" value="<?= $data['meta_title']?>" id="meta_title" placeholder="Enter Meta Title" class="form-control">
                                </div>
                                <div class="col-md-12">
                                    <label for="meta_description">Meta Description</label>
                                    <textarea rows="3" name="meta_description" id="meta_description" placeholder="Enter Meta Description" class="form-control"><?= $data['meta_description']?></textarea>
                                </div>
                                <div class="col-md-12">
                                    <label for="meta_keywords">Meta Keywords</label>
                                    <textarea rows="3" name="meta_keywords" id="meta_keywords" placeholder="Enter Meta Keywords" class="form-control"><?= $data['meta_description']?></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label for="status">Status</label>
                                    <input type="checkbox" <?=$data['status'] ? "checked":"" ?> name="status" id="status">
                                </div>
                                <div class="col-md-6">
                                    <label for="popular">Popular</label>
                                    <input type="checkbox" <?=$data['popular'] ? "checked":"" ?> name="popular" id="popular">
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary" name="update_category_btn">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                        </div>
                    <?php
                }
                else
                {
                    echo "Category not found";
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
