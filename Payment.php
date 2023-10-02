<?php
session_start();
// this con is used to connect with the database
$con=mysqli_connect("localhost", "root", null, "cocomelon");

// Check the connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if (isset($_POST['confirm'])) 
{
    //get the information
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $phone = $_SESSION['phone'];
    $date = $_SESSION['date'];
    $startTime = $_SESSION['startTime'];
    $endTime = $_SESSION['endTime'];
    $courts = $_SESSION['courts'];
    $trainer = $_SESSION['trainer'];
    $trainerID = $_SESSION['trainerID'];
    $totalPrice = $_SESSION['totalPrice'];

    // //Check if the email exists in the customer database
    // $sqlCheckEmail = "SELECT User_ID FROM personal_details WHERE Email = $email";
    // $stmtCheckEmail = $con->prepare($sqlCheckEmail);
    // $stmtCheckEmail->execute();
    // $resultCheckEmail = $stmtCheckEmail->get_result();

    // if ($resultCheckEmail->num_rows > 0) {
    //     // Email exists in the customer database, retrieve the customer ID
    //     $row = $resultCheckEmail->fetch_assoc();
    //     $customerID = $row['User_ID'];
    // } else {
    //     // Email doesn't exist, create a new customer entry and retrieve the generated customer ID
    //     $userId = "";
    //     $guest = "guest";
    //     $sqlInsertCustomer = "INSERT INTO personal_details (User_ID,Name, Email, Phone_Num, Password, Roles) VALUES ('','$name', '$email','$hpnum', '$psw','user'); 
    //         UPDATE personal_details SET User_ID = concat( User_Str, ID ) ";
    //     $stmtInsertCustomer = $con->prepare($sqlInsertCustomer);
    //     if ($stmtInsertCustomer->execute()) {
    //         $customerID = $stmtInsertCustomer->insert_id;
    //     } else {
    //         echo "Error creating a new customer.";
    //         exit; // Exit the script
    //     }
    // }
        // Insert data into the database (replace with your database schema)
        // $sql = "INSERT INTO booking (Book_ID, Cust_ID, Trainer_ID, Book_Date, Book_StartTime, Book_EndTime, Status, Court, Amount) VALUES ('', 'U8', 'T2', '$date', '$startTime', '$endTime', 'Booked', '$courts', '$totalPrice');
        //     UPDATE booking SET Book_ID = concat( Book_Str, Book_No )";
            // $stmt = $con->prepare($sql);

            // if ($stmt->execute()) {
            //     echo "Booking saved successfully.";
            // } else {
            //     echo "Error: " . $stmt->error;
            // }
     try { //insert to database
            $sql = "INSERT INTO booking (Book_ID, Cust_ID, Trainer_ID, Book_Date, Book_StartTime, Book_EndTime, Status, Court, Amount) VALUES ('', 'U8', 'T2', '$date', '$startTime', '$endTime', 'Booked', '$courts', '$totalPrice');
            UPDATE booking SET Book_ID = concat( Book_Str, Book_No )";
            if (mysqli_multi_query($con, $sql)) {
                do {
                    /* store first result set */
                    if ($result = mysqli_store_result($con)) {
                        while ($row = mysqli_fetch_row($result)) {
                        }
                        mysqli_free_result($con);
                    }
                    /* print divider */
                    if (mysqli_more_results($con)) {
                    }
                } while (mysqli_next_result($con));
            }
        }
        catch (mysqli_sql_exception $e) {
            echo "<div class='error'>Error: e.message()</div>";
        }
        $con->close();
}
?>
<!DOCTYPE html>
<html>
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

ul{
    float: right;
	list-style-type: none;
	margin-top: -120px;
	margin-right: 10px;
}
ul>li{
	display: inline-block;
	
}
ul>li>a{
	text-decoration: none;
	color: #000000;
    padding: 5px 5px;
	border: 1px solid transparent;
    font-size: 20px;
	transition: 0.6s ease;
}
ul>li>a:hover{
	background-color: #ffffff;
	color: #d8a245;
}


