<?php
/**
 * Created by PhpStorm.
 * User: romit
 * Date: 09-12-2018
 * Time: 10:23
 */
include_once("config.php");
$car = new car();
$car->car_name = $_POST['car_name'];
$car->car_number = $_POST['car_number'];
$car->company_name = $_POST['company_name'];
$car->rate = $_POST['rate'];
$car->type = $_POST['type'];
$car->noOfDays = $_POST['noOfDays'];

$_SESSION['car'] = $car;
?>
<form action="FinalPage.php" method="post">
        <table>
            <tr>
                <td><label>Name On Card</label></td>
                <td> <input type="text"   name="name"></td>
            </tr>
            <tr>
                <td> <label>Card Number</label></td>
                <td><input type="number"  name="card_number" ></td>
            </tr>
            <tr>
                <td><label>CVV</label></td>
                <td><input type="text" name="cvv" ></td>
            </tr>
            <tr>
                <td><label>Date of Expiry</label></td>
                <td><input type="date"  name="expiry" ></td>
            </tr>
            <tr>
                <td> <label>Amount Payable</label></td>
                <td> <input type="text" value="<?php echo $car->rate*$car->noOfDays ?>" name="payment" readonly></td>
            </tr>

            <tr>
                <td><input type="submit"></td>
            </tr>

        </table>
    </form>