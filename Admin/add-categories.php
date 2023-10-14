<?php 
include('includes/header.php'); 
include('../middleware/adminMiddleware.php'); 
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Room Category</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" placeholder="Enter Category Name" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="slug">Slug</label>
                                <input type="text" name="slug" id="slug" placeholder="Enter Slug" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="description">Description</label>
                                <textarea rows="3" name="description" id="description" placeholder="Enter Description" class="form-control"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="image">Upload Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="meta_title">Meta Title</label>
                                <input type="text" name="meta_title" id="meta_title" placeholder="Enter Meta Title" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="meta_description">Meta Description</label>
                                <input type="text" name="meta_description" id="meta_description" placeholder="Enter Meta Description" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="meta_keywords">Meta Keywords</label>
                                <textarea rows="3" name="meta_keywords" id="meta_keywords" placeholder="Enter Meta Keywords" class="form-control"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="status">Status</label>
                                <input type="checkbox" name="status" id="status">
                            </div>
                            <div class="col-md-6">
                                <label for="popular">Popular</label>
                                <input type="checkbox" name="popular" id="popular">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="add_categories_btn">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
