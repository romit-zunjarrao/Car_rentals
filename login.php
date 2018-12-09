<?php

require_once("config.php");


//Prevent the user visiting the logged in page if he/she is already logged in
/*if (isUserLoggedIn()) {
    header("Location: myaccount.php");
    die();
}*/

//Forms posted
if (!empty($_POST)) {
    $errors = array();
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    //Perform some validation

    if ($username == "") {
        $errors[] = "enter username";
    }
    if ($password == "") {
        $errors[] = "enter password";
    }

    if (count($errors) == 0) {
        //retrieve the records of the user who is trying to login
        $userdetails = fetchUserDetails($username);

        //See if the user's account is activated
        if ($userdetails["Active"] == 0) {
            $errors[] = "account inactive";
        } else {
            //Hash the password and use the salt from the database to compare the password.
            $entered_pass = generateHash($password, $userdetails["Password"]);
            echo "entered password : " . $entered_pass . "<br><br>";
            echo "database password : " . $userdetails['Password'];

            if ($entered_pass != $userdetails["Password"]) {
                $errors[] = "invalid password";
            } else {
                //Passwords match! we're good to go'
                //Transfer some db data to the session object
                $loggedInUser = new User();
                $loggedInUser->email = $userdetails["Email"];
                $loggedInUser->user_id = $userdetails["UserID"];
                $loggedInUser->hash_pw = $userdetails["Password"];
                $loggedInUser->first_name = $userdetails["FirstName"];
                $loggedInUser->last_name = $userdetails["LastName"];
                $loggedInUser->username = $userdetails["UserName"];


                //pass the values of $loggedInUser into the session -
                // you can directly pass the values into the array as well.

                $_SESSION["ThisUser"] = $loggedInUser;

                //now that a session for this user is created
                //Redirect to this users account page
                //header("Location: myaccount.php");
                //die();
            }
        }

    }
}

//require_once("header.php"); ?>
<html>
<head>
    <script>

    </script>
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
        p{
            padding-left:20px;
            font-size:20px;
            color:#C5C6C7;
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

        .maindiv{
            background-color:  #1F2833 ;
        }
        .imagediv{
            padding:15px;
        }

        .signinform{
            color:#66FCF1;
        }

        .signupform{
            color:#66FCF1;
        }

        footer{
            width:100%;
            height:30px;
            color:#45A29E;
            background-color: #1F2833;
            font-size:20px;
            text-align:right;
        }

        button{
            height:30px;
            width:100px;
            color:#66FCF1;
            background-color: black;
            border-color: black;
        }
        button:hover{
            color:black;
            background-color:white;
            transition: 2s all;
        }
    </style>
</head>

<body>
<header>East Coast Rentals</header><br>
<div class="maindiv">
    <div class="imagediv">


        <ul>
            <a id="a" href="index.php">Home</a>
            <a id="a" href="rental.php">Rentals</a>
            <a id="a" href="login.php">Sign In</a>
        </ul>
        <pre>
					<?php print_r($errors); ?>
        </pre>
        <p>Please enter your details to Sign in </p>

        <div id="regbox" class="signinform">
            <form name="login" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                <p>
                    <label for="username">Username:</label>
                    <input id="username" type="text" name="username"/>
                </p>
                <p>
                    <label for="password">Password:</label>
                    <input id="password" type="password" name="password"/>
                </p>
                <p>
                    <label>&nbsp;</label>
                    <input type="submit" value="Login" class="submit"/>
                </p>
            </form>


    </div>

</div>
</body>
</html>