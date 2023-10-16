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
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
    <title>SmashIt Badminton Academy</title>
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
    background-size: 100% 400%;
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
    width: 35%;
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
    padding: 100px 0px 0px 0px;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    overflow: auto;
}
.search-container label {
    font-size: 1em;
    color: #44561c;
    font-weight: 500;
    margin-bottom: 30px;
    padding-left: 10px;
}
.search-result
{
    width: 100%; /* Ensure the table takes the full width of the container */
    overflow-x: auto; /* Enable horizontal scrolling if the table is too wide */
    overflow-y: auto;
    margin-top: -30px;
    padding: 20px;
}

.search-option{
    width: auto;
    height: 40px;
    border: none;
    outline: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 1em;
    font-weight: 500;
    margin-top: 20px;
    padding-left: 10px;
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

.heading{
    text-align: center;
    font-size: 25px;
    margin-top: 20px;
}

label{
    font-size: 20px;
}

.search-results.msg, .updatemsg, .errormsg{
    width: auto;
    height: 40px;
    text-align: center;
    padding: 10px 0px 0px 0px;
}

.updatemsg{
    color: green;
}

.errormsg{
    color: red;
}

/* The form */
.form-popup {
  display: none;
  position: absolute;
  margin-top: 20px;
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
.form-container input[type="date"],
.form-container select {
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
.form-container input[type="date"]:focus,
.form-container select:focus {
  background-color: #f1f1f1;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: #D92121;
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

</style>
<section>
    <section>
    <div class="search-container">
        <h2 class='heading'>Search Member Records</h2><br>
        <!-- Create a container for the search form -->
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label><b>Year: &nbsp;</b></label>
            <input type="text" name="year" id="search_year" class="search-option" required>

            <label for="search"><b>Search by: &nbsp;</b></label>
            <select name="search_option" id="search_option" class="search-option">
                <option value="email">Email</option>
                <option value="phone">Phone Number</option>
            </select>
            <input type="text" name="search_query" id="search_query" class="search-option">
            <center><button type="submit" class="btn" a href="#result">Search</button></center>
        </form>
    </div>
    </section>

    <section>
    <div class='search-results' id="result">
        <?php $html?>
    </div>
    

<?php
// Handle the search based on the selected option
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["search_option"]) && isset($_POST["search_query"]) && isset($_POST["year"])) {
    $_SESSION['search_option'] = $_POST["search_option"];
    $_SESSION['search_query'] = $_POST["search_query"];
    $_SESSION['year'] = $_POST["year"];

    $search_option =$_SESSION['search_option'];
    $search_query = $_SESSION['search_query'];
    $year = $_SESSION['year'];

    if (!empty($year)) {
        if ($search_option === "email" && !empty($search_query)) {
            // If both year and email are provided, get records for that user in that year
            $sql = "SELECT m.User_ID, m.Status, COUNT(p.Cust_ID) AS Total_Purchases, m.Active_Date, m.End_Date  
            FROM membership m
            LEFT JOIN payment p ON m.User_ID = p.Cust_ID
            JOIN personal_details u ON m.User_ID = u.User_ID
            WHERE YEAR(p.Payment_Date) = '$year' 
                AND u.Email = '$search_query'
            GROUP BY m.User_ID
            ORDER BY Total_Purchases";
        } elseif ($search_option === "phone" && !empty($search_query)) {
            // If both year and phone number are provided, get records for that user in that year
            $sql = "SELECT m.User_ID, m.Status, COUNT(p.Cust_ID) AS Total_Purchases, m.Active_Date, m.End_Date  
            FROM membership m
            LEFT JOIN payment p ON m.User_ID = p.Cust_ID
            JOIN personal_details u ON m.User_ID = u.User_ID
            WHERE YEAR(p.Payment_Date) = '$year' 
                AND u.Phone_Num = '$search_query'
            GROUP BY m.User_ID
            ORDER BY Total_Purchases";
        } else {
            // If only year is provided or if year and email/phone are provided but email/phone is empty
            // Get records for all users in that year
            $sql = "SELECT m.User_ID, m.Status, COUNT(p.Cust_ID) AS Total_Purchases, m.Active_Date, m.End_Date  
            FROM membership m
            LEFT JOIN payment p ON m.User_ID = p.Cust_ID
            GROUP BY m.User_ID
            ORDER BY Total_Purchases";
        }
    }

    if (isset($sql)) {
    $result = mysqli_query($con, $sql);

        if ($result) {
            // Check if there are any rows in the result set
            if (mysqli_num_rows($result) > 0) {
                // Start creating the HTML for the results
                $html = "<br><h2 class='heading'>Results</h2><br><table>";
                $html .= "<tr><th>Customer ID</th><th>Membership Status</th><th>Total Purchases</th><th>Active Date</th><th>End Date</th><th>Action</th></tr>";
                while ($row = mysqli_fetch_assoc($result)) {
                    $html .= "<tr>";
                    $html .= "<td>{$row['User_ID']}</td>";
                    $html .= "<td>{$row['Status']}</td>";
                    $html .= "<td>{$row['Total_Purchases']}</td>";
                    $html .= "<td>{$row['Active_Date']}</td>";
                    $html .= "<td>{$row['End_Date']}</td>";
                    $html .= "<td><button class='editbtn' onclick='openForm(\"{$row['User_ID']}\", \"{$row['Status']}\", \"{$row['Total_Purchases']}\", \"{$row['Active_Date']}\", \"{$row['End_Date']}\")'>Edit</button></td>";
                    $html .= "</tr>";
                }

                $html .= "</table>";

                // Display the HTML in the search-results container
                echo "<div class='search-results'>$html</div>";
            } else {
                // No results found, display a message
                echo "<div class='search-results msg'><br><b>No members found.</b></div>";
            }
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
}
}
?>
</section>
<?php

// Handle editing trainer availability
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    $user_id = $_POST["user_id"];
    $edit_status = $_POST["edit_status"];
    $total_purchase = $_POST["total_purchase"];
    $edit_active_date = $_POST["edit_active_date"];
    $edit_end_date = $_POST["edit_end_date"];

    // Modify the SQL query to update the status based on trainer name and date
    $update_sql = "UPDATE membership SET Status = '$edit_status', Active_Date = '$edit_active_date', End_Date = '$edit_end_date'  WHERE User_ID = '$user_id'";

    if (mysqli_query($con, $update_sql)) {
        echo "<script>alert('Membership status updated successfully.');</script>";
    } else {
        echo "Error updating membership: " . mysqli_error($con);
    }
}

// Close the database connection
mysqli_close($con);
?>
<!-- the form-->
    <section>
        <section><br></section>
        <div class="form-popup" id="myForm">
            <!-- Add your HTML content, including the form, here -->
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form-container">
                <h2 class="heading">Edit Member Status</h2><br>

                <!-- Add hidden fields for User ID -->
                <input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id; ?>">

                <label for="status">Status:</label>
                <select id="edit_status" name="edit_status" class="input">
                    <option value="Inactive">Inactive</option>
                    <option value="Active">Active</option>
                </select>
                <br>

                <input type="hidden" id="total_purchase" name="total_purchase" value="<?php echo $total_purchase; ?>">

                <label for="active_date">Active Date:</label>
                <input type="date" placeholder="Enter Active Date" name="edit_active_date" id="edit_active_date" class="input" required>
                <br>

                <label for="end_date">End Date:</label>
                <input type="date" placeholder="Enter End Date" name="edit_end_date" id="edit_end_date" class="input" required>

                <center>
                    <button type="submit" name="update" class="btn">Update</button>
                    <button type="button" class="btn cancel" id="cancelbtn" onclick="closeForm()">Return</button>
                </center>
            </form>
        </div>
    </section>
</section>

<script>
function openForm(UserID, Status, TotalPurchases, ActiveDate, EndDate) {
  // Populate the hidden fields and form fields with trainer information
  document.getElementById("user_id").value = UserID;
  document.getElementById("edit_status").value = Status;
  document.getElementById("total_purchase").value = TotalPurchases;
  document.getElementById("edit_active_date").value = ActiveDate;
  document.getElementById("edit_end_date").value = EndDate;

  // Display the form
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  // Reset the form fields to their initial state
  document.getElementById("user_id").value = "";
  document.getElementById("edit_status").value = "";
  document.getElementById("total_purchase").value = "";
  document.getElementById("edit_active_date").value = "";
  document.getElementById("edit_end_date").value = "";

  // Hide the form
  document.getElementById("myForm").style.display = "none";
}

 function toggleTables() {
    var year = document.getElementById('search_year').value;
    var searchOption = document.getElementById('search_option').value;
    var searchQuery = document.getElementById('search_query').value;
    var resultsqlTable = document.getElementById('resultsql');
    var resultyearTable = document.getElementById('resultyear');

    if (year && (searchOption === "email" || searchOption === "phone")) {
        // User entered year and either email or phone number
        resultsqlTable.style.display = 'block'; // Hide result 1 table
        resultyearTable.style.display = 'none'; // Show result 2 table
    } else {
        // User didn't enter year or entered a different search option
        resultsqlTable.style.display = 'none'; // Show result 1 table
        resultyearTable.style.display = 'block'; // Hide result 2 table
    }
}

// Call the function when the page loads to initialize table visibility
window.onload = toggleTables;
</script>
</body>
</html>
