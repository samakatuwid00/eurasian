<?php
include('functions/userfunctions.php');
include('includes/header.php'); 

$roomName = isset($_GET['room_name']) ? htmlspecialchars($_GET['room_name']) : '';
?>
<title>Book Now</title>
<style>
    body {
        overflow: hidden;
        height: 100vh;
        margin: 0; /* Reset default margin */
        font-family: Arial, sans-serif; /* Set a generic font family */
    }
    .container {
        top: 28%;
        display: flex;
        height: 50vh;
        background-color: #f3f8fa;
    }
    .bookContainer
    {
        flex: 1;
        padding: 20px;
        box-sizing: border-box;
    }
    .bookContainerSide {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        flex: 1;
        padding: 20px;
        box-sizing: border-box;
        background-color: #fff;
    }
    .bookContainer {
        background-color: #f3f8fa;
        text-align: center;
    }
    .bookContainer img {
        max-width: 80%;
        height: auto;
        margin-bottom: 20px;
    }
    h3 {
        text-align: center;
        color: #007bff;
    }
    .form-group {
        margin-bottom: 10px;
    }
    form {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
    }
    .mb-3 {
        margin-bottom: 15px;
        width: 100%;
    }
    .form-control {
        width: 100%;
        padding: 5px;
        box-sizing: border-box;
        border-radius: 4px;
    }
    .btn-primary {
        /* background-color: #007bff; */
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
    }
    .btn-primary:hover {
        background-color: #0056b3;
    }
    .no-resize {
        resize: none;
    }
</style>
</head>

<?php 

if(isset($_SESSION['auth']))
{
    ?>
    <body>
        <div class="container">
            <div class="bookContainer">
                <!-- Add the image here -->
                <img src="Images/QR-2.jpg" alt="gCash">
            </div>
            <div class="bookContainerSide">
                <h3>Book Now</h3>
                <form class="bookNow" action="functions/authcode.php" method="POST" onsubmit="return validateForm()">
                <!-- Hidden fields for room name and check-in date -->
                <input type="hidden" name="room_name" value="<?= $roomName ?>">
                <!-- <input type="hidden" name="check_in_date" value="<?= $checkInDate ?>"> -->

                <!-- Other form fields for user details -->
                <input type="hidden" class="form-control" id="user_id" name="user_id" value="<?=$_SESSION['loggedinId']; ?>" placeholder="Input your transaction name" required>
                <div class="mb-3">
                    <input type="text" class="form-control" id="book_name" name="book_name" value="<?=$_SESSION['auth_user']['name']; ?>" placeholder="Input your transaction name" required>
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" id="book_email" name="book_email" value="<?=$_SESSION['auth_user']['email']; ?>" placeholder="Input your transaction email" required>
                </div>
                <div class="mb-3">
                    <textarea class="form-control no-resize" id="book_address" name="book_address" placeholder="Input your address" required><?=$_SESSION['auth_user']['address']; ?></textarea>
                </div>
                <div class="mb-3">
                    <input type="tel" class="form-control" id="book_contact" name="book_contact" value="<?=$_SESSION['auth_user']['contact']; ?>" placeholder="Input your transaction phone number" required>
                </div>
                <div class="mb-3">
                    <input type="number" class="form-control" id="book_persons" name="book_persons" placeholder="Input number of person" required>
                </div>
                <div class="mb-3">
                    <input type="number" class="form-control" id="referenceNum" name="referenceNum" placeholder="Input your reference no." required>
                </div>
                <div class="mb-3">
                    <div style="display: flex; align-items: center;">
                        <label for="check-in" class="me-2" style="flex: -1; margin-top: 5px; font-weight: bold">Check-In:</label>
                        <input type="date" class="form-control" id="book_date" name="book_date" style="flex: 2;" required>
                    </div>
                </div>
                <div class="mb-3">
                    <div style="display: flex; align-items: center;">
                        <label for="check-in" class="me-2" style="flex: -1; margin-top: 5px; font-weight: bold">Check-Out:</label>
                        <input type="date" class="form-control" id="book_checkout" name="book_checkout" style="flex: 2;" required>
                    </div>
                </div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="submitBooking()">
                        Submit Booking
                    </button>
                    <!-- <a href="bookConfirm.php" class="btn btn-primary" >Submit Booking</a> -->
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cofirm Booking</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalBodyContent">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="book_btn">Confirm</button>
                </div>
            </div>
        </div>
    </div>   
</form>
</body>
<?php
    } 
?>
</html>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var today = new Date().toISOString().split('T')[0];
        console.log(today);
        document.getElementById("book_date").setAttribute("min", today);
        document.getElementById("book_checkout").setAttribute("min", today);
    });
    </script>
    <script>
    function validateForm() {
        // Add validation logic here if needed
        return true; // Return true if validation passes, otherwise false
    }

    function submitBooking() {
        // Get user input values
        var bookName = document.getElementById('book_name').value;
        var bookEmail = document.getElementById('book_email').value;
        var bookAddress = document.getElementById('book_address').value;
        var bookContact = document.getElementById('book_contact').value;
        var bookPersons = document.getElementById('book_persons').value;
        var referenceNum = document.getElementById('referenceNum').value;
        var bookDate = document.getElementById('book_date').value;
        var bookCheckout = document.getElementById('book_checkout').value;

        // Check if any field is empty
        if (bookName === '' || bookEmail === '' || bookAddress === '' || bookContact === '' || bookPersons === '' || referenceNum === '' || bookDate === '' || bookCheckout === '') {
            // Display an error message in the modal
            var modalBodyContent = '<p style="color: red;">Fill up all fields to confirm booking.</p>';
            document.getElementById('modalBodyContent').innerHTML = modalBodyContent;

            // Show the modal
            $('#exampleModal').modal('show');
            return; // Stop the process if any field is empty
        }

        // Construct HTML content for the modal body
        var modalBodyContent = `
            <p style="color: red;">Note: The informations must be correct and the payment must be done to confirm your book</p>
            <p><strong>Name:</strong> ${bookName}</p>
            <p><strong>Email:</strong> ${bookEmail}</p>
            <p><strong>Address:</strong> ${bookAddress}</p>
            <p><strong>Contact:</strong> ${bookContact}</p>
            <p><strong>Number of Persons:</strong> ${bookPersons}</p>
            <p><strong>Reference Number:</strong> ${referenceNum}</p>
            <p><strong>Check-In Date:</strong> ${bookDate}</p>
            <p><strong>Check-Out Date:</strong> ${bookCheckout}</p>
        `;

        // Update the modal body content
        document.getElementById('modalBodyContent').innerHTML = modalBodyContent;

        // Automatically close the modal after 3 seconds (adjust as needed)
        setTimeout(function () {
            $('#exampleModal').modal('hide');
        }, 3000);
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

