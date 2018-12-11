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
    $userid=$_POST['userid'];
    $username=$_POST['username'];
    $first_name =$_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $active = $_POST['active'];

    updateUser($userid,$username, $first_name, $last_name, $email, $password, $active);

   header("Location: http://localhost/Final%20Project/ManageUser.php");
    die();

}

$id= $_GET["userid"];
$allusers = getUser($id);

?>


<html>
<head>
    <title>Updating Selected User</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<table>

    <?php //NOTICE THE USE OF PHP IN BETWEEN HTML

    foreach($allusers as $userdetails) {
        $username = $userdetails['username'];
        $first_name = $userdetails['first_name'];
        $last_name = $userdetails['last_name'];
        $email = $userdetails['email'];
        $password = $userdetails['password'];
        $active = $userdetails['active'];

    }?>




    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <table>
            <tr>
                <td><label> User ID </label></td>
                <td> <input type="text" value="<?php echo $id?>"  name="userid" readonly></td>
            </tr>
            <tr>
                <td><label>Username </label></td>
                <td> <input type="text" value="<?php echo $username ?>"  name="username" ></td>
            </tr>
            <tr>
                <td> <label> First Name </label></td>
                <td><input type="text" value="<?php echo $first_name ?>" name="first_name" ></td>
            </tr>
            <tr>
                <td><label> Last Name</label></td>
                <td><input type="text" value="<?php echo $last_name ?>" name="last_name" ></td>
            </tr>
            <tr>
                <td><label> Email</label></td>
                <td><input type="text " value="<?php echo $email?>" name="email" ></td>
            </tr>
            <tr>
                <td> <label> Password </label></td>
                <td> <input type="text" value="<?php echo $password?>" name="password" ></td>
            </tr>
            <tr>
                <td> <label> Active </label></td>
                <td> <input type="text" value="<?php echo $active?>" name="active" ></td>
            </tr>




        </table>
        <input type="submit" name="update" class="button">
        <br>
        <a href="managePage.php"><input type="button" value="Go Back Main Menu" class="button"></a>

    </form>




</table>
</body>
</html>

