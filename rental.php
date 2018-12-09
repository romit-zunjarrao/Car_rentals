<?php
require_once("config.php");

if(!isUserLoggedIn()){
    echo "Please Login";
}?>
<html>
<head>
    <style>
        header{
            width:100%;
            height:40px;
            color:#45A29E;
            background-color: #1F2833;
            font-size:30px;
            text-align:center;
        }
        #a{
            padding-left: 10px;
            color:#66FCF1;
            text-decoration:none;
            font-size:20px;
            text-align:center;
        }
        #a:hover{
            color:rgba(31, 113, 121, 0.87);
        }

        p{
            padding-left:20px;
            font-size:20px;
            color:#C5C6C7;
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

        h1{
            color:#66FCF1;
        }


        .maindiv{
            background-color:  #1F2833   ;
        }
        .imagediv{
            padding:15px;
        }

        footer{
            width:100%;
            height:30px;
            color:#45A29E;
            background-color: #1F2833;
            font-size:20px;
            text-align:right;
        }
        button{
            height:30px;
            width:100px;
            color:#66FCF1;
            background-color: black;
            border-color: black;
        }
        button:hover{
            color:black;
            background-color:white;
            transition: 2s all;
        }
    </style>
</head>
<body>
<header>East Coast Rentals</header><br>
<div class="maindiv">
    <div class="imagediv">
        <ul>
            <a id="a" href="index.php">Home</a>
            <a id="a" href="rentals.html">Rentals</a>
            <a id="a" href="signin.html">Sign In</a>
        </ul>
    </div>
    <h1>START A RESERVATION</h1>
    <p>Full Name:</p>
    <input type="textarea" value="Sith Lord"><br>
    <p> Pick up location:</p>
    <input type="textarea" value="Death Star"><br>
    <p>Pickup</p>
    <input type="date" value=" "><br>
    <p>Return</p>
    <input type="date" value=" "><br>
    <p>Age of Renter:*</p>
    <input type="number" value="25"><br><br>
    <center> <button value="Continue" onclick="window.location.href='SelectCar.html'">Continue</button></center>
    <p>*should be more than the age of 25   </p>
</div><br>
<footer>&copy East Coast Rentals</footer>
</body>
</html>