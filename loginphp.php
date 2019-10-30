<?php
session_start();
?>


<!DOCTYPE html>
<html>
    <head>
         <title>User Login</title>
        </head>
    <body>
        <?php
        
        $isadmin = $_POST["emaillogin"];
        
        require_once ('dbconnection.php'); // $connection
      //SQL STATMENT to determin login details
        $sql = "SELECT email FROM users WHERE email = '"                
              .$_POST["emaillogin"] . "' AND Password = '" . 
               $_POST["passwordlogin"] ."'"
                             ;
    $result = mysqli_query($connection, $sql);
        if (mysqli_num_rows($result) == 1) {
          
                 
        while ($row = mysqli_fetch_assoc($result)) {
             $_SESSION["email"] = $row["email"];
                  }
    mysqli_free_result($result);
        
    
    
    //Displayed Homepage
    echo ' Welcome '. $_SESSION["email"] . ' to Laird Ticketing System';
    $result = mysqli_query($connection, $sql);
    
     echo '
         <p><a href="RaiseRequest.php">Raise Request</a></p>
               <br><br>
                 <p><a href="EditAccount.php"> Edit Account </a></p>
               <br><br>
        <p><a href="YourRequests.php"> Your Requests </a></p>
              <br><br>
              <p><a href="index.php"> Logout </a></p>
         <br><br> ';
  
    } else {
        echo '<p>Login Failed, Please try again</p>';
        echo '<p><a href="index.php">Login</a></p>';
    }
   
        mysqli_close($connection); 
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