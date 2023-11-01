<?php
session_start(); // Start the session
$servername = "localhost";
$username = "root";
$password = null;
$dbname = "cocomelon";
$con = new mysqli($servername, $username, $password, $dbname);
$query = "SELECT * FROM personal_details WHERE User_ID = '".$_SESSION['User_ID']."'" ;
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$query1 = "SELECT * FROM booking WHERE Cust_ID = '" . $_SESSION['User_ID'] . "' AND Book_Date > CURDATE() AND Status = 'Cancelled'";
$bookingResult = mysqli_query($con, $query1);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>SmashIt Badminton Academy</title>
        <link rel="stylesheet" href="https">
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
            echo "<a href='FeedbackForm.php'><b>Feedback</b></a>";
            echo "<div class='dropdown'>";
            echo "<button class='dropbtn'><b>Services</b></button>";
            echo "<div class='dropdown-content'>";
            echo "<a href='faq.php'>FAQ</a>";
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
                        echo "<a href='FeedbackForm.php'><b>Feedback</b></a>";
                        echo "<div class='dropdown'>";
                        echo "<button class='dropbtn'><b>Services</b></button>";
                        echo "<div class='dropdown-content'>";
                        echo "<a href='faq.php'>FAQ</a>";
                        echo "<a href='customertimetable.php'>Trainer Timetable</a>";
                        echo "<a href='addbooking.php'>Book Court Now!</a>";
                        echo "<a href='editbooking.php'>Any Changes To Bookings</a>";
                        echo "<a href='refundform.php'>Refund</a>";
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
    background: url(badminton.jpg)no-repeat;
    background-size: 1550px 850px;
    background-position: center;

}

.logo{
    font-size: 2em;
    color: #44561c;
    user-select: none;
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
    height: auto; /*changed the form box's height as auto*/
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
}

.login-register{
    font-size: .9em;
    color: #44561c;
    text-align: center;
    font-weight: 500;
    margin: 25px 0 10px;
}

.guest-login{
    font-size: .9em;
    color: #44561c;
    text-align: center;
    font-weight: 500;
    margin: 25px 0 10px;
}

.guest-login p a{
    color: #44561c;
    text-decoration: none;
    font-weight: 600;
}

.guest-login p a:hover{
    text-decoration: underline;
}

.error {
    color: #D8000C;
    border-radius: 5px;
    padding: 10px;
}

/*Dropdown Menu*/
/* Dropdown container */

.navigation a:nth-child(4) {
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

/*Booking Id Option*/
.input-court{
    position: relative;
    width: 100%;
    height: 50px;
    margin: 30px 0;  
}

.input-court label{
    position: absolute;
    top: 20%;
    left: 5px;
    transform: translateY(-180%);
    font-size: 1em;
    color: #44561c;
    font-weight: 500;
    pointer-events: none;
    transition: .5s;
}

.input-court select{
    margin-top: 10px;
    width: 100%;
    height: 40px;
    border: 2px solid #44561c;
    border-radius: 6px;
    background-color: transparent;
    color: #44561c;
    font-size: 1em;
    padding: 5px;
}

/*Booking Id Option*/

/*User Id*/
.user-id {
    font-size: 1em;
    color: #44561c;
    font-weight: 500;
    margin-top: -25px;
    margin-left: 5px;
}

.input-userid{
    position: relative;
    width: 100%;
    height: 50px;
    margin: 30px 0;  
}

.input-userid label{
    position: absolute;
    top: 50%;
    transform: translateY(-180%);
    font-size: 1em;
    color: #44561c;
    font-weight: 500;
    pointer-events: none;
    transition: .5s;
}
/*User Id*/

.success {
    color: green;
    border-radius: 5px;
    margin-top: 10px;
    padding: -10px;
}
.errormsg{
    color: red;
    border-radius: 5px;
    padding: 10px;
}

</style>

<div class="wrapper">
    <div class="form-box refund">
        <h2>Refund</h2>
        <form action="RefundForm.php" method="POST">
            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['refund'])) {
                $user_id = $_SESSION['User_ID'];
                $booking_id = $_POST['booking_id'];
                $bank_name = $_POST['bank_name'];
                $bank_acc_number = $_POST['bank_acc_number'];
                $bank_acc_name = $_POST['bank_acc_name'];

                $check_query = "SELECT * FROM refund WHERE User_ID = '$user_id' AND Book_ID = '$booking_id'";
                $check_result = mysqli_query($con, $check_query);

                if (mysqli_num_rows($check_result) > 0) {
                    echo "<div class='error'><center><b>You have already requested a refund for this booking.</b></center></div>";
                } else {
                    $sql = "INSERT INTO refund (Refund_ID, User_ID, Book_ID, Bank, Bank_Name, Bank_Acc, Refund_Date, Status) 
                            VALUES ('','$user_id', '$booking_id', '$bank_name', '$bank_acc_name', '$bank_acc_number', NOW(), 'pending'); 
                            UPDATE refund SET Refund_ID = concat( Refund_Str, Refund_No ) ";

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
                                echo "<div class='success'><center><b>Refund request submitted successfully.</b></center></div>";
                        }
                        else
                        {
                            echo "Error: " . $con->error;
                        }
                    }
                }
            ?>

            <div class="input-userid">
                <?php
                echo "<input type=hidden name=muid value=".$_SESSION['User_ID'].">";
                echo "<br><br><p class='user-id'>User ID: ".$row['User_ID']."</p><br>";
                ?>
            </div>

                <div class = "input-court">
                    <label>Booking ID</label>
                    <select name="booking_id" required>
                         <?php
                            while ($bookingRow = mysqli_fetch_assoc($bookingResult)) {
                                // Output each booking as an option in the select element
                                echo "<option value='{$bookingRow['Book_ID']}'>{$bookingRow['Book_ID']}</option>";
                            }
                        ?>
                    </select>
                </div>

            <div class="input-box">
                <span class="icon"><ion-icon name="business"></ion-icon></span>
                <input type="text" name="bank_name" required>
                <label>Bank Name</label>
            </div>

            <div class="input-box">
                <span class="icon"><ion-icon name="wallet-outline"></ion-icon></span>
                <input type="text" name="bank_acc_number" required>
                <label>Bank Account Number</label>
            </div>

            <div class="input-box">
                <span class="icon"><ion-icon name="person"></ion-icon></span>
                <input type="text" name="bank_acc_name" required>
                <label>Bank Account Name</label>
            </div>

            <button type="submit" class="btn" name="refund">Request Refund</button>
        </form>
    </div>
</div>

<script src="script.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>
