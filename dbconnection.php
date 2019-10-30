<?php

$dbserver = "silva.computing.dundee.ac.uk";
$userID = "jacklaird";    // Your database user name
$password = "abc321";  // Your database password
$database = "jacklairddb";    // Your database name

$connection = mysqli_connect($dbserver, $userID, $password, $database);

if (!$connection) {
    die("Could not connect to database: " . mysqli_connect_error());
}

?>
