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

$bookingDetails = null; // Initialize variable to hold booking details
$bookingNotFound = false; // Initialize a flag to check if booking is not found

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
            echo "<a href='addbooking.php'>Book Court Now!</a>";
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
    background-size: 1550px 1550px;
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
    width: 800px;
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

.wrapper.edit{
    width: 400px;
    margin: 50px 0px 20px 0px;
}

.input-box{
    position: relative;
    width: 100%;
    height: 50px;
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


/* Full-width input fields */
.form-box.reschedule input[type="number"],
.form-box.reschedule input[type="date"],
.form-box.reschedule input[type="time"] {
  width: 100%;
  padding: 10px; /* Adjust padding */
  margin: 10px 0; /* Adjust margin */
  border: 1px solid black;
  border-radius: 6px;
  background-color: transparent;
  font-size: 1em;
  outline: none;
}
.form-box.reschedule input[type="text"]{
    border-bottom: 2px solid #44561c;
}

/* When the inputs get focus, do something */
.form-box.reschedule input[type="number"]:focus,
.form-box.reschedule input[type="text"]:focus,
.form-box.reschedule input[type="date"]:focus,
.form-box.reschedule input[type="time"]:focus {
  background-color: #f1f1f1;
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
.btn.cancel{
    background-color: #D92121;
}
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

section{
    padding: 10px 0px 10 px 0px;
    overflow: auto;
}

/* table view */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table, th, td {
    border: 1px solid #ccc;
}

th, td {
    padding: 10px;
    text-align: left;
    text-align: center;
}

th {
    background-color: #f2f2f2;
}
/* table view */

.heading{
    text-align: center;
    font-size: 25px;
    margin-top: 20px;
}

.search-result
{
    width: 100%; /* Ensure the table takes the full width of the container */
    overflow-x: auto; /* Enable horizontal scrolling if the table is too wide */
    overflow-y: auto;
    margin-top: -30px;
    padding: 20px;
}

.search-results.msg{
    width: auto;
    height: 40px;
    text-align: center;
    padding: 10px 0px 0px 0px;
}
.box{
    width:1000px;
    height:auto;
    display:grid;
    grid-template-columns: 500px 200px;
    grid-row: auto auto;
}
.wrapper.search{
    padding:10px;
    display:flex;
    align-items:center;
    justify-content:center;
    width:400px;
    margin-top: 150px;
  }
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

.input-court label{
    margin-bottom: 10px;
    font-weight: bold;
}

.input-court select{
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid black;
    border-radius: 6px;
    background-color: transparent;
    font-size: 1em;
    outline: none;
}
</style>
<section>
    <?php
    if(ISSET($_SESSION['User_ID'])){
        $query = "SELECT * FROM personal_details WHERE User_ID = '".$_SESSION['User_ID']."'" ;
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) == 1) {
            $_SESSION['User_ID']=$row['User_ID'];
            if($row['Roles'] == 'member'||$row['Roles'] == 'guest'){ ?>
            <div class="wrapper search">
                <!-- Checking booking form -->
                <div class="form-box reschedule">
                    <h2>Check Booking By Booking ID</h2>
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="input-box">
                            <input type="text" name="bookid" required>
                            <label><b>Booking ID</b></label>
                        </div>
                             <button type="submit" class="btn" name="search">Check Appointment</button>
                        
                    </form>
                </div>
            </div>
        <?php }elseif($row['Roles'] == 'staff'||$row['Roles'] == 'head'){ ?>
        <section>
            <div class="box">
                <div class="wrapper search">
                    <!-- Checking booking form -->
                    <div class="form-box reschedule">
                        <h2>Check Booking By Booking ID</h2>
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <div class="input-box">
                                <input type="text" name="bookid" required>
                                <label><b>Booking ID</b></label>
                            </div>
                                 <button type="submit" class="btn" name="search">Check Appointment</button>
                            
                        </form>
                    </div>
                </div>
                <div class="wrapper search">
                    <div class="form-box reschedule">
                        <h2>Check Booking By Date</h2>
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <div class="input-box">
                                <input type="date" name="date" required>
                                <label><b>Select Date</b></label>
                            </div>
                            <button type="submit" class="btn" name="searchByDate">Check by Date</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
                <?php } } } ?>
    <section>
        <div class='search-results' id="result">
           <center><?php $html?></center> 
        </div>
    </section>
    <section>
        <?php
        if(isset($_POST["search"])){
            $user = $_SESSION['User_ID'];
            $id = $_POST["bookid"] ?? null;

            // Fetch the user's role from the database
            $query1 = "SELECT Roles FROM personal_details WHERE User_ID = '$user'";
            $result = mysqli_query($con, $query1);
            $row = mysqli_fetch_assoc($result);

            if ($row['Roles'] == 'member' || $row['Roles'] == 'guest') {
                // For members, only allow searching their own bookings
                $query = "SELECT * FROM booking INNER JOIN personal_details ON booking.Cust_ID = personal_details.User_ID WHERE Book_ID = '$id' AND Cust_ID = '$user'";
            } elseif ($row['Roles'] == 'staff' || $row['Roles'] == 'head') {
                // For staff and head users, allow searching all bookings
                 $query = "SELECT * FROM booking LEFT JOIN personal_details ON booking.Cust_ID = personal_details.User_ID WHERE Book_ID = '$id'";
            }

            $result=mysqli_query($con, $query);
            if(mysqli_num_rows($result)==0) echo "<br><p><center><b>No record.</b></center></p>";
            else {
                $row=mysqli_fetch_array($result); 
                    // Sample start and end times (in the format 'Y-m-d H:i:s')
                    $startTimeStamp = strtotime($row['Book_StartTime']);
                    $endTimeStamp = strtotime($row['Book_EndTime']);
                    if ($startTimeStamp === false || $endTimeStamp === false) {
                        echo "Invalid time format.";
                    } else {
                        // Calculate the time difference in seconds
                        $timeDifferenceInSeconds = $endTimeStamp - $startTimeStamp;

                        // Convert the time difference to hours
                        $durationInHours = $timeDifferenceInSeconds / 3600; // 3600 seconds in an hour
                    }

                    $html = "<div class='wrapper edit'>";
                    $html .= "<div class='form-box reschedule'>";
                    $html .= "<h2>Booking Details</h2><br>";
                    $html .= "<form action=editbooking.php method=post>";
                    $html .= "<input type=hidden name=mid value=".$row['Book_ID'].">";
                    $html .= "<p>Booking ID: ".$row['Book_ID']."</p>";
                    $html .= "<p>Customer ID: ".$row['Cust_ID']."</p>";
                    $html .= "<p>Customer Name: ".$row['Name']."</p>";
                    $html .= "<p>Trainer ID: ".$row['Trainer_ID']."</p>";
                    $html .= "<p>Date: <input type=date name=mdate id=edit-date value=".$row['Book_Date']."></p>";
                    //$html .= "<p>Start Time: <input type=time name=mstarttime id='start-time' value=".$row['Book_StartTime']." onchange='handleStartTimeChange()'></p>";
                    $startTime = $row['Book_StartTime'];
                    $print_startTime = date('h:i A', strtotime($startTime));
                    
                    

                    $queryBookedTimes = "SELECT * FROM booking WHERE Court = '".$row['Court']."' AND Book_Date = '".$row['Book_Date']."'";
                    $resultBookedTimes = mysqli_query($con, $queryBookedTimes);
                    $bookedTimeRanges = array();

                    if ($resultBookedTimes) {
                        while ($rowBookedTime = mysqli_fetch_assoc($resultBookedTimes)) {
                            $bookedTimeRanges[] = [
                                'start' => $rowBookedTime['Book_StartTime'],
                                'end' => $rowBookedTime['Book_EndTime']
                            ];
                        }
                    }

                    $html .= '<div class="input-court"><label> Start Time: </label><select id="start-time" onchange="handleStartTimeChange()">
                    <option value="'.$row['Book_StartTime'].'">'.$print_startTime.'</option>';

                    $availableTimes = array(
                        "08:00:00" => "08:00 AM",
                        "09:00:00" => "09:00 AM",
                        "10:00:00" => "10:00 AM",
                        "11:00:00" => "11:00 AM",
                        "12:00:00" => "12:00 PM",
                        "13:00:00" => "01:00 PM",
                        "14:00:00" => "02:00 PM",
                        "15:00:00" => "03:00 PM",
                        "16:00:00" => "04:00 PM",
                        "17:00:00" => "05:00 PM",
                        "18:00:00" => "06:00 PM",
                        "19:00:00" => "07:00 PM",
                        "20:00:00" => "08:00 PM",
                        "21:00:00" => "09:00 PM",
                        "22:00:00" => "10:00 PM",
                    );

                    foreach ($availableTimes as $timeValue => $timeLabel) {
                        // Check if the time or its adjacent hour is booked
                        $isDisabled = false;

                        foreach ($bookedTimeRanges as $bookedTimeRange) {
                            if ($timeValue >= $bookedTimeRange['start'] && $timeValue < $bookedTimeRange['end']) {
                                $isDisabled = true;
                                break;
                            }
                        }

                        $disabled = $isDisabled ? 'disabled' : '';

                        $html .= '<option value="' . $timeValue . '" ' . $disabled . '>' . $timeLabel . '</option>';
                    }

                    $html .= '</select></div>';
                    $html .= "<p>End Time: <input type=time name=mendtime id='end-time' value=".$row['Book_EndTime']." readonly></p>";
                    $html .= "<p>Duration (hour): <input type=number name=duration id='duration' value=$durationInHours required readonly>";
                    $html .= "<p>Court: ".$row['Court']."</p>";
                    $html .= "<p>Status: ".$row['Status']."</p>";
                    $html .= "<p>Amount: ".$row['Amount']."</p>";
                    $html .= "<button type='submit' class='btn' name='update'>Update Appointment</button>";
                    $html .= "<button type='submit' class='btn cancel' name='delete'>Delete Appointment</button>";
                    $html .= "</form></div></div>";
                    echo "<div class='search-results'>$html</div>";
                    mysqli_close($con);
            }
        }elseif(isset($_POST["searchByDate"])){
            $date=$_POST["date"];
            $con=mysqli_connect("localhost", "root", null, "cocomelon");
            $query="select * from booking left join personal_details on booking.Cust_ID = personal_details.User_ID where Book_Date= '$date'";
            $result=mysqli_query($con, $query);
            if(mysqli_num_rows($result)==0) echo "<div class='search-results msg'><br><b>$date do not have any booking.</b></div><br>";
            else {
                // Start creating the HTML for the results
                $html = "<br><h2 class='heading'>Results</h2><br><table>";
                $html .= "<tr><th>Booking ID</th><th>Customer ID</th><th>Customer Name</th><th>Trainer ID</th><th>Date</th><th>Start Time</th><th>End Time</th><th>Court No</th><th>Status</th><th>Amount</th></tr>";
                while ($row = mysqli_fetch_assoc($result)) {
                    $html .= "<tr>";
                    $html .= "<td>{$row['Book_ID']}</td>";
                    $html .= "<td>{$row['Cust_ID']}</td>";
                    $html .= "<td>{$row['Name']}</td>";
                    $html .= "<td>{$row['Trainer_ID']}</td>";
                    $html .= "<td>{$row['Book_Date']}</td>";
                    $html .= "<td>{$row['Book_StartTime']}</td>";
                    $html .= "<td>{$row['Book_EndTime']}</td>";
                    $html .= "<td>{$row['Court']}</td>";
                    $html .= "<td>{$row['Status']}</td>";
                    $html .= "<td>{$row['Amount']}</td></tr>";
                }

                $html .= "</table><br>";

                // Display the HTML in the search-results container
                echo "<div class='search-results'>$html</div>";
                mysqli_close($con);
            }
        }else {
            echo mysqli_error($con);
        }

        if(isset($_POST["update"])){
            $mid=$_POST["mid"]; 
            $mdate=$_POST["mdate"]; 
            $mstarttime=$_POST["mstarttime"]; 
            $mendtime=$_POST["mendtime"];

            $con=mysqli_connect("localhost", "root", null, "cocomelon");
            $sql="update booking set Book_Date='$mdate', Book_StartTime='$mstarttime', Book_EndTime='$mendtime' WHERE Book_ID='$mid'";
            $result=mysqli_query($con, $sql);
            echo "<br><div class='success'><center><b>Record Updated.</b></center></div>";
            if (mysqli_query($con, $sql)) {
            // Booking has been updated successfully
                function sendEmail($to, $subject, $message) {
                    $headers = 'From: cocomelonswe@gmail.com' . "\r\n" .
                        'Reply-To: cocomelonswe@gmail.com' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();

                    // You should use a proper SMTP library or service to send emails.
                    // The example below uses the built-in mail function.
                    if (mail($to, $subject, $message, $headers)) {
                        return true; // Email sent successfully
                    } else {
                        return false; // Email sending failed
                    }
                }

            // Send reschedule confirmation email
            $to = $row['Email'];
            $subject = "Your Booking Has Been Rescheduled";
            $message = "Hello {$row['Name']},\n\n";
            $message .= "Your booking has been successfully rescheduled. Here are the updated details:\n";
            $message .= "Booking ID: $mid\n";
            $message .= "Date: $mdate\n";
            $message .= "Start Time: $mstarttime\n";
            $message .= "End Time: $mendtime\n";

            // Send the email
            if (sendEmail($to, $subject, $message)) {
                echo "<div class='success'><center><b>Booking confirmation email sent successfully.</b></center></div>";
            } else {
                echo "<div class='errormsg'><center><b>Booking confirmation email could not be sent.</b></center></div>";
            }
        } else {
            // Handle the case where the SQL update query fails
            echo "Error updating the booking: " . mysqli_error($con);
        }
        }

        if(isset($_POST["delete"])){
            $del=$_POST["mid"];
            $con=mysqli_connect("localhost", "root", null, "cocomelon");
            $query="delete from booking where Book_ID='$del'";
            $result=mysqli_query($con, $query);
            echo "<br><center><p>Booking for ID <b>$del</b> has been deleted.</p></center>";
            function sendEmail($to, $subject, $message) {
                $headers = 'From: cocomelonswe@gmail.com' . "\r\n" .
                    'Reply-To: cocomelonswe@gmail.com' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();

                // You should use a proper SMTP library or service to send emails.
                // The example below uses the built-in mail function.
                if (mail($to, $subject, $message, $headers)) {
                    return true; // Email sent successfully
                } else {
                    return false; // Email sending failed
                }
            }
            // Send cancellation email
            $to = $row['Email'];
            $subject = "Your Booking Has Been Canceled";
            $message = "Hello {$row['Name']},\n\n";
            $message .= "We regret to inform you that your booking (ID: $del) has been canceled.";

            // Send the email
            if (sendEmail($to, $subject, $message)) {
                echo "<div class='success'><center><b>Cancellation email sent successfully.</b></center></div>";
            } else {
                echo "<div class='errormsg'><center><b>Cancellation email could not be sent.</b></center></div>";
            }
        }
    ?>
    </section>
</section>
<script>
    // Function to handle changes in the start time input
    function handleStartTimeChange() {
        const startTimeInput = document.getElementById('start-time');
        const endTimeInput = document.getElementById('end-time');
        const durationInput = document.getElementById('duration');

        const selectedStartTime = new Date("2023-08-23T" + startTimeInput.value);
        const duration = parseFloat(durationInput.value) || 1; // Default to 1 hour if duration is not set

        if (!isNaN(selectedStartTime.getTime())) {
            const newEndTime = new Date(selectedStartTime);
            newEndTime.setHours(newEndTime.getHours() + duration);

            // Format the end time to HH:MM
            const endHours = newEndTime.getHours().toString().padStart(2, "0");
            const endMinutes = newEndTime.getMinutes().toString().padStart(2, "0");
            endTimeInput.value = endHours + ":" + endMinutes;        }
    }

    // Attach event listeners to the relevant input fields
    document.getElementById("start-time").addEventListener("input", handleStartTimeChange);
    document.getElementById("duration").addEventListener("input", handleStartTimeChange);

    // Initially calculate and set the end time based on start time and duration
    handleStartTimeChange();
</script>

</body>
</html>
