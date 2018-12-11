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
if($_SESSION['ThisUser']== null) {
   header("Location: http://localhost/Final%20Project/login.php");



}
// call to function fetchAllUsers() from functions.php
$allusers = getAllCar();

?>


<html>
<head>
    <title>Display Car</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<table>
    <th>ID</th>
    <th>Car Name</th>
    <th>Car Mileage</th>
    <th>Car Number</th>
    <th>Company Name</th>
    <th>Year</th>
    <th>Available</th>
    <th>Rate</th>
    <th>Type</th>
    <?php //NOTICE THE USE OF PHP IN BETWEEN HTML

    foreach($allusers as $userdetails){
        ?>

        <tr>
            <td><a href="car_selection.php?id=<?php print $userdetails['id']; ?>"><?php print $userdetails['id']; ?></a></td>
            <td><?php print $userdetails['car_name']; ?></td>
            <td><?php print $userdetails['car_mileage']; ?></td>
            <td><?php print $userdetails['car_number']; ?></td>
            <td><?php print $userdetails['company_name']; ?></td>
            <td><?php print $userdetails['year']; ?></td>
            <td><?php print $userdetails['availability']; ?></td>
            <td><?php print $userdetails['rate']; ?></td>
            <td><?php print $userdetails['type']; ?></td>
        </tr>

    <?php } ?>

</table>
</body>
</html>
