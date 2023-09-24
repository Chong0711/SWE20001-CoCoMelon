<?php
session_start();
// this con is used to connect with the database
$con = mysqli_connect("localhost", "root", null, "cocomelon");

// Check the connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$bookingDetails = null; // Initialize variable to hold booking details

if (isset($_POST['bookid']) && isset($_POST['email'])) {
    $booking_id = $_POST['bookid'];
    $email = $_POST['email'];

    // Connect to the database and select the required details
    $sql = "SELECT * FROM bookings WHERE booking_id = $booking_id AND email = '$email'";
    $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) === 1) {
        // Booking exists, fetch and store booking details
        $bookingDetails = mysqli_fetch_assoc($result);
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
    position: fixed;
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

.navigation .btnlogin-popup{
    width: 130px;
    height: 50px;
    background: transparent;
    border: 2px solid #44561c;
    outline: none;
    border-radius: 6px;
    cursor: pointer;
    color: #44561c;
    font-size: 1.1em;
    font-weight: 500;
    margin-left: 40px;
    transition: .5s;
}

.navigation .btnlogin-popup:hover{
    background: #fff;
    color: #162938;
}

.wrapper {
    position: relative;
    width: 400px;
    height: 810px;
    background: transparent;
    border: 2px solid rgba(255, 255, 255, .5);
    border-radius: 20px;
    backdrop-filter: blur(20px);
    box-shadow: 0 0 30px rgba(0, 0, 0, .5);
    display: flex;
    justify-content: center;
    align-items: center;
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
}


.wrapper .form-box.login{
    transition: transform .18s ease;
    transform: translateX(0);
}


.wrapper.active .form-box.login{
    transition: none;
    transform: translateX(-400px);
}

.wrapper .icon-close{
    position: absolute;
    top: 0;
    right: 0;
    width: 45px;
    height: auto;
    background: #44561c;
    font-size: 2em;
    justify-content: center;
    display: flex;
    align-items: center;
    border-bottom-left-radius: 20px;
    cursor: pointer;
    z-index: 1;

}

.form-box h2{
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

/*reschedule booking css*/
.wrapper .form-box.reschedule {
    transition: transform .18s ease;
    transform: translateX(0);
}

.wrapper.active .form-box.reschedule {
    transition: none;
    transform: translateX(-400px);
}
/*reschedule booking css*/
</style>

<div class="wrapper">
    <!--to check if booking details were found in the database-->
    <?php if ($bookingDetails) : ?>
    <div class="form-box reschedule">
        <h2>Reschedule booking</h2>
        <!-- Display booking details -->
        <p>Booking ID: <?php echo $bookingDetails['booking_id']; ?></p>
        <p>Name: <?php echo $bookingDetails['name']; ?></p>
        <p>Date: <?php echo $bookingDetails['date']; ?></p>
        <p>Time: <?php echo $bookingDetails['time']; ?></p>
        <p>Courts: <?php echo $bookingDetails['courts']; ?></p>
        <p>Trainer: <?php echo ($bookingDetails['trainer'] === 'yes') ? $bookingDetails['trainer_name'] : '-'; ?></p>
        <!-- Add more fields as needed -->

        <!-- Form for rescheduling -->
        <form method="post" action="reschedule_action.php">
            <input type="hidden" name="booking_id" value="<?php echo $bookingDetails['booking_id']; ?>">
            <label for="new_date">New Date:</label>
            <input type="date" name="new_date" required><br>
            <label for="new_time">New Time:</label>
            <input type="time" name="new_time" required><br>
            <button type="submit" class="btn">Reschedule</button>
        </form>
    </div>
    <?php else : ?>
    <div class="form-box login">
        <h2>Reschedule booking</h2>
        <form method="post" action="#">
            <div class="input-box">
                <input type="text" name="bookid" required>
                <label>Booking ID</label>
            </div>
            <div class="input-box">
                <input type="email" name="email" required>
                <label>Email</label>
            </div>	
            <button type="submit" class="btn">Check Appointment</button>
        </form>
    </div>
    <?php endif; ?>
</div>

</body>
</html>
