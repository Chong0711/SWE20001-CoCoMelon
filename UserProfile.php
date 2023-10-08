<?php
session_start();
// this con is used to connect with the database
    $servername = "localhost";
    $username = "root";
    $password = null;
    $dbname = "cocomelon";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $query = "SELECT * FROM personal_details WHERE User_ID = '".$_SESSION['User_ID']."'" ;
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
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
                <a href='logoutaction.php' name='logout'>Logout</a>";

                echo "</div> </div>";
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

/*Profile Picture*/
.profile-picture {
    width: 150px; 
    height: 150px; 
    border-radius: 50%; 
    overflow: hidden; 
    margin: 0 auto;
    border:3px solid #44561c;
}

.profile-picture img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border: none; /
}

/*Profile Picture*/

/*Input-Type CSS*/
/* Style for input boxes */
.form-box-reschedule input[type="text"],
.form-box-reschedule input[type="email"],
.form-box-reschedule input[type="password"],
.form-box-reschedule input[type="file"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 6px;
    margin-bottom: 20px;
    font-size: 1em;
    color: #44561c;
    background-color: #f2f2f2;
    transition: border-color 0.3s, background-color 0.3s;
}

/* Style for input boxes when focused */
.form-box-reschedule input[type="text"]:focus,
.form-box-reschedule input[type="email"]:focus,
.form-box-reschedule input[type="password"]:focus,
.form-box-reschedule input[type="file"]:focus {
    border-color: #44561c;
    background-color: #fff;
    outline: none;
    box-shadow: 0 0 5px rgba(68, 86, 28, 0.5);
}

/* Style for the button */
.form-box-reschedule .btn {
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
    transition: background-color 0.3s;
}

.form-box-reschedule .btn:hover {
    background-color: #162938;
}

/* Style for labels */
.form-box-reschedule p{
    font-size: 1em;
    color: #44561c;
    font-weight: 500;
    margin-bottom: 5px;
}
/*Input-Type CSS*/
</style>

<div class="wrapper">
    <div class="form-box login">
        <h2>User Profile</h2>
        <br>
        
        <!--Profile Picture-->
        <?php
        if($row['Profile_Pic'] == null)
        {
             echo'<div class="profile-picture">
             <img src="https://cdn-icons-png.flaticon.com/512/3106/3106921.png" class="profile-picture">
             </div>';
        }
        else{
            echo '<div class="profile-picture"> <img src='.$row['Profile_Pic'].'></div>';
        }
        
            echo "<div class='form-box-reschedule'>";
            echo "<form action=userprofile.php method=post>";
            echo "<input type=hidden name=muid value=".$_SESSION['User_ID'].">";
            echo "<br><br><p>User ID: ".$row['User_ID']."</p><br>";
            echo "<p>Customer Name: <br><input type=text name=muname value =\"" . $row['Name'] . "\"></p>";
            echo "<p>Email: <br><input type=email name=muemail value=".$row['Email']."></p>";
            echo "<p>Phone Number: <br><input type=text name=muphonenum value=".$row['Phone_Num']."></p>";
            echo "<p>Password: <br><input type=password name=mupsw value=".$row['Password']."></p>";
            echo "<p>Profile Image: <br><input type=file name=img id=profile-image value=".$row['Profile_Pic']."></p>";
            echo "<button type='submit' class='btn' name='updateprofile'>Edit Profile</button>";
            echo "</form>";
            echo "</div>";

        if(isset($_POST["updateprofile"])){
            $muname=$_POST["muname"]; $muemail=$_POST["muemail"]; $muphonenum=$_POST["muphonenum"]; $mupsw=$_POST["mupsw"]; $mupic=$_POST["img"]??null;
            $con=mysqli_connect("localhost", "root", null, "cocomelon");
            if($mupic != null)
            $sql="update personal_details set Name='$muname', Email='$muemail', Phone_Num='$muphonenum', Password='$mupsw', Profile_Pic='$mupic' WHERE User_ID='".$_SESSION['User_ID']."'";
            else
            $sql="update personal_details set Name='$muname', Email='$muemail', Phone_Num='$muphonenum', Password='$mupsw' WHERE User_ID='".$_SESSION['User_ID']."'";
                $result=mysqli_query($con, $sql);
                echo'<script>window.location.replace("userprofile.php");</script>';
            }
        
        ?>
    </div>
</div>



<script src="script.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
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

<script>
/*Profile Picture*/
    document.getElementById("profile-image").addEventListener("change", function (event) {
        const fileInput = event.target;
        const file = fileInput.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                const newProfilePicture = e.target.result;
                document.querySelector(".profile-picture img").src = newProfilePicture;
            };
            reader.readAsDataURL(file);
        }
    });
/*Profile Picture*/

    const wrapper = document.querySelector('.wrapper');
    
    const trainerNeededSelect = document.getElementById('trainer-needed');
    const trainerNameInput = document.getElementById('trainer-name-input');
    
    trainerNeededSelect.addEventListener('change', () => {
        if (trainerNeededSelect.value === 'yes') {
            trainerNameInput.style.display = 'block';
        } else {
            trainerNameInput.style.display = 'none';
        }
    });
    
</script>

</body>
</html>
