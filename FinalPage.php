<?php
/**
 * Created by PhpStorm.
 * User: romit
 * Date: 09-12-2018
 * Time: 11:16
 */
include_once("config.php");
$car = $_SESSION['car'];
print_r($car);
print_r($_POST);
$paymentName = $_POST['name'];
$cardNumber = $_POST['card_number'];
$Payment = $_POST['payment'];
makeUnavailable($car->car_number);
?>
<html>
<head>
    <title>
        East Coast Rentals
    </title>
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

        .maindiv{
            background-color:  #1F2833 ;
        }

        .imagediv{
            padding:15px;
        }

        #h1{
            font-size:100px;
            color:#66FCF1;
        }

        p{
            font-size:20px;
            color:#C5C6C7;
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        image{
            height:300px;
            width:500px;
        }
        footer{
            width:100%;
            height:30px;
            color:#45A29E;
            background-color: #1F2833;
            font-size:20px;
            text-align:right;
        }
        td {color:white;}
    </style>
</head>
<body>
<header>East Coast Rentals</header><br>
<div class="maindiv">
    <div class="imagediv">
        <ul>
            <a id="a" href="index.php">Home</a>
            <a id="a" href="rental.php">Rentals</a>
            <a id="a" href="signin.html">Sign In</a>
        </ul>
        <center><image src=" https://image.spreadshirtmedia.com/image-server/v1/mp/designs/1007217084,width=178,height=178/vroomvroom.png"></image></center>
    </div>
    <center><p id="h1">CONGRATULATIONS!!!!</p></center>
    <center><p>This is to notify you that your car has been booked and we hope that you have an amazing trip</p></center>
    <center><p>Following is the bill</p></center>
    <center><table>
        <tr>
            <td><label>Car Name: </label></td>
            <td><label><?php echo $car->car_name ?> </label></td>
        </tr>
        <tr>
            <td><label>Car Number</label></td>
            <td><label><?php echo $car->car_number?> </label></td>
        </tr>
        <tr>
            <td><label>Car Brand </label></td>
            <td><label><?php echo $car->company_name ?> </label></td>
        </tr>
        <tr>
            <td><label>Car Type: </label></td>
            <td><label><?php echo $car->type ?> </label></td>
        </tr>
        <tr>
            <td><label>No OF Days : </label></td>
            <td><label><?php echo $car->noOfDays ?> </label></td>
        </tr>
        <tr>
            <td><label>Card Owner</label></td>
            <td><label><?php echo $paymentName ?> </label></td>
        </tr>
        <tr>
            <td><label>Card number </label></td>
            <td><label><?php echo $cardNumber ?> </label></td>
        </tr>
        <tr>
            <td><label>Amount Payed </label></td>
            <td><label>$<?php echo $Payment ?></label></td>
        </tr>
    </table></center>
</div>
<footer>&copy East Coast Rentals</footer>
</body>
</html>
