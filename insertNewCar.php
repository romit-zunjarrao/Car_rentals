<?php
/**
 * Created by PhpStorm.
 * User: romit
 * Date: 09-12-2018
 * Time: 20:09
 */
require_once("config.php");
if (!empty($_POST)) {

    $car_name=$_POST['car_name'];
    $car_mileage =$_POST['car_mileage'];
    $company_name = $_POST['car_company'];
    $car_year = $_POST['year'];
    $rate = $_POST['rate'];
    $availability = $_POST['availability'];
    $car_number = $_POST['car_number'];
    $car_type = $_POST['type'];
    addCar($car_name,$car_mileage,$company_name,$car_year,$rate,$availability,$car_number,$car_type);

    header("Location: http://localhost/Final%20Project/ManageCar.php");
    die();

}


?>

<html>
<head>
    <title>Insert New Car</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <table>
            <tr>
                <td><label>Car Name</label></td>
                <td><input type="text" name="car_name"></td>
            </tr>
            <tr>
                <td><label>Car Mileage</label></td>
                <td><input type="text" name="car_mileage"></td>
            </tr>
            <tr>
                <td><label>Car Company</label></td>
                <td><input type="text" name="car_company"></td>
            </tr><tr>
                <td><label>Car Year</label></td>
                <td><input type="text" name="year"></td>
            </tr>
            <tr>
                <td><label>Rate</label></td>
                <td><input type="text" name="rate"></td>
            </tr>
            <tr>
                <td><label>Car Number</label></td>
                <td><input type="text" name="car_number"></td>
            </tr>
            <tr>
                <td><label>Type</label></td>
                <td><input type="text" name="type"></td>
            </tr>
            <tr>
                <td><label>Availability</label></td>
                <td><input type="text" name="availability"></td>
            </tr>

        </table>
        <input type="submit" value="Add " class="button">
        <a href="managePage.php"><input type="button" value="Go Back Main Menu" class="button"></a>

    </form>
</body>
</html>
