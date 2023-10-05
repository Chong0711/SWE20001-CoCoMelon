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

/*Profile Picture*/
.profile-picture {
    width: 150px; 
    height: 150px; 
    border-radius: 50%; 
    overflow: hidden; 
    margin: 0 auto;
}

.profile-picture img {
    width: 100%;
    height: 100%;
}

/*Profile Picture*/

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
        
            echo "<div class='form-box reschedule'>";
            echo "<form action=userprofile.php method=post>";
            echo "<input type=hidden name=muid value=".$_SESSION['User_ID'].">";
            echo "<p>User ID: ".$row['User_ID']."</p>";
            echo "<p>Customer Name: <input type=text name=muname value =\"" . $row['Name'] . "\"></p>";
            echo "<p>Email: <input type=email name=muemail value=".$row['Email']."></p>";
            echo "<p>Phone Number: <input type=text name=muphonenum value=".$row['Phone_Num']."></p>";
            echo "<p>Password: <input type=password name=mupsw value=".$row['Password']."></p>";
            echo "<p>Profile Image: <input type=file name=img value=".$row['Profile_Pic']."></p>";
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



<script src="script.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


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