<?php
session_start();
// this con is used to connect with the database
$con = mysqli_connect("localhost", "root", null, "cocomelon");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$html = ''; // Initialize $html to an empty string

// Handle the search based on the selected option
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["date"])) {
    $date = $_POST["date"];

    if (!empty($date)) {
        $sql = "SELECT r.Refund_ID, r.Book_ID, b.User_ID, r.Bank, r.Bank_Name, r.Bank_Acc, r.Status, r.Refund_Date, b.Book_Date
                FROM refund r
                JOIN booking b ON r.Book_ID = b.Book_ID
                JOIN personal_details u ON r.User_ID = u.User_ID
                WHERE Refund_Date = '$date'
                ORDER BY r.Refund_ID";
    } else {
        $html = "Date is required.";
    }

    if (isset($sql)) {
        $result = mysqli_query($con, $sql);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $html .= "<br><h2 class='heading'>Results</h2><br>
                <form action='adminrefund.php' method='post'><table>";
                $html .= "<tr><th>Refund ID</th>
                          <th>Book ID</th>
                          <th>User ID</th>
                          <th>Book Date</th>
                          <th>Request Date</th>
                          <th>Bank</th>
                          <th>Name of Bank</th>
                          <th>Bank Account</th>
                          <th>Status</th></tr>";

                while ($row = mysqli_fetch_assoc($result)) {
                    $html .= "<tr>";
                    $html .= "<td><input type='text' class='rid' name='rid' value='" . $row['Refund_ID'] . "' readonly></td>";
                    $html .= "<td>{$row['Book_ID']}</td>";
                    $html .= "<td>{$row['User_ID']}</td>";
                    $html .= "<td>{$row['Book_Date']}</td>";
                    $html .= "<td>{$row['Refund_Date']}</td>";
                    $html .= "<td>{$row['Bank']}</td>";
                    $html .= "<td>{$row['Bank_Name']}</td>";
                    $html .= "<td>{$row['Bank_Acc']}</td>";
                    $html .= "<td><input type='text' name='nstatus' id='edit-status' class='rstatus' value='" . $row['Status'] . "'></td>";
                    $html .= "</tr>";
                }

                $html .= "</table>";
                $html .= "<center><button type='submit' class='btn' name='update'>Update Status</button></center></form";

                $html = "<div class='search-results'>$html</div>";
            } else {
                $html = "<div class='search-results msg'><br><b>No records found.</b></div>";
            }
        } else {
            $html = "Error: " . mysqli_error($con);
        }
    }
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
                <a href="adminhome.php">Admin Homepage</a>
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
    width: 200px;
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
.rstatus {
    border: 1px solid black;
    border-radius: 6px;
    width: 100%;
    padding: 10px; /* Adjust padding */
    margin: 10px 0; /* Adjust margin */
    background-color: transparent;
    font-size: 1em;
    outline: none;
}
.rid{
    width: 100%;
    padding: 10px; /* Adjust padding */
    margin: 10px 0; /* Adjust margin */
    background-color: transparent;
    font-size: 1em;
    outline: none;
    border: none;
    text-align: center;
}

/* When the inputs get focus, do something */
.form-box.reschedule input[type="text"]:focus{
  background-color: #f1f1f1;
}
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

.btn.cancel {
  background-color: #D92121;
  width: 200px;
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
</style>
<section>
    <section>
        <div class="search-container">
            <h2 class='heading'>Search Refund Request</h2><br>
            <!-- Create a container for the search form -->
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <label><b>Date: &nbsp;</b></label>
                <input type="date" name="date" id="search_date" class="search-option" required>
                <center>
                    <button type="submit" class="btn" href="#result">Search</button>
                    <button type="button" class="btn cancel" id="cancelbtn" onclick="closeForm()">Back To Home</button>
                </center>
            </form>
        </div>
    </section>
    <section>
        <div class='search-results' id="result">
            <?php echo $html; ?>
        </div>
    </section>
<?php

// Handle editing trainer availability
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    $refundid = $_POST["rid"];
    $newstatus = $_POST["nstatus"];

    // Modify the SQL query to update the status based on Refund_ID
    $updatesql = "UPDATE refund SET Status='$newstatus' WHERE Refund_ID='$refundid'";
    $result = mysqli_query($con, $updatesql);
    if ($result) {
        echo "<br><div class='updatemsg'><center><b>Record Updated.</b></center></div>";
    } else {
        echo "<br><div class='errormsg'><center><b>Error updating record: " . mysqli_error($con) . "</b></center></div>";
    }
}

// Close the database connection
mysqli_close($con);
?>
</section>

<script>
function toggleTables() {
    var date = document.getElementById('search_date').value;
    var resultTable = document.getElementById('result');

    if (date) {
        resultTable.style.display = 'block';
    }
}

// Call the function when the page loads to initialize table visibility
window.onload = toggleTables;
</script>

<script type="text/javascript">
    document.getElementById("cancelbtn").onclick = function () {
        location.href = "adminhome.php";
    };
</script>
</body>
</html>
