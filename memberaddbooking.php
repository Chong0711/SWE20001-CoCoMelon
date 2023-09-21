<?php
session_start();
// this con is used to connect with the database
$con=mysqli_connect("localhost", "root", null, "cocomelon");
//declaration of errors for error validation
$errors = array();
if (isset($_POST['login'])) {
        $user_username = mysqli_real_escape_string($con, $_POST['sname']);
        $user_password = mysqli_real_escape_string($con, $_POST['spsw']);


        if (count($errors) == 0) {
		// this query is used to track student id and password
                $query = "SELECT * FROM Login WHERE Username ='$user_username' AND Password ='$user_password'";

                $result = mysqli_query($con, $query);
                $row = mysqli_fetch_assoc($result);
				
                if (mysqli_num_rows($result) == 1) {
                        
						//header('location: ILBServer.php');
                }else {
                        array_push($errors, "Wrong username/password combination");
                }
                mysqli_free_result($result);
                mysqli_close($con);                        
        }
}

?>
<!DOCTYPE html>
<html>
<head>
<title>SmashIt Badminton </title>
<style>
/* If you want the content centered horizontally and vertically */
.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: left;
}


---------------------------------------------------------------
body {font-family: Arial, Helvetica, sans-serif;}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.container {
    border-radius: 35px;
    background-color: white;
    background-position: left top;
    background-repeat: repeat;
    padding: 50px;
    width: 70%;
    font-family: Arial, Helvetica, sans-serif;
}


/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>
   <form action="process_booking.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br>
        
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
        
        <label for="phone">Phone:</label>
        <input type="text" name="phone" readonly><br>
        
        <label for="date">Date:</label>
        <input type="date" name="date" required><br>
        
        <label for="time">Time:</label>
        <input type="time" name="time" required><br>
        
        <label for="courts">Number of Booking Court:</label>
        <select name="courts">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select><br>
        
        <label for="trainer">Trainer:</label>
        <input type="radio" name="trainer" value="yes" id="trainerYes"> Yes
        <input type="radio" name="trainer" value="no" id="trainerNo"> No<br>
        
        <!-- Additional dropdown for trainer name -->
        <div id="trainerNameDropdown" style="display:none;">
            <label for="trainerName">Trainer Name:</label>
            <select name="trainerName">
                <option value="John">John</option>
                <option value="Alice">Alice</option>
                <option value="Bob">Bob</option>
            </select><br>
        </div>
        
        <input type="submit" value="Book Appointment">
    </form>

    <script>
        // JavaScript to show/hide the trainer name dropdown based on radio button selection
        const trainerYes = document.getElementById("trainerYes");
        const trainerNameDropdown = document.getElementById("trainerNameDropdown");

        trainerYes.addEventListener("change", function() {
            if (trainerYes.checked) {
                trainerNameDropdown.style.display = "block";
            } else {
                trainerNameDropdown.style.display = "none";
            }
        });
    </script>
</body>
</html>
