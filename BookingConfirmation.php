<?php
session_start();
// this con is used to connect with the database
$con=mysqli_connect("localhost", "root", null, "cocomelon");

// Check the connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
// Retrieve user inputs
    // $_SESSION['name'] = $_POST['name'];
    // $_SESSION['email'] = $_POST['email'];
    // $_SESSION['phone'] = $_POST['phone'];
    // $_SESSION['date'] = $_POST['date'];
    // $_SESSION['startTime'] = $_POST['stime'];
    // $_SESSION['endTime'] = $_POST['etime'];
    // $_SESSION['courts'] = $_POST['court'];
    // $_SESSION['trainerID'] = $_POST['trainerID'];
    // $_SESSION['trainer'] = isset($_POST['trainer']) ? $_POST['trainer'] : "no";
    // $_SESSION['trainerID'] = isset($_POST['trainerName']) ? $_POST['trainerName'] : "";

    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $phone = $_SESSION['phone'];
    $date = $_SESSION['date'];
    $startTime = $_SESSION['startTime'];
    $endTime = $_SESSION['endTime'];
    $courts = $_SESSION['courts'];
    $trainerID = $_SESSION['trainerID']??null;
    $startTimeStamp = strtotime($startTime);
    $endTimeStamp = strtotime($endTime);

    if ($startTimeStamp === false || $endTimeStamp === false) {
        echo "Invalid time format.";
    } else {
        // Calculate the time difference in seconds
        $timeDifferenceInSeconds = $endTimeStamp - $startTimeStamp;

        // Convert the time difference to hours
        $durationInHours = $timeDifferenceInSeconds / 3600; // 3600 seconds in an hour
    }

    // Calculate the price
    $courtPricePerHourMem = 8; // court RM per hour
    $courtPricePerHourNonMem = 15; // court RM per hour
    $trainerPricePerHour = 20; // trainer RM per hour

    // Calculate the total price based on the number of courts and trainer selection
    if ($durationInHours <= 0)
        echo "Error! Please check your start time and end time.";
    else {
        $query="select * from personal_details where Email='$email'";
        $result=mysqli_query($con, $query);
        $row=mysqli_fetch_array($result);
        $custid = $row['User_ID'];
        $trainertotal = 0;
        $total = 0;
        if($trainerID != null)
        {
            $trainertotal = $courts * $durationInHours * $trainerPricePerHour;
            if(mysqli_num_rows($result)==0)
            {
                $total = $courts * $durationInHours * $courtPricePerHourNonMem;
            }
            else
            {
                $total = $courts * $durationInHours * $courtPricePerHourMem;
            }
        }
        else
        {
            if(mysqli_num_rows($result)==0)
            {
                $total = $courts * $durationInHours * $courtPricePerHourNonMem;
            }
            else
            {
                $total = $courts * $durationInHours * $courtPricePerHourMem;
            }
        }
        $finaltotal = $trainertotal + $total;
        //$courtTotalPrice = $courts * $durationInHours * $courtPricePerHour;
        //$trainerTotalPrice = ($trainer === "yes") ? $durationInHours * $trainerPricePerHour : 0;
        //$_SESSION['totalPrice'] = $courtTotalPrice + $trainerTotalPrice;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>SmashIt Badminton Academy</title>
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
        <!--non-member view
        <a href="#"><b>User Profile</b></a>-->
        <!-- member view-->
        <div class="dropdown">
        <button class="dropbtn"><b>User Profile</b></button>
            <div class="dropdown-content">
                <!-- Add links or content for the dropdown here -->
                <a href="#">Profile</a>
                <a href="#">Settings</a>
                <a href="#">Logout</a>
            </div>
        </div>
    </nav>
</header>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: sans-serif;
}

