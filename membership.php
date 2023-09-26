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
        <a href="#"><b>User Profile</b></a>
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
/*dropdown button*/

/*dropdown button
/*navigation bar*/

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
    display: flex;
    flex-direction: column;
    margin: 0 auto;
    max-width: 400px;
    padding: 40px;
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
}

th {
    background-color: #f2f2f2;
}
/* table view */
</style>

<div class="search-container">
        <!-- Create a container for the search form -->
        <form method="post" action="#">
            <label for="search">Search by:</label>
            <select name="search_option" id="search_option" class="search-option">
                <option value="year">Year</option>
                <option value="email">Email</option>
                <option value="phone">Phone Number</option>
            </select>
            <input type="text" name="search_query" id="search_query" class="search-option" required>
            <button type="submit" class="btn">Search</button>
        </form>
    </div>

    <div class="search-results">
        <!-- This div will contain the search results -->
    </div>
<?php
// Handle the search based on the selected option
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search_option = $_POST["search_option"];
    $search_query = $_POST["search_query"];

    // Perform the search query based on the selected option
    switch ($search_option) {
        case "year":
            // Perform a query to get customer info for a specific year
            $sql = "SELECT customer_id, membership_status, COUNT(*) AS total_purchases FROM purchases WHERE YEAR(purchase_date) = '$search_query' GROUP BY customer_id";
            break;
        case "email":
            // Perform a query to get customer info by email
            $sql = "SELECT customer_id, membership_status, COUNT(*) AS total_purchases FROM purchases WHERE customer_email = '$search_query'";
            break;
        case "phone":
            // Perform a query to get customer info by phone number
            $sql = "SELECT customer_id, membership_status, COUNT(*) AS total_purchases FROM purchases WHERE customer_phone = '$search_query'";
            break;
        default:
            echo "Invalid search option.";
    }


    if (isset($sql)) {
        $result = mysqli_query($con, $sql);

        if ($result) {
            // Start creating the HTML for the results
            $html = "<table>";
            $html .= "<tr><th>Customer ID</th><th>Membership Status</th><th>Total Purchases</th><th>Action</th></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                $html .= "<tr>";
                $html .= "<td>{$row['customer_id']}</td>";
                $html .= "<td>{$row['membership_status']}</td>";
                $html .= "<td>{$row['total_purchases']}</td>";
                $html .= "<td><button onclick=\"activateDeactivate({$row['customer_id']})\">Activate/Deactivate</button></td>";
                $html .= "</tr>";
            }
            $html .= "</table>";

            // Display the HTML in the search-results container
            echo "<div class='search-results'>$html</div>";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }

    // Close the database connection
    mysqli_close($con);
}
?>

<script>
    function activateDeactivate(customerId) {
        // Send an AJAX request to update the customer's status in the database
        // You will need to implement this part using JavaScript and PHP
        // After successfully updating the status, you can update the UI as needed
        alert(`Customer ${customerId} status updated.`);
    }
</script>
</body>
</html>
