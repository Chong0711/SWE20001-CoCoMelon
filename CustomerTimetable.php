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
                <a href='#'>Booking History</a>
                <a href='login.php' id='logout' onclick='closeForm()'>Logout</a>";

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
    border: 2px solid #ccc;
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

.section{
    padding: 2rem 0%;
}

.search-container {
    padding: 20px;
    text-align: center;
}

.search-container label {
    font-size: 1.2em;
    margin-right: 10px;
}

.search-container input[type="date"],
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
    <h2>Search Trainer Availability</h2><br>
    <!-- Create a container for the search form -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label>Date:</label>
        <input type="date" name="search_date" required>
        
        <label>Trainer Name:</label>
        <select name="search_trainer" required>
            <option value="John">Select a Trainer</option>
            <option value="John">John</option>
            <option value="Bob">Bob</option>
            <option value="Lina">Lina</option>
    </select>
    
    <button type="submit" class="btn">Search</button>
</form>
</div>
</section>

<section>
    <div class='search-results' id='result'>
        <?php $html?>
    </div>
</section>

<?php
// Handle the search based on the selected date
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search_date = $_POST["search_date"];

    if (!empty($search_date)) {
        // Ensure that the date format is valid
        $parsed_date = date_create($search_date);

        if ($parsed_date !== false) {
            $formatted_date = $parsed_date->format("Y-m-d");

            // Corrected SQL query to order by date and time
            $sql = "SELECT Trainer_ID, Trainer_Name, Date, 
        DATE_FORMAT(From_Time, '%h:%i %p') AS From_Time, 
        DATE_FORMAT(To_Time, '%h:%i %p') AS To_Time, Status 
        FROM timetable 
        WHERE Date = '$formatted_date'
        ORDER BY STR_TO_DATE(CONCAT(Date, ' ', From_Time), '%Y-%m-%d %h:%i %p') ASC";

            $result = mysqli_query($con, $sql);

            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    $html = "<h1 class='heading'>Availability</h1><br><table>";
                    $html .= "<tr><th>Trainer ID</th><th>Trainer Name</th><th>Date</th><th>From (Time)</th><th>To (Time)</th><th>Status</th></tr>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        $html .= "<tr>";
                        $html .= "<td>{$row['Trainer_ID']}</td>";
                        $html .= "<td>{$row['Trainer_Name']}</td>";
                        $html .= "<td>{$row['Date']}</td>";
                        $html .= "<td>{$row['From_Time']}</td>";
                        $html .= "<td>{$row['To_Time']}</td>";
                        $html .= "<td>{$row['Status']}</td>";
                        $html .= "</tr>";
                    }
                    $html .= "</table>";

                    echo "<div class='search-results' id='result'>$html</div>";
                } else {
                    echo "<div class='search-results' id='result'>No records found for the specified date.</div>";
                }
            } else {
                echo "Error: " . mysqli_error($con);
            }
        } else {
            echo "Invalid date format. Please use the format: YYYY-MM-DD";
        }
    } else {
        echo "Date is required for this search.";
    }

    mysqli_close($con);
}
?>

</section>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
  console.log("Opening form for User ID: " + userId);
}

function closeForm() {
    document.getElementById("myForm").style.display = "none";
}

 function toggleTables() {
    var year = document.getElementById('date').value;
    var searchOption = document.getElementById('search_option').value;
    var searchQuery = document.getElementById('search_query').value;
    var resultsqlTable = document.getElementById('resultsql');
    var resultyearTable = document.getElementById('resultyear');
}

// Call the function when the page loads to initialize table visibility
window.onload = toggleTables;
</script>
</body>
</html>
