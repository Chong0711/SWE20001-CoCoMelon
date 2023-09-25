<?php
session_start();
$errors = array();
if(isset($_POST["signup"]))
{
    $servername = "localhost";
    $username = "root";
    $password = null;
    $dbname = "cocomelon";

    $name=$_POST["name"]; $email=$_POST["email"]; $psw=$_POST["psw"];
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO personal_details (User_ID,Name, Email, Password, Roles)
    VALUES ('','$name', '$email', '$psw','user'); 
    UPDATE personal_details SET User_ID = concat( User_Str, ID ) ";
    if (mysqli_multi_query($conn, $sql)) {
        do {
            /* store first result set */
            if ($result = mysqli_store_result($conn)) {
                while ($row = mysqli_fetch_row($result)) {
                }
                mysqli_free_result($conn);
            }
            /* print divider */
            if (mysqli_more_results($conn)) {
            }
        } while (mysqli_next_result($conn));
    }
    $conn->close();
}

if (isset($_POST['login'])) {
    $servername = "localhost";
    $username = "root";
    $password = null;
    $dbname = "cocomelon";
    $conn = new mysqli($servername, $username, $password, $dbname);

    $user_username = mysqli_real_escape_string($conn, $_POST["loginemail"]);
    $user_password = mysqli_real_escape_string($conn, $_POST["loginpsw"]);


    if (count($errors) == 0) {
    // this query is used to track student id and password
            $query = "SELECT * FROM personal_details WHERE Email ='$user_username' AND Password ='$user_password'";

            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            
            if (mysqli_num_rows($result) == 1) {
                    
                    header('location: https://www.google.com');
            }else {
                    array_push($errors, "Wrong username/password combination");
            }
            mysqli_free_result($result);
            mysqli_close($conn);                        
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE-edg" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>SmashIt Badminton Academy</title>
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="https">


    </head>
    <body>

        <! -- Website Navigation -->
<header>
    <h2 class="logo"><img src="Greenlogo1.png" style="width:270px;height:270px;"></h2>
    <nav class="navigation">
        <a href="#"><b>Home</b></a>
        <a href="#"><b>About</b></a>
        <a href="#"><b>Services</b></a>
        <a href="#"><b>Contact</b></a>
        <button class="btnlogin-popup"><b>Login</b></button>
    </nav>
</header>


<div class="wrapper">
    <span class="icon-close"><ion-icon name="close-outline"></ion-icon>
    </span>


    <div class="form-box login">
        <h2>Login</h2>
        <form action="index.php" method="post">
            <label>Email</label>
            <div class="input-box">
                <span class="icon"><ion-icon name="mail-open"></ion-icon></span>
                <input type="email" name="loginemail" required>
            </div>

            <label>Password</label>
            <div class="input-box">
                <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                <input type="password" name="loginpsw" required>
            </div>

            <div class="remember-forgot">
                <label><input type="checkbox">Remember me</label>
                <a href="#">Forgot Password?</a>

            </div>
            <button type="submit" name="login" class="btn">Login</button>
            <div class="login-register">
                <p>Not member yet? <a href="#" class="register-link">Register here!</a></p>                 
            </div>

            <div class="guest-login">
                <p> <a href="#" class="guest-link">Login as Guest</a></p>                 
            </div>

        </form>
    </div>

    <div class="form-box register">
        <h2>Registration</h2>
        <form action="index.php" method="post">
            
            <label>Name</label>
            <div class="input-box">
                <span class="icon"><ion-icon name="person-circle"></ion-icon></span>
                <input type="text" name="name" required>
            </div>

            <label>Email</label>
            <div class="input-box">
                <span class="icon"><ion-icon name="mail-open"></ion-icon></span>
                <input type="email" name="email" required>
            </div>

            <label>Password</label>
            <div class="input-box">
                <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                <input type="password" name="psw" required>
            </div>

            <div class="remember-forgot">
                <label><input type="checkbox">I accept this Terms & Condition</label>
            </div>

            <button type="submit" name='signup' class="btn">Register</button>
            <div class="login-register">
                <p>Already be our member? <a href="#" class="login-link">Login here!</a></p>                 
            </div>

            <div class="guest-login">
                <p> <a href="#" class="guest-link">Login as Guest</a></p>                 
            </div>
        </form>
    </div>
</div>



<script src="script.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    </body>
</html>
