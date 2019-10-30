<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>User Registration</title>
        </head>
    <body>
        <?php

        require_once ('dbconnection.php'); // $connection
      //Insters details into users table
        $sql = "insert into users (Email, Firstname, Lastname, 
            Department, Location, Password) VALUES ('"
                
              .$_POST["Email"] . "', '" . 
               $_POST["Firstname"] . "', '" .
               $_POST["Lastname"] . "', '" .
               $_POST["Depname"] . "', '" . 
               $_POST["Location"] . "', '" . 
               $_POST["Password1"] . "')"
                             ;
    
        $query_successful = mysqli_query($connection, $sql);
        
        if ($query_successful) {
            echo '<p>User has been successfully registered!</p>';
            echo '<p>Now please <a href="index.php">Login</a></p>';
        } else {
            echo '<p>User registration failed!</p>';
            echo '<p>Please try again. <a href="index.php">Register</a></p>';
        }
        
        mysqli_close($connection); 
        ?>
    </body>
</html>
