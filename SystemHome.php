<?php
session_start();

//Home Page 

if (!isset($_SESSION["email"])) {

    die('<h2>Error: You are not logged in! Please <a href="index.php">Login</a></h2>');

}
$isadmin = $_SESSION["email"] ;
?>

<!DOCTYPE html>
<html>
    <head>
         <title>User Login</title>
        </head>
    <body>
        <?php
        
        require_once ('dbconnection.php'); // $connection
  echo '
         <p><a href="RaiseRequest.php">Raise Request</a></p>
               <br><br>
                 <p><a href="EditAccount.php"> Edit Account </a></p>
               <br><br>
        <p><a href="YourRequests.php"> Your Requests </a></p>
              <br><br>
        <p><a href="index.php"> Logout </a></p> ';
        ?>
    </body>
</html>
<?php
// Only displays Password Reset if Admin Logs in
    if ($isadmin === "Admin"){
    echo '    <p><a href="ResetPassword.php"> Reset Password </a></p>'
         . '<br><br>'
            . '<p><a href="AdminRequest.php"> All Requests</a></p>';
    
}     
?>