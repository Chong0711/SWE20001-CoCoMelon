<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>SmashIt Badminton Academy</title>
        <link rel="stylesheet" href="https">
        <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
    </head>
    <body>

        <!-- Website Navigation -->
<header>
    <h2 class="logo"><img src="Greenlogo1.png" style="width:270px;height:270px;"></h2>
    <nav class="navigation">
        <a href="homepage.php#home"><b>Home</b></a>
        <a href="homepage.php#about"><b>About</b></a>
        <a href="homepage.php#contact"><b>Contact</b></a>
    </nav>
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
    background: url(badminton.jpg)no-repeat;
    background-size: 1550px 850px;
    background-position: center;

}

.logo{
    font-size: 2em;
    color: #44561c;
    user-select: none;
    justify-content: space-between;
}

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

.wrapper {
    position: relative;
    width: 400px;
    min-height: 480px;
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
    transition: transform .5s ease;
    margin-top: 150px;
}

.wrapper.active{
    height: 520px;
}

.wrapper .form-box{
    width: 100%;
    padding: 40px;
}


.wrapper .form-box.login{
    transition: transform .18s ease;
    transform: translateX(0);
    position: relative;
}


.wrapper.active .form-box.login{
    transition: none;
    transform: translateX(-400px);
}

.form-box h2{
    font-size: 2em;
    color:#44561c ;
    margin: 0px 0px 50px 39px;
}

.input-box{
    position: relative;
    width: 100%;
    height: 50px;
    border-bottom: 2px solid #44561c;
    margin: 0px 0px 45px 0px;
}

.input-box label{
    position: absolute;
    top: 50%;
    left: 5px;
    transform: translateY(-180%);
    font-size: 1em;
    color: #44561c;
    font-weight: 500;
    pointer-events: none;
    transition: .5s;
}

.input-box input{
    width: 100%;
    height: 100%;
    background: transparent;
    border: none;
    outline: none;
    font-size: 1em;
    color: #44561c;
    font-weight: 600;
    padding: 0 35px 0 5px;

}

.input-box .icon{
    position: absolute;
    right: 8px;
    font-size: 1.2em;
    color: #44561c;
    line-height: 57px;

}

.remember-forgot{
    font-size: .9em;
    color: #44561c;
    font-weight: 500;
    margin: -15px 0 15px;
    display: flex;
    justify-content: space-between;
}

.remember-forgot label input{
    accent-color: #44561c;
    margin-right: 3px;
}

.remember-forgot a{
    color: #44561c;
    text-decoration: none;
}

.remember-forgot a:hover{
    text-decoration: underline;
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
}

.input-box2{
    position: relative;
    width: 100%;
    height: 50px;
    border-bottom: 2px solid #44561c;
    margin: 30px 0;  
}

.input-box2 label {
    position: absolute;
    top: 50%;
    left: 5px;
    transform: translateY(-180%);
    font-size: 1em;
    color: #44561c;
    font-weight: 500;
    pointer-events: none;
    transition: .5s;
}

.input-box2 input {
    width: 100%;
    height: 100%;
    background: transparent;
    border: none;
    outline: none;
    font-size: 1em;
    color: #44561c;
    font-weight: 600;
    padding: 20px 40px 60px 5px;
}

.input-box2 .icon {
    position: absolute;
    right: 8px;
    font-size: 1.2em;
    color: #44561c;
    line-height: 57px;
    top: 50%; 
    transform: translateY(-50%);
}

.btn2 {
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
    position: relative;
    bottom: 40px; 
    right: 1px;
}

</style>

<div class="wrapper">
    <div class="form-box login">
        <h2>Reset Password</h2><br>
        <form action="ForgotPass.php" method="POST">

                <div class="input-box">
                    <span class="icon"><ion-icon name="mail-open"></ion-icon></span>
                    <input type="email" name="Rname" id="Rname" required>
                    <label>Email</label>
                </div>

                <button type="submit" class="btn" name="email">Enter</button>

            <?php
        if (isset($_POST["Rname"])) {
            $RName = $_POST["Rname"];
            $search = $RName;
            $con = mysqli_connect("localhost", "admin", null, "cocomelon");
            
            // Check if the connection was successful
            if (!$con) {
                die("Connection failed: " . mysqli_connect_error());
            }
            
            $query = "SELECT * FROM personal_details WHERE Email = '$search'";
            $result = mysqli_query($con, $query);
            
            // Check if the query execution was successful
            if (!$result) {
                die("Query failed: " . mysqli_error($con));
            }
            
            if (mysqli_num_rows($result) == 0) {
                echo "<p><br>No record.</p>";
            } else {
                $row = mysqli_fetch_array($result);
                mysqli_close($con);
            }
        }
         if (isset($_POST["update"])) {
            $uName = $_POST["uName"];
            $uPassword = $_POST["uPassword"];
            $con = mysqli_connect("localhost", "root", null, "cocomelon");

            // Check if the connection was successful
            if (!$con) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "UPDATE personal_details SET Password = '$uPassword' WHERE Email = '$uName'";

            $result = mysqli_query($con, $sql);

            // Check if the query execution was successful
            if ($result) {
                echo "<p><br>Password is updated.</p>";
            } else {
                echo "<p><br>Password update failed: " . mysqli_error($con) . "</p>";
            }

            // Close the database connection
            mysqli_close($con);
        }
        ?>
                <div class="password-reset-box" style="display: none;">
                    <form action="" method="POST">
                        <input type="hidden" name="uName" value="<?php echo $row["Email"]; ?>">
                        <input type="hidden" name="update" value="1"> 
                        <div class="input-box2">
                            <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                            <input type="password" name="uPassword" class="input-box">
                            <label>New Password</label>
                            <button type="submit" name="update" class="btn2" value="Update">Update</button>
                        </div>
                    </form>
                </div>
        </form>
    </div>
</div>

<script src="script.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<script>
 // JavaScript code for handling the form submission and showing password reset
    document.addEventListener("DOMContentLoaded", function () {
        const formBox = document.querySelector(".form-box.login");
        const passwordResetBox = document.querySelector(".password-reset-box");
        const emailInput = document.getElementById("Rname");

        // Handle form submission
        formBox.addEventListener("submit", function (event) {
            event.preventDefault(); // Prevent the default form submission
            const email = emailInput.value.trim(); // Get the entered email value

            // Check if the entered email is valid (you can add more validation here)
            if (isValidEmail(email)) {
                formBox.classList.add("active"); // Show the password reset input field
                passwordResetBox.style.display = "block"; // Show the password reset box
            } else {
                // Handle invalid email here (e.g., display an error message)
                alert("Please enter a valid email address.");
            }
        });

        // Function to validate an email address (you can use a more robust validation method)
        function isValidEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }
    });
</script>

    </body>
</html>
