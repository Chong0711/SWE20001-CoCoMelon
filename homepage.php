<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE-edg" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>SmashIt Badminton Academy</title>
        <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="https">
    </head>
<style>

  @import url();
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Quicksand', sans-serif;
    transition: 2s linear;
    text-transform: capitalize;
    outline: none;
    border: none;
    scroll-behavior: smooth;

}

html{
    scroll-padding-top: 6rem;
}

header{
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 10.5%;
    z-index: 99;
    padding: 20px 100px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-size: 1.2em;
    background: rgb(138, 151, 137);

}

body{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    /*background: url(badminton.jpg)no-repeat;
    background-size: 1550px 850px;*/
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




/*Homepage design*/
section{
    padding: 2rem 0%;
}

.home{
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    min-height: 100vh;
    background: url(badminton.jpg)no-repeat;
    background-size: 1550px 850px;
    background-position: center;
  
 }

.home .content{
    max-width: 40rem;
}

.home .content h3{
    font-size: 2.6rem;
    color: #44561C;
}

.home .content span{
    font-size: 1.6rem;
    color: #333;
    padding: 1rem 0;
    line-height: 1.5s;
}

.home .content p{
    font-size: 1.5rem;
    color: #44561C;
    padding: 1rem 0;
    line-height: 1.5s;
}

.btnone{
    display: inline-block;
    margin-top: 1rem;
    border-radius: 5rem;
    background: #44561C;
    color: #fff;
    padding: .8rem 2.5rem;
    cursor: pointer;
    font-size: 1rem;
    outline: none;
    text-decoration:none;
}

.btntwo{
    display: inline-block;
    margin-top: 1rem;
    border-radius: 5rem;
    background: #44561C;
    color: #fff;
    padding: .8rem 2.5rem;
    cursor: pointer;
    font-size: 1rem;
    outline: none;
    text-decoration:none;
}

.btnone:hover{
    background: var(--black);
}

.btntwo:hover{
    background: var(--black);
}


/*About page Design*/
.heading{
    text-align:center;
    font-size: 4em;
    color: #44561C;
    padding: 1em;
    margin: 2em 0;
    background: rgba(90, 132, 85, 0.415);
}

.heading span{
    color: black;
}

.about .row{
    display: flex;
    align-items: center;
    gap: 2em;
    flex-wrap: wrap;
    padding: 2em o;
    padding-bottom: 3em;
}

.about .row .video-container{
    flex: 1 1 40em;
    position: relative;
}

.about .row .video-container video{
   width: 100%;
   border: 1.5em solid #fff;
   border-radius: .5em; 
   box-shadow: 0 .5em 1em rgba(0,0,0,.1);
   height: 100%;
   object-fit: cover;
}

.about .row .video-container h3{
    position: absolute;
    top: 50%; transform: translateY(-50%);
    font-size: 3em;
    background: #fff;
    width: 100%;
    padding: 0em 2em;
    text-align: center;
    mix-blend-mode: screen ;
}

.about .row .content{
    flex:1 1 40em;

}

.about .row .content h3{
    font-size: 3em;
    color: #44561C;
}

.about .row .content p{
    font-size: 1.2em;
    color: #44561c;
    padding: .5em 0;
    padding-top: 1em;
    line-height: 1.5;
}

/*Icons/Names design*/

.icon-container{
    background-color: #fff;
    display: flex;
    flex-wrap: wrap;
    gap:1.5em ;
    padding-top: 5em;
    padding-bottom: 5em;
}

.icon-container .icons{
    background: #fff;
    border-radius: 15px;
    border: .4em solid rgba(0,0,0,.1);
    border-color: #677547;
    padding: 2em;
    display: flex;
    align-items: center;
    flex: 5 5 25em;
    padding-left: 2em;
    padding-right: 2em;

}

.icon-container .icons img{
    height: 5em;
    margin-right: 2em;
}

.icon-container .icons h3{
    color: #333;
    padding-bottom: .5em;
    font-size: 1.5em;
}

.icon-container .icons h3{
    color: #333;
    padding-bottom: .5em;
    font-size: 1.5em;
}


/*Contact design*/

.heading2{
    text-align:center;
    font-size: 4em;
    color: #44561C;
    padding: 1em;
    margin: 2em 0;
    background: rgba(90, 132, 85, 0.415);
}

.heading2 span{
    color: black;
}

.contact .row{
    display: flex;
    align-items: center;
    gap: 2em;
    flex-wrap: wrap;
    padding: 2em 0;
    padding-bottom: 3em;
}

.contact .row .video-container{
    flex: 1 1 40em;
    position: relative;
}

.contact .row .video-container video{
   width: 100%;
   border: 1.5em solid #fff;
   border-radius: .5em; 
   box-shadow: 0 .5em 1em rgba(0,0,0,.1);
   height: 100%;
   object-fit: cover;
}

.contact .row .video-container h3{
    position: absolute;
    top: 50%; transform: translateY(-50%);
    font-size: 3em;
    background: #fff;
    width: 100%;
    padding: 0em 2em;
    text-align: center;
    mix-blend-mode: screen ;
}

.contact .row .content{
    flex:1 1 40em;
    text-align: center;

}

.contact .row .content h3{
    font-size: 3em;
    color: #44561C;
}

.contact .row .content p{
    font-size: 1.2em;
    color: #44561c;
    padding: .5em 0;
    padding-top: 1em;
    line-height: 1.5;
    text-align: center;
}

<--*dropdown button menu*--->
.navigation a:nth-child(5) {
    margin-right: 40px; /* Adjust the margin value as needed */
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
</style>
  
<body>

        <!-- Website Navigation -->
<header>
    <h2 class="logo"><img src="Greenlogo1.png" style="width:210px;height:210px;"></h2>
    <nav class="navigation">
        <a href="#home"><b>Home</b></a>
        <a href="#about"><b>About</b></a>
        <a href="#contact"><b>Contact</b></a>  
        <div class="dropdown">
            <button class="dropbtn"><b>Services</b></button>
                <div class="dropdown-content">
                    <!-- Add links or content for the dropdown here -->
                    <a href="customertimetable.php">Trainer Timetable</a>
                    <a href="addbooking.php">Book Court Now!</a>
                    <a href="editbooking.php">Any Changes To Bookings</a>
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
                <a href='bookinghistory.php'>Booking History</a>
                <a href='logoutaction.php' name='logout'>Logout</a>";
                

                echo "</div> </div>";
            }
            ?>
        
         
        </div>
       </nav>
</header>

<section>
<section class="home" id="home">
    <div class="content">
        <h3>Welcome to <br> SmashIT Badminton Academy</h3>
        <span><i>"Where pro players begins"</i></span>
        <P>Badminton is a racquet sport played using racquets to hit a shuttlecock across a net. 
        Although it may be played with larger teams, the most common forms of the game are "singles" (with one player per side) and 
        "doubles" (with two players per side).</P>
        <a href="https://en.wikipedia.org/wiki/Badminton" class="btnone">Learn more</a>
        <a href="https://www.youtube.com/watch?v=BFpG81AqTYQ" class="btntwo">Watch Video</a>
    </div>
</section>

<section class="about" id="about">
    <h1 class="heading"><span>About</span> us</h1>

    <div class="row">
        <div class="video-container">
            <video src="badminton.mp4" loop autoplay muted ></video>
            <h3>Best centre</h3>
        </div>

    <div class="content">
        <h3>SmashIT Badminton Academy</h3>
        <span>A little history about us, "How we started?"</span>
        <P>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy 
        text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, 
        but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
        and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</P>
        <a href="#" class="btnone">Learn more</a>
    </div>

</section>

<section class="icon-container">
    <div class="icons">
        <img src="profileicon.png" style="width:150px;height:150px";>
        <div class="infoaboutus">
            <h3>Dr. Lau Joe Yee</h3>
            <span>Chief executive officer (CEO) of SmashIT Badminton Academy</span>
        </div>
    </div>

    <div class="icons">
        <img src="profileicon.png" style="width:150px;height:150px";>
        <div class="infoaboutus">
            <h3>Dr. Alicia Teh Jia Yi</h3>
            <span>Chief operating officer (COO) of SmashIT Badminton Academy</span>
        </div>
    </div>

    <div class="icons">
        <img src="profileicon.png" style="width:150px;height:150px";>
        <div class="infoaboutus">
            <h3>Dr. Yagulan A/L Ramani</h3>
            <span>Chief technology officer (CTO) of SmashIT Badminton Academy</span>
        </div>
    </div>

    <div class="icons">
        <img src="profileicon.png" style="width:150px;height:150px";>
        <div class="infoaboutus">
            <h3>Dr. Chong Ming Herng</h3>
            <span>Chief marketing officer (CMO) of SmashIT Badminton Academy</span>
        </div>
    </div>
</section>

<section class="contact" id="contact">
    <h1 class="heading2"><span>Contact</span> us</h1>

    <div class="row">
        <div class="video-container">
            <video src="badminton2.mp4" loop autoplay muted ></video>
            <h3>Keep in touch</h3>
        </div>

    <div class="content">
        <h3>SmashIt Academy Contact</h3>
        <span>"Stay in touch with us"</span>
        <p>...SmashIt Badminton Academy...</p>
        <p>No 2023, Imagination street, 501 palm St, <br> 21022 Swinburne State, World
        <br> Call us: <br> 08-192837465</p>
    </div>

</section>

</section>
</body>

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

<script src="script.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
