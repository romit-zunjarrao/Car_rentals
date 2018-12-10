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
    $car_mileage =$_POST['car_mileage'];
    $company_name = $_POST['car_company'];
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
    <title>Display Car</title>
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
                <td><label> ID </label></td>
                <td> <input type="text" value="<?php echo $id?>"  name="id" readonly></td>
            </tr>
            <tr>
                <td><label>Car Name </label></td>
                <td> <input type="text" value="<?php echo $car_name ?>"  name="car_name" ></td>
            </tr>
            <tr>
                <td> <label>Car Number </label></td>
                <td><input type="text" value="<?php echo $car_number ?>" name="car_number" ></td>
            </tr>
            <tr>
                <td><label>Company Name </label></td>
                <td><input type="text" value="<?php echo $company_name ?>" name="company_name" ></td>
            </tr><tr>
                <td><label>Rate Per Day</label></td>
                <td><input type="text " value="<?php echo $rate?>" name="rate" ></td>
            </tr>
            <tr>
                <td> <label>Car Type </label></td>
                <td> <input type="text" value="<?php echo $type?>" name="type" ></td>
            </tr>
            <tr>
                <td> <label>Availability</label></td>
                <td> <input type="text" value="<?php echo $availability?>" name="availability" ></td>
            </tr>
            <tr>
                <td> <label>Year</label></td>
                <td> <input type="text" value="<?php echo $year?>" name="year" ></td>
            </tr>
            <tr>
                <td> <label>Car Mileage</label></td>
                <td> <input type="text" value="<?php echo $car_mileage ?>" name="mileage" ></td>
            </tr>

            <tr><td><input type="submit" name="update"></td></tr>

        </table>
    </form>




</table>
</body>
</html>
