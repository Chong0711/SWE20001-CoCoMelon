<?php
session_start();

// Include your database connection code here if not already included
$con = mysqli_connect("localhost", "root", null, "cocomelon");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
$query = "SELECT * FROM personal_details WHERE User_ID = '".$_SESSION['User_ID']."'" ;
$result = mysqli_query($con, $query);
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
        <div class="dropdown">
        <button class="dropbtn"><b>Services</b></button>
            <div class="dropdown-content">
                <!-- Add links or content for the dropdown here -->
                <a href="addbooking.php">Add Booking</a>
                <a href="editbooking.php">Check Booking</a>
                <a href="membership.php">Membership Management</a>
                <a href="edittimetable.php">Trainer Timetable</a>
                <a href="adminmanageacc.php">Manage Account</a>
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
            <a href='login.php' id='logout' name='logout' onclick='closeForm()'>Logout</a>";

            echo "</div> </div>";
        }
        ?>
    </nav>
    <script type="text/javascript">
        document.getElementById("logout").onclick = function () {
            location.href = "login.php";
            <?php session_destroy();?>
        };
    </script>
</header>
<title>Membership Management</title>
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

.btn{
    width: 30%;
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
.form .cancel {
  background-color: #D92121;
}

label{
    font-size: 20px;
}

section{
    padding: 2rem 0%;
    overflow: auto;
}

.input{
    width: auto;
    height: 30px;
}
.heading{
    text-align: center;
    font-size: 25px;
}
.wrapper {
    position: relative;
    width: 100%;
    height: 200px;
    background: transparent;
    border: 2px solid rgba(255, 255, 255, .5);
    border-radius: 20px;
    backdrop-filter: blur(20px);
    box-shadow: 0 0 30px rgba(0, 0, 0, .5);
    display: flex;
    justify-content: center;
    align-items: center;
    transform: scale(1);
    transition: transform .5s ease, height .2s ease;
    flex-direction: column;
    margin: 100px 0px 0px 0px;
    padding: 100px 0px 100px 0px;
}
</style>
<body>
<section>
    <section>
    <?php
    // Ensure that the form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve the data from the form
        $user_id = $_POST["user_id"];
        $status = $_POST["status"];
        $total_purchases = $_POST["total_purchases"];
        $active_date = $_POST["active_date"];
        $end_date = $_POST["end_date"];

        echo "<div class='wrapper'>";
        echo "<h2 class='heading'> The Member You Want to Edit!</h2><br>";
        echo "User ID: " . $user_id . "<br>";
        echo "Status: " . $status . "<br>";
        echo "Total Purchases: " . $total_purchases . "<br>";
        echo "Active Date: " . $active_date . "<br>";
        echo "End Date: " . $end_date . "<br>";
        echo "</div><br>";
    }
    ?>
    </section>
        
    <section>
        <!-- Add your HTML content, including the form, here -->
        <form action="membership.php" method="post" class="form">
            <h2 class="heading">Edit Member Status</h2><br>

            <!-- Add hidden fields for User ID -->
            <input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id; ?>">

            <label for="status">Status:</label>
            <select id="edit_status" name="edit_status" class="input">
                <option value="Inactive">Inactive</option>
                <option value="Active">Active</option>
            </select>

            <label for="active_date">Active Date:</label>
            <input type="date" placeholder="Enter Active Date" name="edit_active_date" id="edit_active_date" class="input" required>

            <label for="end_date">End Date:</label>
            <input type="date" placeholder="Enter End Date" name="edit_end_date" id="edit_end_date" class="input" required>

            <center>
                <button type="submit" name="update" class="btn">Update</button>
                <button type="button" class="btn cancel" id="cancelbtn" onclick="closeForm()">Return</button>
            </center>
        </form>
    </section>
</section>

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
</body>
</html>
