<?php
include('functions/userfunctions.php');
include('includes/header.php');

// Assuming you have the user information stored in the session
$userId = $_SESSION['loggedinId'];

// Retrieve bookings for the current user
$sql = "SELECT * FROM `booking` WHERE `user_id` = $userId";
$result = mysqli_query($con, $sql);

?>
<style>
    body, h1, h2, h3, p, table {
        margin: 0;
        padding: 0;
    }

    body {
        font-family: 'Arial', sans-serif;
        background-color: #f2f2f2;
    }

    h3 {
        text-align: center;
        color: #007bff;
    }

    .containerMyBooking {
        max-width: 95%;
        margin: 20px auto;
        background-color: #fff;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .table {
        width: 100%;
        margin-top: 20px;
        border-collapse: collapse;
    }

    .table th, .table td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .table th {
        background-color: #f2f2f2;
    }

    .table tbody tr:hover {
        background-color: #f5f5f5;
    }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bookings</title>
</head>
<body>
    <div class="containerMyBooking">
        <h3>My Bookings</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Transaction Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Contact</th>
                    <th>Persons</th>
                    <th>Reference Number</th>
                    <th>Check-In Date</th>
                    <th>Check-Out Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Display the bookings
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['book_name'] . "</td>";
                    echo "<td>" . $row['book_email'] . "</td>";
                    echo "<td>" . $row['book_address'] . "</td>";
                    echo "<td>" . $row['book_contact'] . "</td>";
                    echo "<td>" . $row['book_persons'] . "</td>";
                    echo "<td>" . $row['referenceNum'] . "</td>";
                    echo "<td>" . $row['book_date'] . "</td>";
                    echo "<td>" . $row['book_checkout'] . "</td>";
                    echo "</tr>";
                }

                // If no bookings found
                if (mysqli_num_rows($result) == 0) {
                    echo "<tr><td colspan='8'>No bookings found for the current user.</td></tr>";
                }

                // Close the database connection
                mysqli_close($con);
                ?>
            </tbody>        </table>
    </div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
