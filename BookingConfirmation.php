<?php
session_start();
// this con is used to connect with the database
$servername = "localhost";
$username = "root";
$password = null;
$dbname = "cocomelon";
$con = new mysqli($servername, $username, $password, $dbname);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
// Retrieve user inputs

if (isset($_POST['book_appointment'])) {
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['phone'] = $_POST['phone'];
    $_SESSION['date'] = $_POST['date'];
    $_SESSION['startTime'] = $_POST['stime'];
    $_SESSION['endTime'] = $_POST['etime'];
    $_SESSION['courts'] = $_POST['court'];
    $_SESSION['trainerID'] = $_POST['trainerID'];
    }

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
        $custid = $row['User_ID']??null;
        $trainertotal = 0;
        $total = 0;
        if($trainerID != null)
        {
            $trainertotal = $durationInHours * $trainerPricePerHour;
            if(!ISSET($_SESSION['User_ID']) || mysqli_num_rows($result)==0)
            {
                $total = $durationInHours * $courtPricePerHourNonMem;
            }
            else
            {
                $total =$durationInHours * $courtPricePerHourMem;
            }
        }
        else
        {
            if(!ISSET($_SESSION['User_ID'])||mysqli_num_rows($result)==0)
            {
                $total = $durationInHours * $courtPricePerHourNonMem;
            }
            else
            {
                $total = $durationInHours * $courtPricePerHourMem;
            }
        }
        $finaltotal = $trainertotal + $total;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>SmashIt Badminton Academy</title>
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>

<!-- Website Navigation -->
<header>
    <img src="Greenlogo1.png" style="width:270px;height:270px;" class="logo">
    <nav class="navigation">
        <?php
        if(!ISSET($_SESSION['User_ID'])){
            echo "<a href='homepage.php#home'><b>Home</b></a>";
            echo "<a href='homepage.php#about'><b>About</b></a>";
            echo "<a href='homepage.php#contact'><b>Contact</b></a>";
            echo "<div class='dropdown'>";
            echo "<button class='dropbtn'><b>Services</b></button>";
            echo "<div class='dropdown-content'>";
            echo "<a href='customertimetable.php'>Trainer Timetable</a>";
            echo "<a href='addbooking.php'>Book Court Now!</a>";
            echo "<a href='editbooking.php'>Any Changes To Bookings</a>";
            echo "</div></div>";
            echo "<a href='login.php'><b>Login</b></a>";
            }else{
                $query = "SELECT * FROM personal_details WHERE User_ID = '".$_SESSION['User_ID']."'" ;
                $result = mysqli_query($con, $query);
                $row = mysqli_fetch_assoc($result);
                if (mysqli_num_rows($result) == 1) {
                    $_SESSION['User_ID']=$row['User_ID'];
                    if($row['Roles'] == 'member'||$row['Roles'] == 'guest'){
                        echo "<a href='homepage.php#home'><b>Home</b></a>";
                        echo "<a href='homepage.php#about'><b>About</b></a>";
                        echo "<a href='homepage.php#contact'><b>Contact</b></a>";
                        echo "<div class='dropdown'>";
                        echo "<button class='dropbtn'><b>Services</b></button>";
                        echo "<div class='dropdown-content'>";
                        echo "<a href='customertimetable.php'>Trainer Timetable</a>";
                        echo "<a href='addbooking.php'>Book Court Now!</a>";
                        echo "<a href='editbooking.php'>Any Changes To Bookings</a>";
                        echo "</div></div>";
                    }else if($row['Roles'] == 'trainer'){
                        echo "<a href='trainerhome.php#home'><b>Home</b></a>";
                        echo "<a href='trainerhome.php#time'><b>Timetable</b></a>";
                        echo "</div></div>";
                    }else if($row['Roles'] == 'staff' || $row['Roles'] == 'head' ){
                        echo "<div class='dropdown'>";
                        echo "<button class='dropbtn'><b>Services</b></button>";
                        echo "<div class='dropdown-content'>";
                        echo "<a href='addbooking.php'>Add Booking</a>";
                        echo "<a href='editbooking.php'>Check Booking</a>";
                        echo "<a href='membership.php'>Membership Management</a>";
                        echo "<a href='adminedittimetablestatus.php'>Trainer Timetable</a>";
                        echo "<a href='adminmanageacc.php'>Manage Account</a></div></div>";
                    }
                echo "<div class='dropdown'>
                <button class='dropbtn'><b>".$row['Name']."</b></button>
                <div class='dropdown-content'>
                <a href='userprofile.php'>Profile</a>
                <a href='bookinghistory.php'>Booking History</a>
                <a href='logoutaction.php' name='logout'>Logout</a>";

                echo "</div> </div>";
                }
            }
            ?>
       </nav>
</header>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Quicksand', sans-serif;
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
    background-size: 1550px 1000px;
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
    width: 500px;
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
    margin: 150px 0px 20px 0px;
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

