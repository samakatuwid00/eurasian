<?php
include('../middleware/adminMiddleware.php');
include('includes/header.php');

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card-header">
                <h4>All Users</h4>
            </div>
            <div class="card-body" id="rooms_table">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Ban</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $users = getAll("users");

                        if (mysqli_num_rows($users) > 0) {
                            foreach ($users as $item) {
                                if ($item['role_as'] != 1) {
                                    ?>
                                    <tr>
                                        <td><?= $item['id']; ?></td>
                                        <td><?= $item['name']; ?></td>
                                        <td><?= $item['email']; ?></td>
                                        <td><?= $item['contact']; ?></td>
                                        <td><?= $item['address']; ?></td>
                                        <td><?= $item['status'] == '0' ? "Active" : "Banned" ?></td>
                                        <td>
                                            <?php if ($item['status'] == '0') { ?>
                                                <button type="button" class="btn btn-sm btn-danger ban_users_btn" value="<?= $item['id']; ?>">Ban</button>
                                            <?php } elseif ($item['status'] != '0') { ?>
                                                <button type="button" class="btn btn-sm btn-success unban_users_btn" value="<?= $item['id']; ?>">Unban</button>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                        } else {
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
