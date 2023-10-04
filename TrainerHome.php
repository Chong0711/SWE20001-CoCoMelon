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
    <img src="Greenlogo1.png" style="width:270px;height:270px;" class="logo">
    <nav class="navigation">
        <a href="#home"><b>Home</b></a>
        <a href="#time"><b>Timetable</b></a>
        <a href="#book"><b>Booking</b></a>
		
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
    font-family: 'Quicksand', sans-serif;
    scroll-behavior: smooth;
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

/*Dropdown Menu*/
/* Dropdown container */
.navigation a:nth-child(3) {
   margin-right: 35px; /* Adjust the margin value as needed */
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
   background-color: transparent; 
   min-width: 160px;
   z-index: 1;
   top: 100%;
   left: 0; 
   margin-left: -50px;
}

/* Links inside the dropdown */
.dropdown-content a {
   color: #44561c;
   padding: 14px 16px;
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

.form-box h2{
    font-size: 2em;
    color:#44561c ;
    text-align: center;
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

.home {
    font-family: Quicksand;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    min-height: 100vh;
}

.background-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: url(badminton.jpg) no-repeat;
    background-size: cover;
    background-position: center center;
    z-index: -1; /* Place the background behind the content */
}

.content {
    z-index: 1; /* Place the content in front of the background */
}

.home .content{
    max-width: 40rem;
}

.home .content h2{
    font-size: 2.6rem;
    color: #44561C;
}

.heading{
    text-align:center;
    font-size: 2.5em;
    color: #44561C;
    padding: 1em;
    margin: 1em 0;
    width: 1519px;
    background: rgba(90, 132, 85, 0.415);
}

.section{
	padding: 2rem 0%;
}

/*Scroll smooth*/
html{
	scroll-padding-top: 6rem;
}

@media(max-width:991px){


    html{
        font-size: 55%;
    }
    header{
        padding:2rem;
    }

}

@media(max-width:991px){


    html{
        font-size: 50%;
    }
}
/*Scroll smooth*/

</style>

<section>
	<section class="home">
	    <div class="background-image" id="home"></div>
	    <div class="content">
	        <h2>Welcome To Trainer Homepage !</h2>
	    </div>
	</section>

	<section>
		<div class="TimeTable" id="time">
			<h1 class="heading">Timetable</h1>
		</div>
	</section>

	<section>
		<div class="Booking" id="book">
			<h1 class="heading">Booking</h1>
		</div>
	</section>

</section>


<script src="script.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


<script>

</script>

</body>
</html>


