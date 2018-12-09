<?php

//$password = md5("Smith");
//echo $password."<br><br>";
//$code = md5(uniqid(rand(), TRUE));

//echo $code;


//Generate a unique code
/**
 * @param string $length
 * @return string
 */
function getUniqueCode($length = "")
{
    $code = md5(uniqid(rand(), TRUE));
    if ($length != "") {
        return substr($code, 0, $length);
    } else {
        return $code;
    }
}


//$plainText = getUniqueCode(15);
//echo $plainText;


/**
 * @param $plainText
 * @param null $salt
 * @return string
 */
function generateHash($plainText, $salt = NULL)
{
    echo "plain text =" . $plainText . "<br><br>";
    if ($salt === NULL) {
        $salt = substr(md5(uniqid(rand(), TRUE)), 0, 25);
        echo "salt when salt is null : " . $salt . "<br><br>";
    } else {
        echo "salt before substr : " . $salt . "<br><bR>";
        $salt = substr($salt, 0, 25);
        echo "just salt : " . $salt . "<br><bR>";
    }
    echo "return salt : " . $salt . "<br><br>";
    echo "return sha ( salt ) : " . sha1($salt) . "<br><br>";
    echo "return sha ( plaintext ) : " . sha1($plainText) . "<br><br>";
    echo "return sha ( satl + plaintext ) : " . sha1($salt . $plainText) . "<br><br>";
    echo "return salt . sha1 ( salt + plaintext ) : " . $salt . sha1($salt . $plainText) . "<br><br>";

    return $salt . sha1($salt . $plainText);
}


//echo $newpassword;
//$compare = generateHash($_POST['password'], $newpassword);

//echo $compare;

/**
 * @param $username
 * @param $firstname
 * @param $lastname
 * @param $email
 * @param $password
 * @return bool
 */
function createNewUser($username, $firstname, $lastname, $email, $password)
{
    global $mysqli, $db_table_prefix;
    //Generate A random userid

    $character_array = array_merge(range(a, z), range(0, 9));
    $rand_string = "";
    for ($i = 0; $i < 6; $i++) {
        $rand_string .= $character_array[rand(
            0, (count($character_array) - 1)
        )];
    }

    //$rand_string = getUniqueCode(14);
    //echo $rand_string;
    //echo $username;
    //echo $firstname;
    //echo $lastname;
    //echo $email;
    //echo $password;

    $newpassword = generateHash($password);

    echo $newpassword;


    $stmt = $mysqli->prepare(
        "INSERT INTO " . $db_table_prefix . "UserDetails (
		UserID,
		UserName,
		FirstName,
		LastName,
		Email,
		Password,
		Active
		)
		VALUES (
		'" . $rand_string . "',
		?,
		?,
		?,
		?,
		?,
        1
		)"
    );
    $stmt->bind_param("sssss", $username, $firstname, $lastname, $email, $newpassword);
    //print_r($stmt);
    $result = $stmt->execute();
    //print_r($result);
    $stmt->close();
    return $result;

}

//Retrieve complete user information by username
/**
 * @param $username
 * @return array
 */
function fetchUserDetails($username)
{

    global $mysqli, $db_table_prefix;
    $row=null;
    $stmt = $mysqli->prepare("SELECT
		UserID,
		UserName,
		FirstName,
		LastName,
		Email,
		Password,
		Active
		FROM " . $db_table_prefix . "UserDetails
		WHERE
		UserName = ?
		LIMIT 1");
    $stmt->bind_param("s", $username);

    $stmt->execute();
    $stmt->bind_result($UserID, $UserName, $FirstName, $LastName, $Email, $Password,  $Active);
    while ($stmt->fetch()) {
        $row = array('UserID' => $UserID,
            'UserName' => $UserName,
            'FirstName' => $FirstName,
            'LastName' => $LastName,
            'Email' => $Email,
            'Password' => $Password,
            'Active' => $Active);
    }
    $stmt->close();
    return $row;
}


//Check if a user is logged in
/**
 * @return bool
 */


function isUserLoggedIn()
{
    global $loggedInUser, $mysqli, $db_table_prefix;
    $stmt = $mysqli->prepare(
        "SELECT
		UserID,
		Password
		FROM " . $db_table_prefix . "UserDetails
		WHERE
		UserID = ?
		AND
		Password = ?
		AND
		active = 1
		LIMIT 1");
    $stmt->bind_param("ss", $loggedInUser->user_id, $loggedInUser->hash_pw);
    $stmt->execute();
    $stmt->store_result();
    $num_returns = $stmt->num_rows;
    $stmt->close();

    if ($loggedInUser == NULL) {
        return false;
    } else {
        if ($num_returns > 0) {
            return true;
        } else {
            destroySession("ThisUser");
            return false;
        }
    }
}


//Destroys a session as part of logout
/**
 * @param $name

function destroySession($name)
{
    if (isset($_SESSION[$name])) {
        $_SESSION[$name] = NULL;
        unset($_SESSION[$name]);
    }
}
*/

//Retrieve complete user information of all users
/**
 * @return array
 */
function fetchAllUsers()
{

    global $mysqli, $db_table_prefix;
    $stmt = $mysqli->prepare(
        "SELECT
		UserID,
		UserName,
		FirstName,
		LastName,
		Email,
		Password,
		Active
		FROM " . $db_table_prefix . "UserDetails
		");

    $stmt->execute();
    $stmt->bind_result(
        $UserID,
        $UserName,
        $FirstName,
        $LastName,
        $Email,
        $Password,
        $Active
    );
    while ($stmt->fetch()) {
        $row[] = array(
            'UserID' => $UserID,
            'UserName' => $UserName,
            'FirstName' => $FirstName,
            'LastName' => $LastName,
            'Email' => $Email,
            'Password' => $Password,
            'Active' => $Active
        );
    }
    $stmt->close();
    return ($row);
}

function getAllCar()
{

    global $mysqli;
    $stmt = $mysqli->prepare("SELECT * from car_info");
    $stmt->execute();
    $stmt->bind_result(
        $id,$car_name,$car_mileage, $car_number, $company_name, $year, $availablity, $rate,$type
    );
    while($stmt->fetch())
    {
        $row[] = array(
            'id'=>$id,
            'car_name'=>$car_name,
            'car_mileage'=>$car_mileage,
            'car_number'=>$car_number,
            'company_name'=>$company_name,
            'year'=>$year,
            'availability'=>$availablity,
            'rate'=>$rate,
            'type'=> $type
        );
    }

    return $row;
}