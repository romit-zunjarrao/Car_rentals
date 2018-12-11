<?php
require_once("config.php");

// call to function fetchAllUsers() from functions.php
$allusers = fetchAllUsers();
?>
<head>
    <title>Manage User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>


<table>
    <tr>
        <th>UserID</th>
        <th>UserName</th>
        <th>FirstName</th>
        <th>LastName</th>
        <th>Password</th>
        <th>Email</th>
        <th>Active</th>

        <?php //NOTICE THE USE OF PHP IN BETWEEN HTML
        foreach ($allusers as $userdetails) {
        ?>
    <tr>
        <td>
            <a href="updateThisUser.php?userid=<?php print $userdetails['UserID']; ?>"><?php print $userdetails['UserID']; ?></a>
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
<a href="managePage.php"><input type="button" value="Go Back Main Menu" class="button"></a>
</body>
</html>