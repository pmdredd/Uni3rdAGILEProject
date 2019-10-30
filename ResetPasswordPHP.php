<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Reset Password</title>
        </head>
    <body>

<?php
require_once ('dbconnection.php'); // $connection

$email = $_POST['searchuseremail'];
$newpassword = $_POST['resetpassword1'];
//Updates Users Password
$sql = "UPDATE users SET Password = '$newpassword'" . 
        "WHERE email = '$email'";
    
        
$query_successful = mysqli_query($connection, $sql);
        
        if ($query_successful) {
            echo '<p>User password has been successfully changed!</p>';
            
            echo '<p><a href="SystemHome.php">Home</a></p>';
        } else {
            echo '<p>User password reset failed!</p>';
            echo '<p>Please try again. <a href="ResetPassword.php">Password Reset</a></p>';
        }
        
        mysqli_close($connection);


?>
    </body>
</html>


