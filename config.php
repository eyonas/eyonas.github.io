<?php

// Connecting to the MySQL database
$user = 'teklemiche1';
$password = 'S4Awexep';

$database = new PDO('mysql:host=csweb.hh.nku.edu;dbname=db_spring19_teklemiche1', $user, $password);
include('functions.php');
function kachew_autoloader($class) {
    include "class." . $class . ".php";
}
spl_autoload_register('kachew_autoloader');

session_start();

// Start the session


// if customerID is not set in the session and current URL not login.php redirect to login page


// Else if session key customerID is set get $customer from the database
?>