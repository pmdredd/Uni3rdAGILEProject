<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Raise Request</title>
        </head>
    <body>
        <?php
        
        
        
session_start();
        require_once ('dbconnection.php'); // $connection
      
        $ID = Rand(999999999,1);
        //Insters the Request
        $sql = "INSERT INTO requests (RequestID,Subject, Info, 
            Email, OpenDate) VALUES ("
                .$ID.",'" 
               .$_POST["Subjects"] . "', '" .
               $_POST["info"] . "', '" .
               $_SESSION["email"]. "', "
              . "CURDATE()"
               .")"    ;
    
           $query_successful = mysqli_query($connection, $sql);
        
        if ($query_successful) {
            echo '<p>Request has been successfully Raised!</p>';
            echo '<p> Request ID is ' . $ID ;
            echo '<p><a href="SystemHome.php">Home</a></p>';
        } else {
            echo '<p>Request failed!</p>';
            echo '<p>Please try again. <a href="SystemHome.php">Home</a></p>';
        }
        
        mysqli_close($connection); 
        ?>
    </body>
</html>
