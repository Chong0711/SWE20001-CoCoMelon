<?php
session_start();
// this con is used to connect with the database
$con=mysqli_connect("localhost", "root", null, "cocomelon");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
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
        <div class="dropdown">
        <button class="dropbtn"><b>Services</b></button>
            <div class="dropdown-content">
                <!-- Add links or content for the dropdown here -->
                <a href="addbooking.php">Add Booking</a>
                <a href="editbooking.php">Check Booking</a>
                <a href="membership.php">Membership Management</a>
                <a href="adminedittimetablestatus.php">Trainer Timetable</a>
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
    background-position: center;*/

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

.search-container {
    padding: 0px 0px 0px 0px;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    overflow: auto;
    margin-bottom: 20px; /* Add margin at the bottom to separate from search results */
}
.search-result
{
    width: 100%; /* Ensure the table takes the full width of the container */
    overflow-x: auto; /* Enable horizontal scrolling if the table is too wide */
    margin-top: 20px;
}
.search-option
{
    width: auto;
    height: 30px;
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

/*pop out form*/
/* Button used to open the contact form - fixed at the bottom of the page */
.editbtn {
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

/* The form */
.form-popup {
  display: none;
  position: absolute;
  margin-bottom: 0px;
  right: 570px;
  border: 2px solid rgba(255, 255, 255, 0.5);
  border-radius: 20px;
  backdrop-filter: blur(20px);
  box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);
  z-index: 9;
  width: 400px; /* Set the width to match Part B */
  background: transparent; /* Change background to match Part B */
}

/* Add styles to the form container */
.form-container {
  max-width: 100%; /* Set max-width to 100% to match Part B */
  padding: 20px; /* Adjust padding */
  background-color: transparent; /* Change background to match Part B */
}

/* Full-width input fields */
.form-container input[type="text"],
.form-container input[type="password"] {
  width: 100%;
  padding: 10px; /* Adjust padding */
  margin: 10px 0; /* Adjust margin */
  border: 1px solid black;
  border-radius: 6px;
  background-color: transparent;
  font-size: 1em;
  outline: none;
}

/* When the inputs get focus, do something */
.form-container input[type="text"]:focus,
.form-container input[type="password"]:focus {
  background-color: #f1f1f1;
}

/* Set a style for the submit/login button */
.form-container .btn {
  width: 100%;
  height: 45px;
  background: #8888ec;
  border: none;
  outline: none;
  border-radius: 6px;
  cursor: pointer;
  font-size: 1em;
  color: #fff;
  font-weight: 500;
  margin-top: 10px; /* Adjust margin-top */
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover,
.open-button:hover {
  opacity: 1;
}

.form-container label{
    font-size: 1em;
    color: #44561c;
    margin-right: 10px;
}

.form-popup h1{
    text-align: center;
    margin-top: 30px;
}

/*pop out form*/

.section{
    padding: 2rem 0%;
}

.heading h1{
    text-align: center;
    margin-top: -10px;
}

.search-container {
    padding: 20px;
    text-align: center;
}

.search-container label {
    font-size: 1.2em;
    margin-right: 10px;
}

.search-container input[select="trainer_name"],
.search-container select {
    width: 200px;
    height: 30px;
    font-size: 1em;
    margin-right: 10px;
}

/* Style the search results table */
.search-results {
    margin-top: -30px;
    padding: 20px;
    text-align: center;
}

.search-results h1 {
    font-size: 1.5em;
    margin-bottom: -10px;
}

.search-container label{
    font-size: 1em;
    color: #44561c;
    font-weight: 500;
    margin-bottom: 5px;
}

/*Scroll smooth*/
html{
    scroll-padding-top: 6rem;
}

@media(max-width:991px){


    html{
        font-size: 55%;
    }
    header{
        padding:2rem;
    }

}

@media(max-width:991px){


    html{
        font-size: 50%;
    }
}
/*Scroll smooth*/
</style>
<section>

<section>
<div class="search-container">
    <h2>Search Trainers</h2><br>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="trainer_name">Trainer Name:</label>
            <select name="trainer_name" id="trainer_name" class="search-option">
                <option value="">Select a Trainer</option>
                <?php
                    // Removed the duplicate database connection since it's already established at the beginning
                    $query = "SELECT * FROM personal_details WHERE Roles='trainer'";
                    $result = mysqli_query($con, $query);
                    while($row = mysqli_fetch_array($result)) {
                        echo "<option value='" . $row['User_ID'] . "'>" . $row['Name'] . "</option>";
                    }
                ?>
            </select>

            <!-- Add a date input field -->
            <label for="training_date">Training Date:</label>
            <input type="date" name="training_date" id="training_date" class="search-option">

            <button type="submit" class="btn" name="search">Search</button>
        </form>

</div>
</section>

<section>
    <div class='search-results' id='result'>
        <?php $html?>
    </div>
</section>

<?php
// Handle the search based on the selected trainer name
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["search"])) {
    $trainer_name = $_POST["trainer_name"];
    $training_date = $_POST["training_date"];

    if (!empty($trainer_name)) {

        $formatted_training_date = date("Y-m-d", strtotime($training_date));

        // Modify the SQL query to search for trainers with the selected name
        $sql = "SELECT Trainer_ID, Trainer_Name, Date, From_Time, To_Time, Status FROM Timetable WHERE Trainer_ID = '$trainer_name'";

    if (!empty($training_date)) {
                    $sql .= " AND Date = '$training_date'";
                }
        $result = mysqli_query($con, $sql);

        if ($result) {
            // Check if there are any rows in the result set
            if (mysqli_num_rows($result) > 0) {
                // Start creating the HTML for the results
                $html = "<div class='heading'><h1>Trainer Availability</h1></div><br><table>";
                $html .= "<tr><th>Trainer ID</th><th>Trainer Name</th><th>Date</th><th>From (Time)</th><th>To (Time)</th><th>Status</th><th>Action</th></tr>";
                while ($row = mysqli_fetch_assoc($result)) {
                    $html .= "<tr>";
                    $html .= "<td>{$row['Trainer_ID']}</td>";
                    $html .= "<td>{$row['Trainer_Name']}</td>";
                    $html .= "<td>{$row['Date']}</td>";
                    $html .= "<td>{$row['From_Time']}</td>";
                    $html .= "<td>{$row['To_Time']}</td>";
                    $html .= "<td>{$row['Status']}</td>";
                    $html .= "<td><button class='editbtn' onclick='openForm(\"{$row['Trainer_ID']}\", \"{$row['Status']}\", \"{$row['Trainer_Name']}\", \"{$row['Date']}\")'>Edit</button></td>";
                    $html .= "</tr>";
                }
                $html .= "</table>";

                // Display the HTML in the search-results container
                echo "<div class='search-results' id='result'>$html</div>";
            } else {
                // No results found, display a message
                echo "<div class='search-results' id='result'>Did not find any results.</div>";
            }
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
}

// Handle editing trainer availability
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    $trainer_id = $_POST["trainer_id"];
    $edit_status = $_POST["edit_status"];
    $edit_trainer_name = $_POST["edit_trainer_name"];
    $edit_training_date = $_POST["edit_training_date"];

    // Modify the SQL query to update the status based on trainer name and date
    $update_sql = "UPDATE Timetable SET Status = '$edit_status' WHERE Trainer_ID = '$trainer_id' AND Trainer_Name = '$edit_trainer_name' AND Date = '$edit_training_date'";

    if (mysqli_query($con, $update_sql)) {
        echo "<script>alert('Availability updated successfully.');</script>";
    } else {
        echo "Error updating availability: " . mysqli_error($con);
    }
}

// Close the database connection
mysqli_close($con);
?>


<!-- The form -->
<div class="form-popup" id="myForm">
    <h1>Edit Trainer Availability</h1>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form-container">

    <!-- Add hidden fields for User ID and Trainer ID -->
    <input type="hidden" id="user_id" name="user_id" value="">
    <input type="hidden" id="trainer_id" name="trainer_id" value="">
    <input type="hidden" id="edit_trainer_name" name="edit_trainer_name" value="">
    <input type="hidden" id="edit_training_date" name="edit_training_date" value="">


    <label for="status"><b>Status:</b></label>
    <input type="text" placeholder="Enter Status" name="edit_status" id="edit_status" required>

    <button type="submit" class="btn" name="update">Update</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>
</section>

<script>
function openForm(trainerId, trainerStatus, trainerName, trainingDate) {
  // Populate the hidden fields and form fields with trainer information
  document.getElementById("user_id").value = trainerId;
  document.getElementById("trainer_id").value = trainerId;
  document.getElementById("edit_status").value = trainerStatus;
  document.getElementById("edit_trainer_name").value = trainerName;
  document.getElementById("edit_training_date").value = trainingDate;

  // Display the form
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  // Reset the form fields to their initial state
  document.getElementById("user_id").value = "";
  document.getElementById("trainer_id").value = "";
  document.getElementById("edit_status").value = "";
  document.getElementById("edit_trainer_name").value = "";
  document.getElementById("edit_training_date").value = "";

  // Hide the form
  document.getElementById("myForm").style.display = "none";
}

// Call the function when the page loads to initialize table visibility
window.onload = toggleTables;
</script>

</body>
</html>
