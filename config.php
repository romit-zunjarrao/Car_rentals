<?php

//error reporting and warning display.
//error_reporting(E_ALL);
//ini_set('display_errors', 'On');

if (!ini_get('date.timezone')) {
    date_default_timezone_set('GMT');
    date_default_timezone_set('US/Eastern');
}


require_once("db-settings.php"); //Require DB connection
require_once("function.php"); // database and other functions are written in this file
require_once("User.php");

session_start();

//loggedInUser can be used globally if constructed
if (isset($_SESSION["ThisUser"]) && is_object($_SESSION["ThisUser"])) {
    $loggedInUser = $_SESSION["ThisUser"];
}

