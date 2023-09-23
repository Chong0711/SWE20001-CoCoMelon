<?php
session_start();
// this con is used to connect with the database
$con=mysqli_connect("localhost", "root", null, "cocomelon");

// Retrieve user inputs
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $courts = $_POST['courts'];
        $trainer = isset($_POST['trainer']) ? $_POST['trainer'] : "no";
        $trainerName = isset($_POST['trainerName']) ? $_POST['trainerName'] : "";

        // Calculate the price
        $courtPricePerHour = 8; // court RM per hour
        $trainerPricePerHour = 20; // trainer RM per hour
        $durationInHours = 1; // Default duration is 1 hour

        // Calculate the total price based on the number of courts and trainer selection
        $courtTotalPrice = $courts * $durationInHours * $courtPricePerHour;
        $trainerTotalPrice = ($trainer === "yes") ? $durationInHours * $trainerPricePerHour : 0;
        $totalPrice = $courtTotalPrice + $trainerTotalPrice;
>

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
        <a href="#"><b>Services</b></a>
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
    position: fixed;
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
    background-size: 1550px 800px;
    background-position: center;

}

.logo{
	margin-right: 100px;
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

.wrapper {
    position: relative;
    width: 400px;
    height: 530px;
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

.wrapper .icon-close{
    position: absolute;
    top: 0;
    right: 0;
    width: 45px;
    height: 45px;
    background: #44561c;
    font-size: 2em;
    justify-content: center;
    display: flex;
    align-items: center;
    border-bottom-left-radius: 20px;
    cursor: pointer;
    z-index: 1;

}

.form-box h2{
    font-size: 2em;
    color:#44561c ;
    text-align: center;
	margin-top: -230px;
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


.booking-details{
    position: relative;
    width: 100%;
    height: 50px;
    margin: 30px 0;  
}


.booking-details p{
    width: 100%;
    height: 100%;
    background: transparent;
    border: none;
    outline: none;
    font-size: 1em;
    color: #44561c;
    font-weight: 600;
    padding: 0 60px 0 0;
}


</style>

<div class="wrapper">
    <div class="form-box login">
        <h2>Booking Confirmation</h2>
		    <div class="booking-details">
			    <p><strong>Name:</strong> <?php echo $name; ?></p>
				<p><strong>Email:</strong> <?php echo $email; ?></p>
				<p><strong>Phone:</strong> <?php echo $phone; ?></p>
				<p><strong>Date:</strong> <?php echo $date; ?></p>
				<p><strong>Time:</strong> <?php echo $time; ?></p>
				<p><strong>Number of Booking Court:</strong> <?php echo $courts; ?></p>
				<p><strong>Trainer:</strong> <?php echo $trainer; ?></p>
				<?php
				if ($trainer === "yes") {
				    echo "<p><strong>Trainer Name:</strong> $trainerName</p>";
				}
				?>
				<p><strong>Total Price:</strong> RM <?php echo $totalPrice; ?></p>
			</div>
    </div>
</div>

<script src="script.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


<script>
	const wrapper = document.querySelector('.wrapper');
	const loginLink = document.querySelector('.login-link');
	const registerLink = document.querySelector('.register-link');
	const btnPopup = document.querySelector('.btnlogin-popup');
	const iconClose = document.querySelector('.icon-close');
	
	const trainerNeededSelect = document.getElementById('trainer-needed');
	const trainerNameInput = document.getElementById('trainer-name-input');
	
	trainerNeededSelect.addEventListener('change', () => {
	    if (trainerNeededSelect.value === 'yes') {
	        trainerNameInput.style.display = 'block';
	    } else {
	        trainerNameInput.style.display = 'none';
	    }
	});
	
	registerLink.addEventListener('click', () => {
	    wrapper.classList.add('active');
	});
	
	loginLink.addEventListener('click', () => {
	    wrapper.classList.remove('active');
	});
	
	btnPopup.addEventListener('click', () => {
	    wrapper.classList.add('active-popup');
	});
	
	iconClose.addEventListener('click', () => {
	    wrapper.classList.remove('active-popup');
	});

</script>

</body>
</html>

