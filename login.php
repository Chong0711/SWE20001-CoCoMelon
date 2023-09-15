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
<title>SmashIt Badminton Login</title>
<style>
.split {
  height: 100%;
  width: 40%;
  position: fixed;
  z-index: 1;
  top: 0;
  overflow-x: hidden;
  padding-top: 20px;
}

/* Control the left side */
.left {
  left: 0;
  background-color: blue;
}

/* Control the right side */
.right {
  right: 0;
  width:60%;
  background-color: orange;
}

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


input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

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

span.psw {
  float: right;
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
<div class="split left">
  <div class="centered">
  <img src="BmtLogo.png" alt="SmashItBadminton" width="400px" height="350px">
  </div>
</div>

<div class="split right">
  <div class="centered">
    <form action="/action_page.php" method="post">
        <div class="container">
            <h2 align="center">Sign In</h2>
            <center>
            <img src="https://static.vecteezy.com/system/resources/thumbnails/007/033/146/small/profile-icon-login-head-icon-vector.jpg" alt="LoginIcon" width="100px" height="100px"><br>
            </center>
            <label for="uname"><b>Email</b></label>
            <input type="text" placeholder="Enter Email Address" name="uname" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>
            
            <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
            <span class="psw"><a href="#">Forgot password</a></span>
            </label>
            <br><br><br>
            <button type="submit">Login</button>
            <center>
            <span>Don't have an account? <a href="#">Create account</a></span>
            </center>
          </div>
            

    </form>
  </div>
</div>

</body>
</html>