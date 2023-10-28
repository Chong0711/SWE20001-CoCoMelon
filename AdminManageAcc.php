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
</head>
<body>

<!-- Website Navigation -->
<header>
    <h2 class="logo"><img src="Greenlogo1.png" style="width:270px;height:270px;"></h2>
    <nav class="navigation">
        <div class="dropdown">
        <button class="dropbtn"><b>Services</b></button>
            <div class="dropdown-content">
                <!-- Add links or content for the dropdown here -->
                <a href="adminhome.php">Homepage</a>
                <a href="addbooking.php">Add Booking</a>
                <a href="editbooking.php">Check Booking</a>
                <a href="membership.php">Membership Management</a>
                <a href="adminedittimetablestatus.php">Trainer Timetable</a>
                <a href="adminmanageacc.php">Manage Account</a>
                <a href="adminrefund.php">Refund Request</a>
                <a href="adminfeedback.php">View Feedback</a>
            </div>
        </div>

        <?php 
        if(!ISSET($_SESSION['User_ID'])){
            echo "<a href='login.php'><b>Login</b></a>";
        }else{
            $servername = "localhost";
            $username = "root";
            $password = null;
            $dbname = "cocomelon";
            $conn = new mysqli($servername, $username, $password, $dbname);
            $query = "SELECT * FROM personal_details WHERE User_ID = '".$_SESSION['User_ID']."'" ;
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            echo "<div class='dropdown'>
            <button class='dropbtn'><b>".$row['Name']."</b></button>
            <div class='dropdown-content'>
            <a href='userprofile.php'>Profile</a>
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
    background-size: 1550px 1000px;
    background-position: center;

}

.logo{
    font-size: 2em;
    color: #44561c;
    user-select: none;
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
    margin: 120px 0px 20px 0px;
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

.input-roles{
    position: relative;
    width: 100%;
    height: 50px;
    margin: 40px 0;
}

.input-roles label{
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

.input-roles select{
    margin-top: 20px;
    width: 100%;
    height: 40px;
    border: 2px solid #44561c;
    border-radius: 6px;
    background-color: transparent;
    color: #44561c;
    font-size: 1em;
    padding: 5px;
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
.btn.cancel {
  background-color: #D92121;
}
.btn.return{
    background-color: #264B56;
}
.error {
    color: #D8000C;
    border-radius: 5px;
    padding: 10px;
    text-align: center;
}

.success {
    color: green;
    border-radius: 5px;
    padding: 10px;
}
section{
    padding: 10px 0px 0px 0px;
    overflow: auto;
}
</style>

<div class="wrapper">
    <div class="form-box register">
        <h2>Account Management</h2><br>
        <?php
        if(isset($_POST["signup"]))
        {
            $servername = "localhost";
            $username = "root";
            $password = null;
            $dbname = "cocomelon";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $name=$_POST["name"]; 
            $email=$_POST["email"]; 
            $hpnum=$_POST["hpnum"]; 
            $psw=$_POST["pass"];
            $roles=$_POST["roles"];
            // Check if the password meets the conditions

            // Validate password strength
            $uppercase = preg_match('@[A-Z]@', $psw);
            $lowercase = preg_match('@[a-z]@', $psw);
            $number    = preg_match('@[0-9]@', $psw);

            if(!$uppercase || !$lowercase || !$number || strlen($psw) < 8) {
            echo '<div class="error">Password should be at least 8 characters in length and should include at least one uppercase letter, lowercase letter and one number.</div>';
            } else {
                try {
                // Insert the new user into the personal_details table
                    $insertSql = "INSERT INTO personal_details (Name, Email, Phone_Num, Password, Roles, Profile_Pic)
                                  VALUES ('$name', '$email', '$hpnum', '$psw', '$roles', '')";

                    if ($conn->query($insertSql) === TRUE) {
                        $lastInsertId = $conn->insert_id;
                        // Generate the User_ID by combining User_Str and the last insert ID
                        $updateSql = "UPDATE personal_details SET User_ID = CONCAT(User_Str, $lastInsertId)
                                      WHERE ID = $lastInsertId";

                        if ($conn->query($updateSql) === TRUE) {
                            $activedate = date("Y-m-d");
                            $enddate = date('Y-m-d', strtotime('+1 years'));
                            $query = "SELECT User_ID FROM personal_details WHERE Email = '$email'";
                            $result = mysqli_query($conn, $query);
                            $row = mysqli_fetch_assoc($result);
                            $user_id = $row['User_ID'];
                            $membersql = "INSERT INTO membership (User_ID, Status, Active_Date, End_Date)
                            VALUES ('$user_id','Active', '$activedate','$enddate')";
                            $result = mysqli_query($conn, $membersql);
                            echo "<div class='success'><center><b>Successfully Registered</b></center></div>";
                        } else {
                            echo "Error updating User_ID: " . $conn->error;
                        }
                    } else {
                        echo "Error inserting user: " . $conn->error;
                    }
                } catch (mysqli_sql_exception $e) {
                    echo "<div class='error'><center><b>Error: $e</b></center></div>";
                }
            }
        }

        if (isset($_POST["delete"])) {

            $email = $_POST["email"];
            $roles = $_POST["roles"];

            // Construct the SQL DELETE statement with a WHERE clause
            $deleteSql = "DELETE FROM personal_details WHERE email = '$email' AND roles = '$roles'";

            if ($conn->query($deleteSql) === TRUE) {
                echo "<div class='success'><center><b>Data delete seccessfully!</b></center></div>";
            } else {
                echo "<div class='error'><center><b>Error deleting data: " . $conn->error. "</b></center></div>";
            }
             $conn->close();
        }
        ?>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <?php 
            if(ISSET($_SESSION['User_ID']))
                {
                    $servername = "localhost";
                    $username = "root";
                    $password = null;
                    $dbname = "cocomelon";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $queryroles = "SELECT * FROM personal_details WHERE User_ID = '".$_SESSION['User_ID']."'" ;
                    $resultroles = mysqli_query($conn, $queryroles);
                    $rowroles = mysqli_fetch_assoc($resultroles);

                    if($rowroles['Roles'] == "head" || $rowroles['Roles'] == "Head")
                    {
                        echo '<div class="input-roles">';
                        echo '<label>Roles</label>';
                        echo '<select id="roles" name="roles">';
                        echo '<option value="head">Head</option>';
                        echo '<option value="staff">Staff</option>';
                        echo '<option value="trainer">Trainer</option>';
                        echo '<option value="member">Member</option> ';
                        echo '</select></div>';
                    }else{
                        echo '<div class="input-roles">';
                        echo '<label>Roles</label>';
                        echo '<select id="roles" name="roles">';
                        echo '<option value="member">Member</option> ';
                        echo '</select></div>';
                    }
                }
                    ?>

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
            <section>
            <div>
                <section>
                    <button type="submit" class="btn" name="signup">Create</button>
                </section>
                <section>
                    <button type="submit" class="btn cancel" name="delete">Delete</button>
                </section>
                <section>
                    <button type="button" class="btn return" id="cancelbtn" onclick="closeForm()">Back to Home</button>
                </section>
            </div>
            </section>
        </form>
    </div>
</div>

<script src="script.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script type="text/javascript">
    document.getElementById("cancelbtn").onclick = function () {
        location.href = "adminhome.php";
    };
</script>

</body>
</html>