.header{
    max-width: 1500px;
	height: 30px;
}
/**/
.btn-danger {
    color: white;
    background-color: #EB5757;
	padding: 10px 5px;
    border: none;
    border-radius: .3em;
    font-weight: bold;
	text-decoration: none !important;
}

.btn-primary{
	color: white;
    background-color: #56CCF2;
	padding: 10px 5px;
    border: none;
    border-radius: .3em;
    font-weight: bold;
	text-decoration: none !important;
}
	
.btn-pay {
    color: white;
    background-color: #d8a245;
	padding: 10px 5px;
    border: none;
    border-radius: .3em;
    font-weight: bold;
	text-decoration: none !important;
	margin: 0px 0px 100px 0px;
	font-size: 18px;
}

table, th, td {
  border-collapse: collapse;
  padding: 15px;
  border: 2px solid gray;
  margin: auto;
}

.container-fluid{
	margin: 40px 0px 0px 0px;
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
</style>

</div>

<div class="container-fluid">
	<form method="POST" action="Save_Cart.php">
	<h2><center>Pending Payment: </center></h2>
		<table class="table table-bordered table-striped">

			<thead>
			        <th></th>
			        <th>Booking ID</th>
			        <th>Date</th>
					<th>Price (RM)</th>
			        <th>Subtotal (RM)</th>
			</thead>

<tbody>
<?php
//initialize total
$total = 0;
//unset($_SESSION['cart']);
if(!empty($_SESSION['cart'])){
echo implode(",",$_SESSION['cart']);

//connection
$con=mysqli_connect("localhost", "root", null, "cocomelon");

//create array of initail qty which is 1
$index = 0;
if(!isset($_SESSION['qty_array'])){
  $_SESSION['qty_array'] = array_fill(0, count($_SESSION['cart']), 1);
}                                
//$sql = "SELECT pname FROM user_product where pid = 1";
//$sql = "SELECT * FROM user_product where pname IN ('implode(',',$_SESSION['cart'])'";
$sql = "SELECT * FROM user_product where pid IN (".implode(',',$_SESSION['cart']).")";

$query = $con->query($sql);

    while($row = $query->fetch_assoc()){
    ?>
        <tr>
                <td>
                    <a href="Delete_Item.php?pid=<?php echo $row['pid']; ?>&index=<?php echo $index; ?>" class="btn btn-danger btn-sm">Del<span class="glyphicon glyphicon-trash"></span></a>
                </td>
                <td><?php echo $row['booking_id']; ?></td>
                <td><?php echo number_format($row['price'], 2); ?></td>
                <input type="hidden" name="indexes[]" value="<?php echo $index; ?>">
				<td><input type="text" class="form-control" value="<?php echo $_SESSION['qty_array'][$index]; ?>" name="qty_<?php echo $index; ?>"></td>
                <td><?php echo number_format($_SESSION['qty_array'][$index]*$row['price'], 2); ?></td>
				<?php $total += number_format($_SESSION['qty_array'][$index]*$row['price'], 2); ?>
        </tr>
        <?php
        $index++;
    	}
	}
else{
        ?>
        <tr>
                <td colspan="4" class="text-center">No Pending Payment</td>
        </tr>
        <?php
}

?>
<tr>
        <td colspan="4" align="right"><b>Total</b></td>
        <td><b><?php echo number_format($total, 2); ?></b></td>
</tr>

</tbody><br><br>
</table><br><br>

<center>
<a href="product.php" class="btn btn-primary">Back</a>
<a href="Clear_Cart.php" class="btn btn-danger">Cancel Booking</a>

</form>  <br>

<form method="POST" action="#">
	<input type="hidden" name="amount" value="<?php echo number_format ($total,2); ?>">
	<button type="submit" class="btn btn-pay" name="pay">Pay Now!</button>
</form>

</body>
</html>
