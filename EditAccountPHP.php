<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit Account</title>
        </head>
    <body>

<?php
session_start();
require_once ('dbconnection.php'); // $connection

$fname = $_POST["Firstname"];
$lname = $_POST["Lastname"];
$dep = $_POST["Depname"];
$loc = $_POST["Location"];
$sessionemail = $_SESSION["email"];


$sql = "UPDATE users SET Firstname = '$fname'". //Updates User Name
        ", Lastname = '$lname ' "
        .", Department = '$dep' "
        . ", Location= '$loc'"
        . "WHERE email = '$sessionemail'";
            

        
$query_successful = mysqli_query($connection, $sql);
        
        if ($query_successful) {
            echo '<p>User details has been successfully changed!</p>';
            echo '<p><a href="EditAccount.php">Edit Account</a></p>';
            echo '<p><a href="SystemHome.php">Home</a></p>';
        } else {
            echo '<p>User edit failed!</p>';
            echo '<p>Please try again. <a href="EditAccount.php">Edit Account</a></p>';
        }
        
        mysqli_close($connection);

?>
    </body>
</html>


