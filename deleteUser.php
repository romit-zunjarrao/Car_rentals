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

if (!empty($_GET)) {
    $id = $_GET['userid'];
    deleteUser($id);
    header("Location: http://localhost/Final%20Project/ManageUser.php");
}


// call to function fetchAllUsers() from functions.php
$allusers = fetchAllUsers();

?>


<body>


<table>
    <tr>
        <td>UserID</td>
        <td>UserName</td>
        <td>FirstName</td>
        <td>LastName</td>
        <td>Password</td>
        <td>Email</td>
        <td>Active</td>

        <?php //NOTICE THE USE OF PHP IN BETWEEN HTML
        foreach ($allusers as $userdetails) {
        ?>
    <tr>
        <td>
            <a href="deleteUser.php?userid=<?php print $userdetails['UserID']; ?>"><?php print $userdetails['UserID']; ?></a>
        </td>

        <td><?php print $userdetails['UserName']; ?></td>
        <td><?php print $userdetails['FirstName']; ?></td>
        <td><?php print $userdetails['LastName']; ?></td>
        <td><?php print $userdetails['Email']; ?></td>
        <td><?php print $userdetails['Password']; ?></td>
        <td><?php print $userdetails['Active']; ?></td>
    </tr>

    <?php } ?>
</table>
</body>
</html>