header{
    position: absolute; /*navigation bar wont fixed at above*/
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
    background-size: 1550px 800px;
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
/* Box*/
.wrapper {
    position: relative;
    width: 400px;
    height: auto; /*changed the form box's height as auto*/
    background: transparent;
    border: 2px solid rgba(255, 255, 255, .5);
    border-radius: 20px;
    backdrop-filter: blur(20px);
    box-shadow: 0 0 30px rgba(0, 0, 0, .5);
    display: flex;
    align-items: center;
    overflow: hidden;
    transform: scale(1);
    transition: transform .5s ease, height .2s ease;
	margin-top: 150px;
}

.wrapper .form-box{
    width: 100%;
    padding: 40px;
}

.form-box h2{
    font-size: 2em;
    color:#44561c ;
    text-align: center;
	margin-top: 15px;
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


.booking-details{
    position: relative;
    width: 100%;
    height: auto;
    margin: 30px 0;  
}


.booking-details p{
    width: 100%;
    height: 100%;
    background: transparent;
    border: none;
    outline: none;
    font-size: 20px;
    color: #44561c;
    font-weight: 600;
    padding: 0 60px 0 0;
}
/* Box*/

/*Dropdown Menu*/
/* Dropdown container */

.navigation a:nth-child(4) {
   margin-right: 30px; /* Adjust the margin value as needed */
}

.dropdown {
   margin-right: 20px;
   position: relative;
   display: inline-block;
}

/* Dropdown button */
.dropbtn {
   background-color: transparent; /* Set button background to transparent */
   border: none;
   cursor: pointer;
   color: #44561c;
   font-size: 1.1em;
   font-weight: 500;
}

/* Dropdown content (hidden by default) */
.dropdown-content {
   display: none;
   position: absolute;
   background-color: transparent; /* Set dropdown background to transparent */
   min-width: 160px;
   z-index: 1;
   top: 100%;
   left: 0; 
   margin-left: -50px;
}

/* Links inside the dropdown */
.dropdown-content a {
   color: #44561c;
   padding: 12px 16px;
   text-decoration: none;
   display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {
   background-color: #44561c;
   color: white;
}

/* Show the dropdown content when the dropdown button is hovered over */
.dropdown:hover .dropdown-content {
   display: block;
}
/*Dropdown Menu*/
/*Block*/
span {
  width: 50px;
  height: 50px;
}
/*Block*/

.success {
    color: green;
    border-radius: 5px;
    padding: 10px;
}
</style>

<div class="wrapper">
    <div class="form-box booking">
        <h2>Booking Confirmation</h2>
        <?php
        if (isset($_POST['pay'])) {
            $sql = "INSERT INTO booking (Book_ID, Cust_ID, Trainer_ID, Book_Date, Book_StartTime, Book_EndTime, Status, Court, Amount)
                VALUES ('','$custid','$trainerID','$date','$startTime','$endTime','Booked','$courts','$finaltotal'); 
                UPDATE booking SET Book_ID = concat( Book_Str, Book_No ) ";
                if (mysqli_multi_query($con, $sql)) {
                    do {
                        /* store first result set */
                        if ($result = mysqli_store_result($con)) {
                            while ($row = mysqli_fetch_row($result)) {
                            }
                            mysqli_free_result($con);
                        }
                        /* print divider */
                        if (mysqli_more_results($con)) {
                        }
                    } while (mysqli_next_result($con));
                }
                echo "<div class='success'><center><b>Successfully Booked</b></center></div>";
        }
        ?>
		    <div class="booking-details">
                <form action="bookingconfirmation.php" method="post">
                    <p><strong>Name:</strong> <?php echo $name; ?></p>
                    <p><strong>Email:</strong> <?php echo $email; ?></p>
                    <p><strong>Phone:</strong> <?php echo $phone; ?></p>
                    <p><strong>Date:</strong> <?php echo $date; ?></p>
                    <p><strong>Start Time:</strong> <?php echo $startTime; ?></p>
                    <p><strong>End Time:</strong> <?php echo $endTime; ?></p>
                    <p><strong>Number of Booking Court:</strong> <?php echo $courts; ?></p>
                    <?php
                    if ($trainerID != null) {
                        $query="select * from personal_details where User_ID='$trainerID'";
                        $result=mysqli_query($con, $query);
                        $row=mysqli_fetch_array($result);
                        $trainerName = $row['Name'];
                        echo "<p><strong>Trainer Name:</strong> $trainerName</p>";
                        echo "<p><strong>Trainer Fee: RM</strong> $trainertotal</p>";
                    }
                    ?>
                    <p><strong>Court Fee:</strong> RM <?php echo $total; ?></p>
                    <p><strong>Total Price:</strong> RM <?php echo $finaltotal ?></p>
                    <button type="submit" name='pay' id='confirmbtn' class="btn">Pay</button>
                    <button type="submit" name='cancel' id='cancelbtn' class="btn">Cancel</button>
                </form>
			</div>
    </div>
    
</div>

<!--<script src="script.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<script type="text/javascript">
    document.getElementById("cancelbtn").onclick = function () {
        location.href = "addbooking.php";
    };
</script>

<script>
	const wrapper = document.querySelector('.wrapper');

</script>-->

</body>
</html>
