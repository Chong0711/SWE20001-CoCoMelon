<?php
session_start();
$servername = "localhost";
$username = "root";
$password = null;
$dbname = "cocomelon";
$con = new mysqli($servername, $username, $password, $dbname);
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
        <a href="homepage.php#home"><b>Home</b></a>
        <a href="homepage.php#about"><b>About</b></a>
        <a href="homepage.php#contact"><b>Contact</b></a> 
        <a href='FeedbackForm.php'><b>Feedback</b></a>
        <div class="dropdown">
        <button class="dropbtn"><b>Services</b></button>
            <div class="dropdown-content">
                <!-- Add links or content for the dropdown here -->
                <a href="faq.php">FAQ</a>
                <a href="customertimetable.php">Trainer Timetable</a>
                <a href="addbooking.php">Book Court Now!</a>
                <a href="editbooking.php">Any Changes To Bookings</a>
                <a href='refundform.php'>Refund</a>
            </div>
        </div>
        <?php 
        if(!ISSET($_SESSION['User_ID'])){
            echo "<a href='login.php'><b>Login</b></a>";
        }else{
            $query = "SELECT * FROM personal_details WHERE User_ID = '".$_SESSION['User_ID']."'" ;
            $result = mysqli_query($con, $query);
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
    background-size: 1550px 3000px;
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

.navigation a:nth-child(4) {
   margin-right: 40px; /* Adjust the margin value as needed */
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

.wrapper {
    position: relative;
    width: 400px;
    height: auto; /*changed the form box's height as auto*/
    background: transparent;
    border: 5px solid rgba(255, 255, 255, .5);
    border-radius: 20px;
    backdrop-filter: blur(20px);
    display: flex;
    justify-content: center;
    align-items: center;
    transform: scale(1);
    transition: transform .5s ease, height .2s ease;
    margin-top: 20px;
}

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
.btn.cancel{
    background: #264B56;
}

/* table view */
table {
    width: 100%;
    border-collapse: collapse;
    padding: 20px 10px 0px, 10px;
}

th, td {
    border: 2px solid rgba(255, 255, 255, .5);
    padding: 10px;
    text-align: left;
    text-align: center;
}

th {
    background-color: #f2f2f2;
}
/* table view */
section{
    padding: 2rem 0%;
    overflow: auto;
}

.heading{
    text-align: center;
    font-size: 25px;
    padding-top: 100px;
}
h3{
    text-align: center;
}
.container{
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    overflow: auto;
}
label{
    font-size: 1em;
    font-weight: 500;
    font-weight: bold;
}

select.search-option{
    width: autp;
    height: 45px;
    border: none;
    outline: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 1em;
    font-weight: 500;
    margin-top: 20px;
    padding-left: 10px;
}
.box{
    width:1000px;
    height:auto;
    display:grid;
    grid-template-columns: 500px 200px;
    grid-row: auto auto;
}
.historytable{
    padding:10px;
    display:flex;
    align-items:center;
    justify-content:center;
  }
</style>

<section>
    <h2 class="heading">Booking History</h2><br>
    <h3>Current</h3><br>
        <div class="container">
        <?php
        $today = date("Y-m-d"); // Get today's date
        $historyquery = "SELECT * FROM booking WHERE Cust_ID = '" . $_SESSION['User_ID'] . "' AND Book_Date >= '$today'";

        $historyresult = mysqli_query($con, $historyquery);

        if ($historyresult->num_rows > 0) {
            echo "<div class='box'>";
            while ($historyrow = mysqli_fetch_assoc($historyresult)) {
                echo '<div class="wrapper historytable"> <table>';
                echo '<tr>
                <td>Booking ID</td>
                <td>' . $historyrow['Book_ID'] . '</td></tr>';

                echo '<tr>
                <td>Booking Date</td>
                <td>' . $historyrow['Book_Date'] . '</td></tr>';

                echo '<tr>
                <td>Court</td>
                <td>' . $historyrow['Court'] . '</td></tr>';

                echo '<tr>
                <td>Booking Start Time</td>
                <td>' . $historyrow['Book_StartTime'] . '</td></tr>';

                echo '<tr>
                <td>Booking End Time</td>
                <td>' . $historyrow['Book_EndTime'] . '</td></tr>';

                echo '<tr>
                <td>Status</td>
                <td>' . $historyrow['Status'] . '</td></tr>';
                echo '</table></div>';
            }
            echo "</div>";
        } else {
            echo "<b>You do not have any current bookings.</b><br>";
        }
        ?>
        <br><h3>Past</h3><br>
        <section>
        <div class="search-container">
            <!-- Create a container for the search form -->
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <label for="search">Search </label>
                <select name="search_option" id="search_option" class="search-option">
                    <option value="7days">Last 7 days</option>
                    <option value="15days">Last 15 days</option>
                    <option value="30days">Last 30 days</option>
                </select>
                <button type="submit" class="btn" name="search"a href="#result">Search</button>
            </form>
        </div>
        </section>
        <?php
        // Handle the search based on the selected option
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["search_option"])) {
            $_SESSION['search_option'] = $_POST["search_option"];

            $search_option =$_SESSION['search_option'];

                if ($search_option === "7days") {
                    $sevenDaysAgo = date("Y-m-d", strtotime('-7 days', strtotime($today))); // Calculate 7 days ago
                    $sql = "SELECT * FROM booking WHERE Cust_ID = '" . $_SESSION['User_ID'] . "' AND (Book_Date >= '$sevenDaysAgo' AND Book_Date < '$today')";
                } 
                elseif ($search_option === "15days") {
                    $fifteenDaysAgo = date("Y-m-d", strtotime('-15 days', strtotime($today))); // Calculate 15 days ago
                    $sql = "SELECT * FROM booking WHERE Cust_ID = '" . $_SESSION['User_ID'] . "' AND (Book_Date >= '$fifteenDaysAgo' AND Book_Date < '$today')";
                } 
                elseif ($search_option === "30days") {
                    $thirtyDaysAgo = date("Y-m-d", strtotime('-30 days', strtotime($today))); // Calculate 30 days ago
                    $sql = "SELECT * FROM booking WHERE Cust_ID = '" . $_SESSION['User_ID'] . "' AND (Book_Date >= '$thirtyDaysAgo' AND Book_Date < '$today')";
                }

                if (isset($sql)) {
                $result = mysqli_query($con, $sql);

                    if ($result) {
                        // Check if there are any rows in the result set
                        if (mysqli_num_rows($result) > 0) {
                            // Start creating the HTML for the results
                            $html = "<br><h3 id='result'>Results</h3><br><div class='box'>";
                            while ($row = mysqli_fetch_assoc($result)) {
                                $html .= '<div class="wrapper historytable"> <table>';
                                $html .= '<tr>
                                <td>Booking ID</td> 
                                <td>' . $row['Book_ID'] . '</td></tr>';

                                $html .= '<tr>
                                <td>Booking Date</td>
                                <td>' . $row['Book_Date'] . '</td></tr>';

                                $html .= '<tr>
                                <td>Court</td>
                                <td>' . $row['Court'] . '</td></tr>';

                                $html .= '<tr>
                                <td>Booking Start Time</td>
                                <td>' . $row['Book_StartTime'] . '</td></tr>';

                                $html .= '<tr>
                                <td>Booking End Time</td>
                                <td>' . $row['Book_EndTime'] . '</td></tr>';

                                $html .= '<tr>
                                <td>Status</td>
                                <td>' . $row['Status'] . '</td></tr>';
                                $html .= '</table></div>';
                                    }

                            $html .= "</table></div>";

                            // Display the HTML in the search-results container
                            echo "<div class='search-results'>$html</div>";
                        } else {
                            // No results found, display a message
                            echo "<div class='search-results msg'><br><b>No records found.</b></div>";
                        }
                    } else {
                        echo "Error: " . mysqli_error($con);
                    }
                }
            }
        }
        ?>

    <section>
        <center><button class="btn cancel" onclick="location.href='homepage.php'">Back to Home</button></center>
    </section>
</div>
</section>

</body>
</html>
