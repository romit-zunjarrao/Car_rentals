<?php
/**
 * Created by PhpStorm.
 * User: romit
 * Date: 09-12-2018
 * Time: 20:09
 */
require_once("config.php");
if (!empty($_POST)) {

    $username = $_POST['username'];
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    createNewUser($username, $firstname, $lastname, $email, $password);
    header("Location: http://localhost/Final%20Project/ManageUser.php");
    die();

}


?>

<html>
<title>Insert New User</title>
<link rel="stylesheet" href="style.css">
<body>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <table>
        <tr>
            <td><label>Username</label></td>
            <td><input type="text" name="username"></td>
        </tr>
        <tr>
            <td><label>First Name</label></td>
            <td><input type="text" name="first_name"></td>
        </tr>
        <tr>
            <td><label>Last Name</label></td>
            <td><input type="text" name="last_name"></td>
        </tr><tr>
            <td><label>Email</label></td>
            <td><input type="text" name="email"></td>
        </tr>
        <tr>
            <td><label>Password</label></td>
            <td><input type="text" name="password"></td>
        </tr>
        <tr>
            <td><label>Active</label></td>
            <td><input type="text" name="active"></td>
        </tr>


    </table>
    <input type="submit" value="Add " class="button">
    <a href="managePage.php"><input type="button" value="Go Back Main Menu" class="button"></a>

</form>
</body>
</html>
