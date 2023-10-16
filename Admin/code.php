<?php

include('../config/dbcon.php');
include('../functions/myfunctions.php');

if(isset($_POST['add_categories_btn']))
{
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset ($_POST['status']) ? '1':'0';
    $popular = isset ($_POST['popular']) ? '1':'0';

    $image = $_FILES['image']['name'];

    $path = "../Images";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'-'.$image_ext;

    $cate_query = "INSERT INTO categories (name,slug,description,meta_title,meta_description,meta_keywords,status,popular,image)
    VALUES ('$name','$slug','$description','$meta_title','$meta_description','$meta_keywords','$status','$popular','$filename')";

    $cate_query_run = mysqli_query($con, $cate_query);
    
    if($cate_query_run)
    {
        move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);

        redirect("add-categories.php", "Added Succesfully");
    }
    else 
    {
        redirect("add-categories.php", "Something Went Wrong");
    }
}
else if(isset($_POST['update_category_btn']))
{
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset ($_POST['status']) ? '1':'0';
    $popular = isset ($_POST['popular']) ? '1':'0';

    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if($new_image != "")
    {
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time().'.'.$image_ext;    
    }
    else
    {
        $update_filename = $old_image;
    }
    $path = "../Images";

    $update_query = "UPDATE categories SET name='$name', slug='$slug', description='$description', 
    meta_title='$meta_title', meta_description='$meta_description', meta_keywords='$meta_keywords',
    status='$status', popular='$popular', image='$update_filename' WHERE id='$category_id' ";

    $update_query_run = mysqli_query($con, $update_query);
    
    if($update_query_run)
    {
        if($_FILES['image']['name'] != "")
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$update_filename);
            if(file_exists("../Images/" .$old_image))
            {
                unlink("../Images/".$old_image);
            }
        }    
        redirect("edit-category.php?id=$category_id", "Category Updated Successfully");
    }
    else
    {
        redirect("edit-category.php?id=$category_id", "Something Went Wrong");
    }
}
else if(isset($_POST['delete_category_btn']))
{
    $category_id = mysqli_real_escape_string($con, $_POST['category_id']);

    $category_query= "SELECT * FROM categories WHERE id='$category_id'";
    $category_query_run = mysqli_query($con, $category_query);
    $category_data = mysqli_fetch_array($category_query_run); 
    $image = $category_data['image'];

    $delete_query = "DELETE FROM categories WHERE id='$category_id' ";
    $delete_query_run = mysqli_query($con, $delete_query);

    if($delete_query_run)
    {
        if(file_exists("../Images/" .$image))
        {
            unlink("../Images/".$image);
        }

        // redirect("category.php", "Category Deleted Succesfully");
        echo 200;
    }
    else
    {
        // redirect("category.php", "Something Went Wrong" );
        echo 500;
    }
}
else if(isset($_POST['add_rooms_btn']))
{
     
    $category_id = $_POST['category_id'];

    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $small_description = $_POST['small_description'];
    $description = $_POST['description'];
    $selling_price = $_POST['selling_price'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset ($_POST['status']) ? '1':'0';
    $trending = isset ($_POST['trending']) ? '1':'0';

    $image = $_FILES['image']['name'];

    $path = "../Images";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'-'.$image_ext;

    if($name != "" && $slug !="" && $description != "")
    {
        $rooms_query= "INSERT INTO rooms (category_id, name, slug, small_description, description, selling_price,
        meta_title, meta_description, meta_keywords, status, trending, image) VALUES ('$category_id', '$name', '$slug',
        '$small_description', '$description', '$selling_price', '$meta_title', '$meta_description', '$meta_keywords',
        '$status', '$trending', '$filename')";
    
        $rooms_query_run = mysqli_query($con, $rooms_query);
    
        if($rooms_query_run)
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename); 
    
            redirect("add-rooms.php", "Category Added Successfully");
        }
        else
        {
            redirect("add-rooms.php", "Something Went Wrong");
        }
    }
    else
    {
        redirect("add-rooms.php", "All Fields Are Mandatory");
    }
}
else if (isset($_POST['update_rooms_btn']))
{
    $rooms_id = $_POST['rooms_id'];
    $category_id = $_POST['category_id'];

    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $small_description = $_POST['small_description'];
    $description = $_POST['description'];
    $selling_price = $_POST['selling_price'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset ($_POST['status']) ? '1':'0';
    $trending = isset ($_POST['trending']) ? '1':'0';

    $image = $_FILES['image']['name'];

    $path = "../Images";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'-'.$image_ext;

    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if($new_image != "")
    {
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time().'.'.$image_ext;    
    }
    else
    {
        $update_filename = $old_image;
    }

    $update_rooms_query = "UPDATE rooms SET name='$name',slug='$slug',small_description='$small_description',
    description='$description',selling_price='$selling_price',meta_title='$meta_title',
    meta_description='$meta_description',meta_keywords='$meta_keywords',status='$status',trending='$trending',
    image='$update_filename' WHERE id='$rooms_id'";
    $update_rooms_query_run = mysqli_query($con, $update_rooms_query);


if($update_rooms_query_run)
    {
        if($_FILES['image']['name'] != "")
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$update_filename);
            if(file_exists("../Images/" .$old_image))
            {
                unlink("../Images/".$old_image);
            }
        }    
        redirect("edit-rooms.php?id=$rooms_id", "Rooms Updated Successfully");
    }
    else
    {
        redirect("edit-rooms.php?id=$rooms_id", "Something Went Wrong");
    }
}
else if (isset($_POST['delete_rooms_btn']))
{
    $rooms_id = mysqli_real_escape_string($con, $_POST['rooms_id']);

    $rooms_query= "SELECT * FROM rooms WHERE id='$rooms_id'";
    $rooms_query_run = mysqli_query($con, $rooms_query);
    $rooms_data = mysqli_fetch_array($rooms_query_run); 
    $image = $rooms_data['image'];

    $delete_query = "DELETE FROM rooms WHERE id='$rooms_id' ";
    $delete_query_run = mysqli_query($con, $delete_query);

    if($delete_query_run)
    {
        if(file_exists("../Images/".$image))
        {
            unlink("../Images/".$image);
        }

       // redirect("rooms.php", "Rooms Deleted Succesfully");
       echo 200;
    }
    else
    {
       // redirect("rooms.php", "Something Went Wrong!" );
        echo 500;
    }
}
else
{
    header('Location: ../index.php');
}
?>