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
<title>Membership Management</title>
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
    /*background: url(Background_SWE2.jpg)no-repeat;
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

.heading{
    text-align:center;
    font-size: 2.5em;
    color: #44561C;
    padding: 1em;
    margin: 5em 50;
    width: auto;
    background: rgba(90, 132, 85, 0.415);
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

.section{
    padding: 2rem 0%;
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
<div class="search-container">
    <h2>Search Records</h2><br>
    <!-- Create a container for the search form -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label>Year: </label>
        <input type="text" name="year" id="search_year" class="search-option" required>
        <label for="search">Search by:</label>
        <select name="search_option" id="search_option" class="search-option">
            <option value="email">Email</option>
            <option value="phone">Phone Number</option>
        </select>
        <input type="text" name="search_query" id="search_query" class="search-option">
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
// Handle the search based on the selected option
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search_option = $_POST["search_option"];
    $search_query = $_POST["search_query"];
    $year = $_POST["year"];

    if (!empty($year)) {
        if ($search_option === "email" && !empty($search_query)) {
            // If both year and email are provided, get records for that user in that year
            $sql = "SELECT u.User_ID, m.Status, COUNT(*) AS Total_Purchases, m.Active_Date, m.End_Date  
            FROM payment p
            JOIN membership m ON p.Cust_ID = m.User_ID 
            JOIN personal_details u ON p.Cust_ID = u.User_ID
            WHERE YEAR(p.Payment_Date) = '$year' 
                AND u.Email = '$search_query'
            GROUP BY Cust_ID
            ORDER BY Total_Purchases";
        } elseif ($search_option === "phone" && !empty($search_query)) {
            // If both year and phone number are provided, get records for that user in that year
            $sql = "SELECT u.User_ID, m.Status, COUNT(*) AS Total_Purchases, m.Active_Date, m.End_Date  
            FROM payment p
            JOIN membership m ON p.Cust_ID = m.User_ID 
            JOIN personal_details u ON p.Cust_ID = u.User_ID
            WHERE YEAR(p.Payment_Date) = '$year' 
                AND u.Phone_Num = '$search_query'
            GROUP BY Cust_ID
            ORDER BY Total_Purchases";
        } else {
            // If only year is provided or if year and email/phone are provided but email/phone is empty
            // Get records for all users in that year
            $sql = "SELECT u.User_ID, m.Status, COUNT(*) AS Total_Purchases, m.Active_Date, m.End_Date  
            FROM payment p
            JOIN membership m ON p.Cust_ID = m.User_ID 
            JOIN personal_details u ON p.Cust_ID = u.User_ID
            WHERE YEAR(p.Payment_Date) = '$year'
            GROUP BY Cust_ID
            ORDER BY Total_Purchases";
        }
    } else {
        echo "Year is required for this search option.";
    }

    if (isset($sql)) {
        $result = mysqli_query($con, $sql);

        if ($result) {
            // Check if there are any rows in the result set
            if (mysqli_num_rows($result) > 0) {
                // Start creating the HTML for the results
                $html = "<h1 class='heading'>Results</h1><br><table>";
                $html .= "<tr><th>Customer ID</th><th>Membership Status</th><th>Total Purchases</th><th>Active Date</th><th>End Date</th><th>Action</th></tr>";
                while ($row = mysqli_fetch_assoc($result)) {
                    $html .= "<tr>";
                    $html .= "<td>{$row['User_ID']}</td>";
                    $html .= "<td>{$row['Status']}</td>";
                    $html .= "<td>{$row['Total_Purchases']}</td>";
                    $html .= "<td>{$row['Active_Date']}</td>";
                    $html .= "<td>{$row['End_Date']}</td>";
                     $html .="<td><button name class='editbtn' action= 'membershipedit'>Edit</button></td>";
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

    // Close the database connection
    mysqli_close($con);
}
?>
<!-- The form -->
<div class="form-popup" id="myForm">
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form-container">
    <h1>Edit User Data</h1>

    <!-- Add hidden fields for User ID -->
    <input type="hidden" id="user_id" name="user_id" value="">

    <label for="status"><b>Status</b></label>
    <input type="text" placeholder="Enter Status" name="edit_status" id="edit_status" required>

    <label for="active_date"><b>Active Date</b></label>
    <input type="text" placeholder="Enter Active Date" name="edit_active_date" id="edit_active_date" required>

    <label for="end_date"><b>End Date</b></label>
    <input type="text" placeholder="Enter End Date" name="edit_end_date" id="edit_end_date" required>

    <button type="submit" class="btn">Update</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
</form>
</div>

<script>
// function openForm(userId, status, activeDate, endDate) {
//     console.log("Opening form for User ID: " + userId);
//     document.getElementById("myForm").style.display = "block";
//     // Populate the form fields with the data
//     document.getElementById("user_id").value = userId;
//     document.getElementById("edit_status").value = status;
//     document.getElementById("edit_active_date").value = activeDate;
//     document.getElementById("edit_end_date").value = endDate;
// }
function openForm() {
  document.getElementById("myForm").style.display = "block";
  console.log("Opening form for User ID: " + userId);
}

function closeForm() {
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
