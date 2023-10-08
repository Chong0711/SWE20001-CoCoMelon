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
        <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https">
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
    margin: 150px 0px 20px 0px;
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
}


.wrapper.active .form-box.login{
    transition: none;
    transform: translateX(-400px);
}

.form-box h2{
    font-size: 2em;
    color:#44561c ;
    text-align: center;
}

.input-box{
    position: relative;
    width: 100%;
    height: 50px;
    border-bottom: 2px solid #44561c;
    margin: 30px 0;  
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

.login-register{
    font-size: .9em;
    color: #44561c;
    text-align: center;
    font-weight: 500;
    margin: 25px 0 10px;
}

.guest-login{
    font-size: .9em;
    color: #44561c;
    text-align: center;
    font-weight: 500;
    margin: 25px 0 10px;
}

.guest-login p a{
    color: #44561c;
    text-decoration: none;
    font-weight: 600;
}

.guest-login p a:hover{
    text-decoration: underline;
}

.error {
    color: #D8000C;
    border-radius: 5px;
    padding: 10px;
}

.success {
    color: green;
    border-radius: 5px;
    padding: 10px;
}

.center{
    position:absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.popup{
    position: fixed;
    top: 100vh;
    left: 0px;
    width: 100%;
    height: 100%;
}

.popup .overlay{
    position: absolute;
    top: 0px;
    left: 0px;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.5);
    opacity: 0;
    transition: opacity 100ms ease-in-out 200ms;
}

.popup .content-pop{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) scale(1.15);
    width: 95%;
    max-width: 350px;
    background: #fff;
    padding: 25px;
    border-radius: 20px;
    opacity: 0;
    box-shadow: 0px 2px 2px 5px rgba(0,0,0,0.05);
    transition: all 300ms ease-in-out;
}

.popup .content-pop h1{
    margin: 10px 0px;
    font-size: 25px;
    color: black;
    text-align: center;
}

.popup .content-pop p{
    margin: 15px 0px;
    color: #222;
    font-size: 16px;
    text-align: center;
}

.popup .content-pop .controls{
    display: flex;
    justify-content: space-between;
    margin: 20p 0px 0px;
}

.popup .content-pop .controls button{
    padding: 10px 20px;
    border: none;
    outline: none;
    font-size: 15px;
    border-radius: 20px;
    cursor: pointer;
}

.popup .content-pop .controls .closebtn{
    background: #44561C;
    color: #fff;
}

.popup.active {
    top:0px;
    transition: top 0ms ease-in-out 0ms;
}

.popup.active .overlay{
    opacity: 1;
    transition: all 300ms ease-in-out;
}

.popup.active .content-pop{
    transform: translate(-50%,-50% scale(1));
    opacity: 1;
}

</style>

<div class="wrapper">
    <div class="form-box register">
        <h2>Registration</h2><br>
        <?php
        if(isset($_POST["signup"]))
        {
            $servername = "localhost";
            $username = "root";
            $password = null;
            $dbname = "cocomelon";
        
            $name=$_POST["name"]; $email=$_POST["email"]; $hpnum=$_POST["hpnum"]; $psw=$_POST["pass"];
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }
            try {
                $sql = "INSERT INTO personal_details (User_ID,Name, Email, Phone_Num, Password, Roles)
                VALUES ('','$name', '$email','$hpnum', '$psw','member'); 
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
                //echo "<div class='success'><center><b>Successfully Registered</b></center></div>";
                echo'<script>window.location.replace("login.php");</script>';
            }
            catch (mysqli_sql_exception $e) {
                echo "<div class='error'><center><b>Error: Duplicated Email</b></center></div>";
            }
            $conn->close();
        }
        ?>
        <form action="register.php" method="post">
            <div class="input-box">
                <span class="icon"><ion-icon name="person-circle"></ion-icon></span>
                <input type="text" name="name" required>
                <label>Name</label>
            </div>

            <div class="input-box">
                <span class="icon"><ion-icon name="mail-open"></ion-icon></span>
                <input type="email" name="email" required>
                <label>Email</label>
            </div>
            
            <div class="input-box">
                <span class="icon"><ion-icon name="phone-portrait-outline"></ion-icon></span>
                <input type="text" name="hpnum" required>
                <label>Phone Number</label>
            </div>
            
            <div class="input-box">
                <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                <input type="password" name="pass" required>
                <label>Password</label>
            </div>

            <div class="remember-forgot">
                <label><input type="checkbox" required>I accept this Terms & Condition</label> <button id="openpop">Click here</button>   

            </div>
            <div class="popup" id="popup">
            <div class="overlay"></div>
            <div class="content-pop">
                <h1>Terms & Condition</h1>
                <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical
             Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney 
             College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going 
             through the cites of the word in classical literature, discovered the undoubtable source.</p>
             <div class="controls">
                <button class="closebtn">Close</button>
             </div>
            </div>
          </div>

            <button type="submit" class="btn" name="signup">Register</button>
            <div class="login-register">
                <p>Already be our member? <a href="login.php" class="login-link">Login here!</a></p>                 
            </div>

            <div class="guest-login">
                <p> <a href="homepage.php" class="guest-link"><u>Login as Guest</u></a></p>                 
            </div>
        </form>

        

    </div>
</div>

<script src="script.js"></script>

<script>
function createPopup(id){
  let popupNode = document.querySelector(id);
  let overlay = popupNode.querySelector(".overlay");
  let closeBtn = popupNode.querySelector(".closebtn");
  function openPopup(){
    popupNode.classList.add("active");
  }
  function closePopup(){
    popupNode.classList.remove("active");
  }
  overlay.addEventListener("click", closePopup);
  closeBtn.addEventListener("click", closePopup);
  return openPopup;
}

let popup = createPopup("#popup");
document.querySelector("#openpop").addEventListener("click", popup);
</script>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    

</body>
</html>


    </body>
</html>


