<?php
session_start();
// this con is used to connect with the database
$con=mysqli_connect("localhost", "root", null, "cocomelon");
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
        <div class="dropdown">
        <button class="dropbtn"><b>Services</b></button>
            <div class="dropdown-content">
                <!-- Add links or content for the dropdown here -->
                <a href="adminhome.php">Homepage</a>
                <a href="addbooking.php">Add Booking</a>
                <a href="editbooking.php">Check Booking</a>
                <a href="membership.php">Membership Management</a>
                <a href="adminedittimetablestatus.php">Trainer Timetable</a>
                <a href="adminmanageacc.php">Manage Account</a>
                <a href="adminrefund.php">Refund Request</a>
                <a href="adminfeedback.php">View Feedback</a>
            </div>
        </div>

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
            <a href='logoutaction.php' name='logout'>Logout</a>";

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
    background-size: 1550px 1200px;
    background-position: center;

}

.logo{
    margin-right: 100px;
    justify-content: space-between;
}

/*navigation bar*/
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

 /*Dropdown Menu*/
/*dropdown button menu*/
.navigation a:nth-child(1) {
    margin-right: 40px; /* Adjust the margin value as needed */
 }

 /* Dropdown button */
 .dropdown {
    margin-right: 20px;
    position: relative;
    display: inline-block;
 }

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

/*navigation bar*/
.row{
    margin-bottom: 150px;
}
.row:after {
  content: "";
  display: table;
  clear: both;
  margin-top: -250px;
}

.wrapper {
    position: relative;
    width: 300px;
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
    margin-top: 20px;
}

.form-box{
    width: 100%;
    display: flex;
    flex-direction: column;
    margin: 0 auto;
    max-width: 400px;
    padding: 40px;
}

span {
  width: 50px;
  height: 50px;
}

.form-box h2{
    font-size: 2em;
    color:#44561c ;
    text-align: center;
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
<!-- Admin Dashboard -->
<span></span>
<div class="row">
<div class="wrapper">
    <div class="form-box">
        <form method="post" action="addbooking.php">
            <h2>Add <br>Booking</h2>
            <button type="submit" class="btn">Click</button>
        </form>
    </div>
</div>
<span></span>
<div class="wrapper">
    <div class="form-box">
        <form method="post" action="editbooking.php">
            <h2>Check Booking</h2>
            <button type="submit" class="btn">Click</button>
        </form>
    </div>
</div>
</div>

<span></span>
<div class="row">
<div class="wrapper">
    <div class="form-box">
        <form method="post" action="membership.php">
            <h2>Membership Management</h2>
            <button type="submit" class="btn">Click</button>
        </form>
    </div>
</div>
<span></span>
<div class="wrapper">
    <div class="form-box">
        <form method="post" action="adminedittimetablestatus.php">
            <h2>Trainer Timetable</h2>
            <button type="submit" class="btn">Click</button>
        </form>
    </div>
</div>
</div>

<span></span>
<div class="row">
<div class="wrapper">
    <div class="form-box">
        <form method="post" action="adminmanageacc.php">
            <h2>Manage Account</h2>
            <button type="submit" name='add' class="btn">Click</button>
        </form>
    </div>
</div>
<span></span>
<div class="wrapper">
    <div class="form-box">
        <form method="post" action="adminrefund.php">
            <h2> Refund Request</h2>
            <button type="submit" class="btn">Click</button>
        </form>
    </div>
</div>
</div>
<span></span>
<div class="row">
<div class="wrapper">
    <div class="form-box">
        <form method="post" action="adminfeedback.php">
            <h2>Customer Feedback</h2>
            <button type="submit" name='add' class="btn">Click</button>
        </form>
    </div>
</div>
<span></span>
</div>
<span></span>
<section><br></section>
</body>
</html>
