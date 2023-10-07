<?php
session_start();

// this con is used to connect with the database
    $servername = "localhost";
    $username = "root";
    $password = null;
    $dbname = "cocomelon";
    $con = new mysqli($servername, $username, $password, $dbname);
    $query = "SELECT * FROM personal_details WHERE User_ID = '".$_SESSION['User_ID']."'" ;
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);

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
            }
        ?>
        
            <?php 
            if(!ISSET($_SESSION['User_ID'])){
                echo "<a href='login.php'><b>Login</b></a>";
            }else{
                $servername = "localhost";
                $username = "root";
                $password = null;
                $dbname = "cocomelon";
                $conn = new mysqli($servername, $username, $password, $dbname);
                $query = "SELECT * FROM personal_details WHERE User_ID = '".$_SESSION['User_ID']."'" ;
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($result);
                echo "<div class='dropdown'>
                <button class='dropbtn'><b>".$row['Name']."</b></button>
                <div class='dropdown-content'>
                <a href='userprofile.php'>Profile</a>
                <a href='bookinghistory.php'>Booking History</a>
                <a href='login.php' id='logout' name='logout' onclick='closeForm()'>Logout</a>";

                echo "</div> </div>";
            }
            ?>
       </nav>
    <script type="text/javascript">
        document.getElementById("logout").onclick = function () {
            location.href = "login.php";
            <?php if(isset($_POST['logout']))
            {
                session_destroy();
            }
            ?>
        };
    </script>
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
.wrapper.search{
     margin-top: 150px;
}
.wrapper.edit{
     margin: 50px 0px 20px 0px;
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

section{
    padding: 10px 0px 10 px 0px;
    overflow: auto;
}

</style>
<section>
    <section>
        <div class="wrapper search">
            <!-- Checking booking form -->
            <div class="form-box login">
                <h2>Check Booking</h2>
                <form method="post" action="editbooking.php">
                    <div class="input-box">
                        <input type="text" name="bookid">
                        <label><b>Booking ID</b></label>
                    </div>
                    <div class="input-box">
                        <input type="email" name="email">
                        <label><b>Email</b></label>
                    </div>
                         <button type="submit" class="btn" name="search">Check Appointment</button>
                    
                </form>
            </div>
        </div>
    </section>
    <section>
        <?php
        if(isset($_POST["search"])){
            $id=$_POST["bookid"]??null; $email=$_POST["email"]??null; 
            $con=mysqli_connect("localhost", "root", null, "cocomelon");
            $query="select * from booking inner join personal_details on booking.Cust_ID = personal_details.User_ID where Book_ID= '$id' or personal_details.Email = '$email'";
            $result=mysqli_query($con, $query);
            if(mysqli_num_rows($result)==0) echo "<p>No record.</p>";
            else {
                $row=mysqli_fetch_array($result); 
                    echo "<div class='wrapper edit'>";
                    echo "<div class='form-box reschedule'>";
                    echo "<h2>Booking Details</h2><br>";
                    echo "<form action=editbooking.php method=post>";
                    echo "<input type=hidden name=mid value=".$row['Book_ID'].">";
                    echo "<p>Booking ID: ".$row['Book_ID']."</p>";
                    echo "<p>Customer ID: ".$row['Cust_ID']."</p>";
                    echo "<p>Customer Name: ".$row['Name']."</p>";
                    echo "<p>Trainer ID: ".$row['Trainer_ID']."</p>";
                    echo "<p>Date: <input type=date name=mdate value=".$row['Book_Date']."></p>";
                    echo "<p>Start Time: <input type=time name=mstarttime value=".$row['Book_StartTime']."></p>";
                    echo "<p>End Time: <input type=time name=mendtime value=".$row['Book_EndTime']."></p>";
                    echo "<p>Court: ".$row['Court']."</p>";
                    echo "<p>Status: ".$row['Status']."</p>";
                    echo "<p>Amount: ".$row['Amount']."</p>";
                    echo "<button type='submit' class='btn' name='update'>Update Appointment</button>";
                    echo "<button type='submit' class='btn' name='delete'>Delete Appointment</button>";
                    echo "</form>";
                    echo "</div>";
                    echo "</div>";  
                        
                    mysqli_close($con);
            }
        }
    ?>
    </section>

    <section>

        <?php
            if(isset($_POST["update"])){
                $mid=$_POST["mid"]; $mdate=$_POST["mdate"]; $mstarttime=$_POST["mstarttime"]; $mendtime=$_POST["mendtime"];
                $con=mysqli_connect("localhost", "root", null, "cocomelon");
                $sql="update booking set Book_Date='$mdate', Book_StartTime='$mstarttime', Book_EndTime='$mendtime' WHERE Book_ID='$mid'";
                    $result=mysqli_query($con, $sql);
                    echo "<p>Record is updated.</p>";
                }

            if(isset($_POST["delete"])){
            $del=$_POST["mid"];
            $con=mysqli_connect("localhost", "root", null, "cocomelon");
            $query="delete from booking where Book_ID='$del'";
            $result=mysqli_query($con, $query);
            echo "<p>Booking for ID <b>$del</b> has been deleted.</p>";
            mysqli_close($con);
            }
        ?>
    </section>
</section>
</body>
</html>
