<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE-edg" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>SmashIt Badminton Academy</title>
        <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="faq.css" />
        <link rel="stylesheet" href="https">
    </head>

  <style>
    html{
    scroll-padding-top: 6rem;
}

body{
    margin: 0;
    font-family:'Quicksand', sans-serif;
    background: url(greenmarble.jpg)no-repeat;
}

*{
    box-lines: border-box;
    margin: 0;
    padding: 0;
    border-radius: 20px;
}

.logofaq{
    text-align: center;
    margin-bottom: -100px;
    margin-top: -100px;
}

.title{
    text-align: center;
    font-size: 3em;
    margin: 1em;
}

.faq-section{
    padding: 4em 2em;
}

.faq{
    list-style: none;
    max-width: 700px;
    margin: 0 auto;
}

.faq li{
    background: #f2f2f2;
    border-bottom: 1px #ccc solid;
}

.faq li:firs-child{
    border-top: 1px #ccc solid;
}

.q{
    padding: 1em 0;
    border-left: 10 px #f2f2f2 solid;
    cursor: pointer;
}

.q:hover,
.q:hover .arrow{
    border-left-color: darkgreen;
}

.arrow{
    display: inline-block;
    margin: 0 0.5em;
    width: 0;
    height: 0;
    border-top: 6px solid transparent;
    border-left: 10px solid #555;
    border-bottom: 6px solid transparent;
    transition: 0.3;
}

.faq p{
  color: #888;
  line-height: 25px;  
}

.a{
    overflow: hidden;
    height: 0;
    padding: 0 1em 0 3.3em;
    transition: 0.2s;
}

.a-opened{
    padding: 1em 1em 2em 3.3em;
    height: initial;
    transition: 0.2s;
}

.arrow-rotated{
    transform: rotate(90deg);
    transition: 0.5s;
}
  </style>
  
<body>

    <section class="faq-section">
        <h2 class="logofaq"><img src="Greenlogo1.png" style="width:220px;height:230px;"></h2>

        <h1 class="title">Frequently Ask Question</h1>

        <ul class="faq">
            <li>
                <div class="q">
                    <span class="arrow"></span>
                    <span>Can I book appoinment without sign up account?</span>
                </div>
                <div class="a">
                    <p>
                        Yes you can book appointment without creating account. To book 
                        an appoinment you just need log in just by click on 
                        "Log in as Guest" and then you can make an appointment. 
                    </p>
                </div>
            </li>
            <li>
                <div class="q">
                    <span class="arrow"></span>
                    <span>How can be member of the academy?</span>
                </div>
                <div class="a">
                    <p>
                        It's very easy, you just need to register a account and
                        just make sure all details are correct. Once you have sign up, you
                        can log in to the account. 
                    </p>
                </div>
            </li>
            <li>
                <div class="q">
                    <span class="arrow"></span>
                    <span>What if I forgot password after log in?</span>
                </div>
                <div class="a">
                    <p>
                        You can update your designated password at your profile. 
                        Make sure you update password atleast 8 characters. 
                    </p>
                </div>
            </li>
            <li>
                <div class="q">
                    <span class="arrow"></span>
                    <span>How can I book session?</span>
                </div>
                <div class="a">
                    <p>
                        Firstly, log in to your account. Then hover to "Service" at navigation bar,
                        can click on "Book Court now". This will bring to booking form and 
                        fill in the details and make sure all details are correct. 
                        In this form you can which court you like, choose time availability and 
                        choose trainer if you needed. 
                    </p>
                </div>
            </li>
            <li>
                <div class="q">
                    <span class="arrow"></span>
                    <span>How can I check booking?</span>
                </div>
                <div class="a">
                    <p>
                        Hover to your profile account and click on "Booking history" and you 
                        check booking details and booking id. 
                    </p>
                </div>
            </li>
            <li>
                <div class="q">
                    <span class="arrow"></span>
                    <span>Can I change my booking?</span>
                </div>
                <div class="a">
                    <p>
                        Yes you can change booking. Firstly, hover on "Service" and click on
                         "Any changes on booking". Enter your booking id and make your changes.
                    </p>
                </div>
            </li>
            <li>
                <div class="q">
                    <span class="arrow"></span>
                    <span>Can I cancel the booking?</span>
                </div>
                <div class="a">
                    <p>
                        Yes you can cancel booking. Firstly, hover on "Service" and click on
                         "Any changes on booking". Enter your booking id and click on cancel appointment.
                    </p>
                </div>
            </li>
            <li>
                <div class="q">
                    <span class="arrow"></span>
                    <span>Can I request refund?</span>
                </div>
                <div class="a">
                    <p>
                        Yes you can request refund but it may apply Terms and Conditions. To request the refund,
                        hover to "Service" and click on refund. Enter the details in the form and make sure all the details
                        are correct. Any incorrect information you refund may forfeit.
                    </p>
                </div>
            </li>


        </ul>
    </section>

   
</body>
<script src="script.js"></script>
</html>

<script>
  const q = document.querySelectorAll('.q');
const a = document.querySelectorAll('.a');
const arr = document.querySelectorAll('.arrow');


for(let i=0; i<q.length; i++){
  q[i].addEventListener('click',()=>{
    a[i].classList.toggle('a-opened');
    arr[i].classList.toggle('arrow-rotated');
  });
}
</script>
