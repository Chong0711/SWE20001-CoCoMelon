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
        <?php
            $servername = "localhost";
            $username = "root";
            $password = null;
            $dbname = "cocomelon";
            $conn = new mysqli($servername, $username, $password, $dbname);

            $query = "SELECT * FROM personal_details WHERE User_ID ='U12'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            echo "<button class='btnlogin-popup'><b>".$row['Name']."</b></button>";
        ?>
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
