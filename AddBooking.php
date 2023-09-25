<?php
session_start();
// this con is used to connect with the database
$con=mysqli_connect("localhost", "root", null, "cocomelon");
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

/*Do you need a trainer?*/
.input-trainer{
	position: relative;
    width: 100%;
    height: 50px;
    margin: 40px 0;
}

.input-trainer label{
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

.input-trainer select{
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
/*Do you need a trainer?*/

/*Trainer Name*/
.input-NTrainer{
	position: relative;
    width: 100%;
    height: 50px;
    margin: 40px 0;
}

.input-NTrainer label{
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

.input-NTrainer select{
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
/*Trainer Name*/

/*Trainer Name*/
.input-court{
	position: relative;
    width: 100%;
    height: 50px;
    margin: 40px 0;
}

.input-court label{
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

.input-court select{
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
/*Trainer Name*/

</style>

<div class="wrapper">
    <div class="form-box login">
        <h2>Booking</h2>
        <form method="post" action="/cocomelon/bookingconfirmation.php">
    <div class="input-box">
        <input type="text" name="name" required>
        <label>Name</label>
    </div>

    <div class="input-box">
        <input type="email" name="email" required>
        <label>Email</label>
    </div>

    <div class="input-box">
        <input type="tel" name="phone" required>
        <label>Phone</label>
    </div>

    <div class="input-box">
        <input type="date" name="date" required>
        <label>Date</label>
    </div>

    <div class="input-box">
        <input type="time" name="stime" required>
        <label>Start Time</label>
    </div>

    <div class="input-box">
        <input type="time" name="etime" required>
        <label>End Time</label>
    </div>

    <div class="input-court">
	    <label>Number of Court:</label>
	    <select id="court" name="court">
			<option value="1">1</option>
	        <option value="2">2</option> 
			<option value="3">3</option> 
	    </select>
    </div>
	
	<div class="input-trainer">
	    <label>Do you need a trainer?</label>
	    <select id="trainer-needed" name="trainer">
			<option value="no">No</option>
	        <option value="yes">Yes</option> 
	    </select>
	</div>
	
	<div class="input-NTrainer" id="trainer-name-input" style="display: none;">
	    	    <label>Trainers:</label>
	    		<select id="trainer-needed" name="trainer">
					<option value="Ali">Ali</option> 
					<option value="Lina">Lina</option>
	       			<option value="John">John</option> 
	    		</select>
	</div>	
		
   		 <button type="submit" class="btn">Book Appointment</button>
	
</form>
    </div>
    <br><br><br><br>
</div>



<script src="script.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


<script>
	const wrapper = document.querySelector('.wrapper');
	// const loginLink = document.querySelector('.login-link');
	// const registerLink = document.querySelector('.register-link');
	// const btnPopup = document.querySelector('.btnlogin-popup');
	// const iconClose = document.querySelector('.icon-close');
	
	const trainerNeededSelect = document.getElementById('trainer-needed');
	const trainerNameInput = document.getElementById('trainer-name-input');
	
	trainerNeededSelect.addEventListener('change', () => {
	    if (trainerNeededSelect.value === 'yes') {
	        trainerNameInput.style.display = 'block';
	    } else {
	        trainerNameInput.style.display = 'none';
	    }
	});
	
	// registerLink.addEventListener('click', () => {
	//     wrapper.classList.add('active');
	// });
	
	// loginLink.addEventListener('click', () => {
	//     wrapper.classList.remove('active');
	// });
	
	// btnPopup.addEventListener('click', () => {
	//     wrapper.classList.add('active-popup');
	// });
	
	// iconClose.addEventListener('click', () => {
	//     wrapper.classList.remove('active-popup');
	// });

</script>

</body>
</html>
