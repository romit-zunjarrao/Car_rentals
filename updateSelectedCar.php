<?php
/**
 * Created by PhpStorm.
 * User: PraviinM
 * Date: 9/28/15
 * Time: 9:01 PM
 */

//inlude config.php - automatically includes db-settings.php and functions so we have
//already included the code for connection to your mysql server and the functions are already available

include_once("config.php");

// call to function fetchAllUsers() from functions.php

if (!empty($_POST)) {
    $id=$_POST['id'];
    $car_name=$_POST['car_name'];
    $car_mileage =$_POST['mileage'];
    $company_name = $_POST['company_name'];
    $car_year = $_POST['year'];
    $rate = $_POST['rate'];
    $availability = $_POST['availability'];
    $car_number = $_POST['car_number'];
    $car_type = $_POST['type'];
    updateCar($car_name,$car_mileage,$car_number,$company_name,$car_year,$availability,$rate,$car_type,$id);

    header("Location: http://localhost/Final%20Project/ManageCar.php");
    die();

}

$id= $_GET["id"];
$allusers = getCar($id);

?>


<html>
<head>
    <title>Update Car</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<table>

    <?php //NOTICE THE USE OF PHP IN BETWEEN HTML

    foreach($allusers as $userdetails) {
        $car_name = $userdetails['car_name'];
        $car_number = $userdetails['car_number'];
        $company_name = $userdetails['company_name'];
        $rate = $userdetails['rate'];
        $type = $userdetails['type'];
        $availability = $userdetails['availability'];
        $car_mileage = $userdetails['car_mileage'];
        $year = $userdetails['year'];
    }?>




    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <table>
            <tr>
                <th><label> ID </label></th>
                <td> <input type="text" value="<?php echo $id?>"  name="id" readonly></td>
            </tr>
            <tr>
                <th><label>Car Name </label></th>
                <td> <input type="text" value="<?php echo $car_name ?>"  name="car_name" ></td>
            </tr>
            <tr>
                <th> <label>Car Number </label></th>
                <td><input type="text" value="<?php echo $car_number ?>" name="car_number" ></td>
            </tr>
            <tr>
                <th><label>Company Name </label></th>
                <td><input type="text" value="<?php echo $company_name ?>" name="company_name" ></td>
            </tr><tr>
                <th><label>Rate Per Day</label></th>
                <td><input type="text " value="<?php echo $rate?>" name="rate" ></td>
            </tr>
            <tr>
                <th> <label>Car Type </label></th>
                <td> <input type="text" value="<?php echo $type?>" name="type" ></td>
            </tr>
            <tr>
                <th> <label>Availability</label></th>
                <td> <input type="text" value="<?php echo $availability?>" name="availability" ></td>
            </tr>
            <tr>
                <th> <label>Year</label></th>
                <td> <input type="text" value="<?php echo $year?>" name="year" ></td>
            </tr>
            <tr>
                <th> <label>Car Mileage</label></th>
                <td> <input type="text" value="<?php echo $car_mileage ?>" name="mileage" ></td>
            </tr>


        </table>
        <input type="submit" value="UPDATE" class="button">
        <br>
        <a href="managePage.php"><input type="button" value="Go Back Main Menu" class="button"></a>

    </form>




</table>
</body>
</html>