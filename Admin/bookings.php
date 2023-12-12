<?php
include('../middleware/adminMiddleware.php');
include('includes/header.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card-header">
                <h4>All Booking</h4>
            </div>
            <div class="card-body" id="rooms_table">
                <div class="table-responsive"> <!-- Add this div for responsiveness -->
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Room Name</th>
                                <th>Address</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Persons</th>
                                <th>Reference Number</th>
                                <th>Check-In Date</th>
                                <th>Check-Out Date</th>
                                <th>Approved</th>
                                <th>Reject</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $booking = getAll("booking");

                            if (mysqli_num_rows($booking) > 0) {
                                foreach ($booking as $item) {
                                    ?>
                                    <tr>
                                        <td><?= $item['book_name']; ?></td>
                                        <td><?= $item['room_name']; ?></td>
                                        <td><?= $item['book_address']; ?></td>
                                        <td><?= $item['book_contact']; ?></td>
                                        <td><?= $item['book_email']; ?></td>
                                        <td><?= $item['book_persons']; ?></td>
                                        <td><?= $item['referenceNum']; ?></td>
                                        <td><?= $item['book_date']; ?></td>
                                        <td><?= $item['book_checkout']; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-success" value="<?= $item['book_id']; ?>">Approved</button>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-danger" value="<?= $item['book_id']; ?>">Reject</button>
                                        </td>
                                    </tr>
                                    <?php
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
</div>

<?php include('includes/footer.php'); ?>