.btn.cancel {
  background-color: #D92121;
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

.navigation a:nth-child(3) {
   margin-right: 40px; /* Adjust the margin value as needed */
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
   z-index: 1;
   top: 100%;
   left: 0; 
   margin-left: -50px;
}

/* Links inside the dropdown */
.dropdown-content a {
   font-size: 16px;
   color: #44561c;
   padding: 12px 14px;
   width: 117px;
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

.success {
    color: green;
    border-radius: 5px;
    padding: 10px;
}
.errormsg{
    color: red;
    border-radius: 5px;
    padding: 10px;
}
</style>

<div class="wrapper">
    <div class="form-box booking">
        <h2>Booking Confirmation</h2>
        <?php
        if (isset($_POST['pay'])) {
            $insertSql = "INSERT INTO booking (Cust_ID, Trainer_ID, Book_Date, Book_StartTime, Book_EndTime, Status, Court, Amount)
                VALUES ('$custid','$trainerID','$date','$startTime','$endTime','Booked','$courts','$finaltotal')";

            if ($con->query($insertSql) === TRUE) {
            $lastInsertId = $con->insert_id;
            // Generate the User_ID by combining Book_Str and the last insert ID
            $bookId = 'B' . $lastInsertId;
            $updateSql = "UPDATE booking SET Book_ID = '$bookId' WHERE Book_No = $lastInsertId";

            if ($con->query($updateSql) === TRUE) {
                // Now that the booking record is updated with the correct Book_ID, proceed to insert into the payment table
                $paymentsql = "INSERT INTO payment (Payment_ID, Cust_ID, Book_ID, Payment_Date, Amount, Status)
                                VALUES ('', '$custid', '$bookId', '$date', '$finaltotal', 'done')";
                
                if ($con->query($paymentsql) === TRUE) {
                    // Retrieve the last insert ID for the Payment_ID
                    $paymentId = $con->insert_id;
                    
                    // Generate the Payment_ID by combining Payment_Str and the Payment_No
                    $paymentId2 = 'P' . $paymentId;
                    
                    // Update the Payment_ID in the payment table
                    $updatePaymentSql = "UPDATE payment SET Payment_ID = '$paymentId2' WHERE Payment_No = $paymentId";

                    if ($con->query($updatePaymentSql) === TRUE) {
                        echo "<div class='success'><center><b>Successfully Booked</b></center></div>";
                    } else {
                        echo "Error updating Payment_ID: " . $con->error;
                    }
                } else {
                    echo "Error inserting payment record: " . $con->error;
                }
            } else {
                echo "Error updating Book_ID: " . $con->error;
            }
        } else {
            echo "Error inserting booking record: " . $con->error;
        }
        $to = $email;
        $subject = "Booking Confirmation from SmashIt Academy";
        $message = "Hello Dear $name,\n\n";
        $message .= "Thank you for booking with SmashIt Badminton Academy.\n";
        $message .= "Here is your booking details:\n";
        $message .= "Name: $name\n";
        $message .= "Date: $date\n";
        $message .= "Start Time: $startTime\n";
        $message .= "End Time: $endTime\n";
        $message .= "Number of Booking Court: $courts\n";
        
        if ($trainerID != null) {
            $query = "select * from personal_details where User_ID='$trainerID'";
            $result = mysqli_query($con, $query);
            $row = mysqli_fetch_array($result);
            $trainerName = $row['Name'];
            $message .= "Trainer Name: $trainerName\n";

            $insertTimetableSQL = "INSERT INTO timetable (Trainer_ID, Trainer_Name, Date, From_Time, To_Time, Status) VALUES ('$trainerID', '$trainerName', '$date', '$startTime', '$endTime', 'Unavailable')";

            if (mysqli_query($con, $insertTimetableSQL)) {
                // Timetable entry for the trainer is successfully added
                // You can add any additional actions or messages here if needed
            } else {
                // Handle the case where the insertion into the timetable table fails
                echo "Error inserting data into timetable table: " . mysqli_error($con);
            }
        }
        $message .= "Total Amount: RM $finaltotal\n";
        $headers = "From: <cocomelonswe@gmail.com>"; // Replace with your email address
        if (mail($to, $subject, $message, $headers)) {
            echo "<div class='success'><center><b>Booking confirmation email sent successfully.</b></center></div>";
        } else {
            echo "<div class='errormsg'><center><b>Booking confirmation email could not be sent.</b></center></div>";
        }
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
                <p><strong>Court No:</strong> <?php echo $courts; ?></p>
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
                <button type="button" name='cancel' class="btn cancel" id="cancelbtn" onclick="closeForm()">Cancel</button>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    document.getElementById("cancelbtn").onclick = function () {
        location.href = "addbooking.php";
    };
</script>

</body>
</html>
