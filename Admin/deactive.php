<?php
include ('../config/dbcon.php');
include('../functions/myfunctions.php');

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($con, $_GET['id']);

    $deleteQuery = "DELETE FROM notifications WHERE id = $id";

    if (mysqli_query($con, $deleteQuery)) {
        redirect("index.php", "Message Deleted Successfully");
    } else {
        redirect("index.php", "Error Deleting Message");
    }
    mysqli_close($con);
} else {
    echo "Invalid request";
}
?>
