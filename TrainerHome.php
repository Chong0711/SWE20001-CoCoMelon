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
        <a href="#home"><b>Home</b></a>
        <a href="#time"><b>Timetable</b></a>
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
    scroll-behavior: smooth;
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
.navigation a:nth-child(2) {
   margin-right: 35px; /* Adjust the margin value as needed */
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

.home {
    font-family: Quicksand;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    min-height: 100vh;
}

.background-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: url(badminton.jpg) no-repeat;
    background-size: cover;
    background-position: center center;
    z-index: -1; /* Place the background behind the content */
}

.content {
    z-index: 1; /* Place the content in front of the background */
}

.home .content{
    max-width: 40rem;
}

.home .content h2{
    font-size: 2.6rem;
    color: #44561C;
}
  
.heading{
    text-align:center;
    font-size: 2.5em;
    color: #44561C;
    padding: 1em;
    margin: 1em 0;
    width: 1519px;
    background: rgba(90, 132, 85, 0.415);
}

.section{
    padding: 2rem 0%;
}


/*Add Space Between Timetable and Form*/
.TimeTable {
    margin-bottom: 20px;
}

/* Search Form Styles */
.search-container {
    padding: 0px 0px 0px 0px;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    overflow: auto;
    margin-bottom: 20px; /* Add margin at the bottom to separate from search results */
}

/* Result Table Styles */
.search-results {
    width: 100%; /* Ensure the table takes the full width of the container */
    overflow-x: auto; /* Enable horizontal scrolling if the table is too wide */
    margin-top: 20px;
    margin-bottom: 50px; 
}
/*Add Space Between Timetable and Form*/

.search-option
{
    width: auto;
    height: 30px;
}

/* table view */
table {
    width: 50%;
    border-collapse: collapse;
    margin-top: 20px;
    margin-left: auto;
    margin-right: auto;
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

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
/*pop out form*/

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
    <section class="home">
        <div class="background-image" id="home"></div>
        <div class="content">
            <h2>Welcome To Trainer Homepage !</h2>
        </div>
    </section>

    <section>
        <div class="TimeTable" id="time">
            <h1 class="heading">View Timetable</h1>
        </div>
    </section>

<section>

<section>
<div class="search-container">
    <h2>Search Records</h2><br>
    <!-- Create a container for the search form -->
    <form id="search-form" action="trainerhome.php#time" method="post">
        <label>Date: </label>
        <input type="date" name="date" id="search_date" class="search-option" required>
        <button type="submit" class="btn" a href="#result">Search</button>
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
     $user = $_SESSION['User_ID'];
    $search_date = $_POST["date"]; // Change "search_date" to "date"
    if (!empty($search_date)) {
        // Ensure that the date format is valid (you can customize the format)
        $date_format = "Y-m-d"; // Example format: "2023-09-27"
        $parsed_date = date_create_from_format($date_format, $search_date);

        if ($parsed_date !== false) {
            $formatted_date = $parsed_date->format($date_format);

            // Now, search the database for Trainer details for the specified date
            $sql = "SELECT Trainer_ID, Trainer_Name, Date, 
                DATE_FORMAT(From_Time, '%h:%i %p') AS From_Time, 
                DATE_FORMAT(To_Time, '%h:%i %p') AS To_Time, Status 
                FROM timetable
                LEFT JOIN personal_details ON timetable.Trainer_ID = personal_details.User_ID
                WHERE Date = '$formatted_date' AND personal_details.User_ID = '$user'
                ORDER BY Trainer_Name, STR_TO_DATE(CONCAT(Date, ' ', From_Time), '%Y-%m-%d %h:%i %p') ASC";
            
            $result = mysqli_query($con, $sql);

            if ($result) {
                // Check if there are any rows in the result set
                if (mysqli_num_rows($result) > 0) {
                    // Start creating the HTML for the results
                    $html = "<h1 class='heading'>Results</h1><br><table>";
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

                    // Display the HTML in the search-results container
                    echo "<div class='search-results' id='result'>$html</div>";
                } else {
                    // No results found for the specified date, display a message
                    echo "<div class='search-results' id='result'><center><b>No records found for the specified date.</b></center></div>";
                }
            } else {
                echo "Error: " . mysqli_error($con);
            }
        } else {
            echo "Invalid date format. Please use the format: $date_format";
        }
    } else {
        echo "Date is required for this search.";
    }

    // Close the database connection
    mysqli_close($con);
}
?>

</section>

</section>


<script src="script.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


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
