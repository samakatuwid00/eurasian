<?php 

include('includes/header.php'); 
include('../middleware/adminMiddleware.php'); 

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card-header">
                <h4>All Rooms</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $rooms = getAll("rooms");

                        if(mysqli_num_rows($rooms) > 0)
                        {
                            foreach($rooms as $item) 
                            {
                                ?>
                                    <tr>
                                        <td><?= $item['id']; ?></td>
                                        <td><?= $item['name']; ?></td>
                                        <td>
                                            <img src= "../Images/<?= $item['image']; ?>" width = "50px" height="50px" alt="<?= $item['name']; ?>">
                                        </td>
                                        <td>
                                            <?= $item['status'] == '0'? "Visible":"Hidden"?>
                                        </td>

                                        <td>
                                            <a href="edit-rooms.php?id=<?= $item['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                        </td>
                                        <td>
                                            <form action="code.php" method="POST">
                                                <input type="hidden" name="room_id" value="<?= $item['id']; ?>">
                                                <button type="submit" class="btn btn-sm btn-danger" name="delete-category_btn">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php
                            }
                        }
                        else
                        {
                            echo "No records found";
                        }
                                ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
