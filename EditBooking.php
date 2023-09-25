<?php
session_start();

$con = mysqli_connect("localhost", "root", null, "cocomelon");

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$bookingDetails = null; // Initialize variable to hold booking details

$bookingNotFound = false; // Initialize a flag to check if booking is not found

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['bookid']) && isset($_POST['email'])) {
        $booking_id = $_POST['bookid'];
        $email = $_POST['email'];

        // Connect to the database and select the required details
        $sql = "SELECT * FROM booking WHERE Book_ID = $booking_id AND user.email = '$email'";
        $result = mysqli_query($con, $sql);

        if ($result && mysqli_num_rows($result) === 1) {
            // Booking exists, fetch and store booking details
            $bookingDetails = mysqli_fetch_assoc($result);
        } else {
            $bookingNotFound = true;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>SmashIt Badminton Academy</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>

<!-- Website Navigation -->
<header>
    <img src="Greenlogo1.png" style="width:270px;height:270px;" class="logo">
    <nav class="navigation">
        <a href="#"><b>Home</b></a>
        <a href="#"><b>About</b></a>
        <a href="#"><b>Services</b></a>
        <a href="#"><b>Contact</b></a>
        <a href="#"><b>User Profile</b></a>
    </nav>
</header>

<style>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: sans-serif;
}

header{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 20%;
    z-index: 99;
    padding: 20px 100px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-size: 1em;

}

body{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: url(Background_SWE2.jpg)no-repeat;
    background-size: 1550px 1200px;
    background-position: center;

}

.logo{
    margin-right: 100px;
    justify-content: space-between;
}

.navigation a{
    position: relative;
    font-size: 1.1em;
    color: #44561c;
    text-decoration: none;
    font-weight: 500;
    margin-left: 40px;
}

.navigation a::after{
    content: '';
    position: absolute;
    left: 0;
    bottom: -6px;
    width: 100%;
    height: 3px;
    background: #44561C;
    border-radius: 5px;
    transform-origin: right;
    transform: scaleX(0);
    transition: transform .5s;
}

.navigation a:hover::after{
    transform-origin: left;
    transform: scaleX(1);
}

.wrapper {
    position: relative;
    width: 400px;
    height: auto; 
    background: transparent;
    border: 2px solid rgba(255, 255, 255, .5);
    border-radius: 20px;
    backdrop-filter: blur(20px);
    box-shadow: 0 0 30px rgba(0, 0, 0, .5);
    display: flex;
    flex-direction: column; /* Stack children vertically */
    align-items: center; /* Center content horizontally */
    overflow: hidden;
    transform: scale(1);
    transition: transform .5s ease, height .2s ease;
    margin-top: 150px;
}

.wrapper.active{
    height: 520px;
}

.wrapper .form-box{
    width: 100%;
    padding: 40px;
    overflow: hidden; /* Ensure content doesn't overflow */
}

.wrapper .form-box p {
    margin-bottom: 10px;
    font-weight: bold;
}

.wrapper .form-box h2{
    font-size: 2em;
    color:#44561c ;
    text-align: center;
}

.input-box{
    position: relative;
    width: 100%;
    height: 50px;
    border-bottom: 2px solid #44561c;
    margin: 30px 0;  
}


.input-box label{
    position: absolute;
    top: 50%;
    left: 5px;
    transform: translateY(-180%);
    font-size: 1em;
    color: #44561c;
    font-weight: 500;
    pointer-events: none;
    transition: .5s;
}


.input-box input{
    width: 100%;
    height: 100%;
    background: transparent;
    border: none;
    outline: none;
    font-size: 1em;
    color: #44561c;
    font-weight: 600;
    padding: 0 35px 0 5px;

}

.input-box .icon{
    position: absolute;
    right: 8px;
    font-size: 1.2em;
    color: #44561c;
    line-height: 57px;

}

.btn{
    width: 100%;
    height: 45px;
    background: #44561c;
    border: none;
    outline: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 1em;
    color: #fff;
    font-weight: 500;
    margin-top: 20px;
}

</style>

<div class="wrapper">
    <!-- Checking booking form -->
    <div class="form-box login">
        <h2>Check Booking</h2>
        <form method="post" action="#">
            <div class="input-box">
                <input type="text" name="bookid" required>
                <label>Booking ID</label>
            </div>
            <div class="input-box">
                <input type="email" name="email" required>
                <label>Email</label>
            </div>
                 <button type="submit" class="btn" name="check">Check Appointment</button>
            
        </form>
    </div>
</div>

<?php 
//After click Check Appointment button
if(isset($_POST['check'])) {
    $check = $_POST['check'];
    if ($bookingNotFound== true) { ?>
    <!-- Booking Not Found message -->
        <?php if ($bookingNotFound== true) { ?>
            <h2>Booking Not Found</h2>
            <p id="booking-not-found">Did not find the booking. Please check your Booking ID and Email.</p>
        <?php } ?>

    <!-- Display Booking Details -->
    <?php if ($bookingNotFound== false) : ?>
        <div class="form-box reschedule">
            <h2>Booking Details</h2>
            <p>Booking ID: <?php echo $bookingDetails['booking_id']; ?></p>
            <p>Email: <?php echo $bookingDetails['email']; ?></p>
            <p>Phone: <?php echo $bookingDetails['phone']; ?></p>
            <p>Name: <?php echo $bookingDetails['name']; ?></p>
            <p>Date: <?php echo $bookingDetails['date']; ?></p>
            <p>Time: <?php echo $bookingDetails['time']; ?></p>
            <p>Court: <?php echo $bookingDetails['court']; ?></p>
            <p>Trainer: <?php echo ($bookingDetails['trainer'] === 'yes') ? $bookingDetails['trainer_name'] : '-'; ?></p>
            <button type="button" onclick="editBooking()">Edit Booking</button>
            <button type="button" onclick="cancelBooking()">Cancel Booking</button>
       </div>
    <?php endif; }}?>

<script>
     // Function to edit the booking
    function editBooking() {
        // Disable the edit button to prevent multiple clicks
        document.querySelector(".reschedule button:first-child").disabled = true;

        // Enable the date and time fields for editing
        var dateInput = document.querySelector("input[name='new_date']");
        var timeInput = document.querySelector("input[name='new_time']");
        dateInput.removeAttribute("readonly");
        timeInput.removeAttribute("readonly");

        // Create a button to save the changes
        var saveButton = document.createElement("button");
        saveButton.textContent = "Save Changes";
        saveButton.addEventListener("click", function() {
            // Collect the updated date and time
            var newDate = dateInput.value;
            var newTime = timeInput.value;

            // Validate and update the booking in the database (you will need to implement this)
            // Example: You can send an AJAX request to a PHP script to update the booking
        });

        // Add the save button to the form
        var form = document.querySelector(".form-box.reschedule form");
        form.appendChild(saveButton);
    }

    // Function to cancel the booking
    function cancelBooking() {
        // Confirm cancellation with the user
        var confirmCancel = confirm("Are you sure you want to cancel this booking?");
        if (confirmCancel) {
            // Update the booking status to "Cancelled" in the database (you will need to implement this)
            // Example: You can send an AJAX request to a PHP script to update the booking status

            // Disable the cancel button to prevent multiple clicks
            document.querySelector(".reschedule button:last-child").disabled = true;

            // Display a message to the user
            var formBox = document.querySelector(".form-box.reschedule");
            formBox.innerHTML = "<p>Your booking has been cancelled.</p>";
        }
    }
    // Function to adjust form box height based on content
    function adjustFormBoxHeight() {
        var formBox = document.querySelector(".form-box.reschedule");
        var contentHeight = formBox.scrollHeight; // Get the content's scroll height
        formBox.style.height = contentHeight + "px"; // Set the form box's height
    }

    // Call the function when the page loads and when it resizes (optional)
    window.onload = adjustFormBoxHeight;
    window.onresize = adjustFormBoxHeight; // Optional: Update height on window resize
</script>

</body>
</html>
