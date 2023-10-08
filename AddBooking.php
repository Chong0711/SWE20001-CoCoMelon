<?php
session_start();
// this con is used to connect with the database
$servername = "localhost";
$username = "root";
$password = null;
$dbname = "cocomelon";
$conn = new mysqli($servername, $username, $password, $dbname);
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
                $result = mysqli_query($conn, $query);
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

/*navigation bar*/

/*Dropdown Menu*/
/* Dropdown container*/
.navigation a:nth-child(3) {
   margin-right: 40px;
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
   color: #44561c;
   padding: 12px 16px;
   text-decoration: none;
   width: 120px;
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
    margin: 150px 0px 20px 0px;
}

.wrapper label{
    color: #44561c;
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
    height: 45px;
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
    margin-bottom: 30px;  
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

/*Do you need a trainer?*/
.input-trainer{
    position: relative;
    width: 100%;
    height: 50px;
    margin: 40px 0;
}

.input-trainer label{
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

.input-trainer select{
    margin-top: 20px;
    width: 100%;
    height: 40px;
    border: 2px solid #44561c;
    border-radius: 6px;
    background-color: transparent;
    color: #44561c;
    font-size: 1em;
    padding: 5px;
}
/*Do you need a trainer?*/

/*Trainer Name*/
.input-NTrainer{
    position: relative;
    width: 100%;
    height: 50px;
    margin: 40px 0;
}

.input-NTrainer label{
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

.input-NTrainer select{
    margin-top: 20px;
    width: 100%;
    height: 40px;
    border: 2px solid #44561c;
    border-radius: 6px;
    background-color: transparent;
    color: #44561c;
    font-size: 1em;
    padding: 5px;
}
/*Trainer Name*/

/*Trainer Name*/
.input-court{
    position: relative;
    width: 100%;
    height: 50px;
    margin: 40px 0;
}

.input-court label{
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

.input-court select{
    margin-top: 20px;
    width: 100%;
    height: 40px;
    border: 2px solid #44561c;
    border-radius: 6px;
    background-color: transparent;
    color: #44561c;
    font-size: 1em;
    padding: 5px;
}
/*Trainer Name*/

</style>

<div class="wrapper">
    <div class="form-box login">
        <h2>Booking</h2>
        <form method="post" action="bookingconfirmation.php">
            <label>Name</label>
            <div class="input-box">
                <input type="text" name="name" 
                value="<?php 
                if(ISSET($_SESSION['User_ID']))
                  {echo $row['Name'];}
                else{echo "";}
              ?>" required>
            </div>

            <label>Email</label>
            <div class="input-box">
                <input type="email" name="email" value="<?php 
                if(ISSET($_SESSION['User_ID']))
                  {echo $row['Email'];}
                else{echo "";}
              ?>" required>
            </div>

            <label>Phone</label>
            <div class="input-box">
                <input type="tel" name="phone"  value="<?php 
                if(ISSET($_SESSION['User_ID']))
                  {echo $row['Phone_Num'];}
                else{echo "";}
              ?>" required>
            </div>

            <label>Date</label>
            <div class="input-box">
                <input type="date" name="date" required>
            </div>

            <label>Start Time</label>
            <div class="input-box">
                <input type="time" name="stime" required>
            </div>

            <label>End Time</label>
            <div class="input-box">
                <input type="time" name="etime" required>
            </div>

            <div class="input-court">
                <label>Number of Court:</label>
                <select id="court" name="court">
                    <option value="1">1</option>
                    <option value="2">2</option> 
                    <option value="3">3</option> 
                </select>
            </div>

            <?php 
            if(!ISSET($_SESSION['User_ID']))
                { echo '<div class="input-trainer" style="display: none">';}else{echo '<div class="input-trainer" style="display: block">'; }?>
            
                <label>Do you need a trainer?</label>
                <select onchange="yesnoCheck(this);">
                    <option value="no">No</option>
                    <option value="yes">Yes</option> 
                </select>
            </div>

            <?php
                $con=mysqli_connect("localhost", "root", "", "cocomelon");
                $query="select * from personal_details where Roles='trainer'";
                $result=mysqli_query($con, $query);
            ?>
            <div id="ifYes" class="input-NTrainer" style="display: none;">
                <label>Trainers:</label>
                <select id="trainer-name" name="trainerID" >
                    <option value="">Select Trainer</option>
                    <?php
                    while($row=mysqli_fetch_array($result)) { ?>
                        <option value="<?php echo $row['User_ID']; ?>"><?php echo $row['Name']; ?></option>
                    <?php } ?>
                    
                </select>
            </div>

                <button type="submit" class="btn" name="book_appointment">Book Appointment</button>
                        
        </form>
    </div>
    <br><br><br><br>
</div>

<script>    
    function yesnoCheck(that) {
        if (that.value == "yes") {
            document.getElementById("ifYes").style.display = "block";
        } else {
            document.getElementById("ifYes").style.display = "none";
        }
    }
</script>

</body>
</html>
