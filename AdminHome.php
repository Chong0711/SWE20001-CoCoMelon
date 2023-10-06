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
    <link rel="stylesheet" href="style.css" />
</head>
<body>

<!-- Website Navigation -->
<header>
    <img src="Greenlogo1.png" style="width:270px;height:270px;" class="logo">
    <nav class="navigation">
        <a href="#"><b>Home</b></a>
        <a href="#"><b>About</b></a>
        <a href="#" ><b>Services</b></a>
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
/*navigation bar*/

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

.wrapper .form-box{
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
<div class="wrapper">
    <div class="form-box addbooking">
        <form method="post" action="addbooking.php">
            <h2>Add Booking</h2>
            <button type="submit" name='add' class="btn">Click</button>
        </form>
    </div>
</div>
<span></span>
<div class="wrapper">
    <div class="form-box editbooking">
        <form method="post" action="editbooking.php">
            <h2>Check Booking</h2>
            <button type="submit" name='add' class="btn">Click</button>
        </form>
    </div>
</div>
<span></span>
<div class="wrapper">
    <div class="form-box membership">
        <form method="post" action="membership.php">
            <h2>Membership Management</h2>
            <button type="submit" name='add' class="btn">Click</button>
        </form>
    </div>
</div>
<span></span>
<div class="wrapper">
    <div class="form-box timetable">
        <form method="post" action="trainertimetable.php">
            <h2>Trainer Timetable</h2>
            <button type="submit" name='add' class="btn">Click</button>
        </form>
    </div>
</div>
<span></span>
<div class="wrapper">
    <div class="form-box timetable">
        <form method="post" action="admincreateacc.php">
            <h2>Create Account</h2>
            <button type="submit" name='add' class="btn">Click</button>
        </form>
    </div>
</div>
<span></span>
</body>
</html>
