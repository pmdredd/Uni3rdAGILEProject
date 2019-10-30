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
      
        $NoteID = Rand(999999999,1);
        $reqID = $_POST["reqidadd"];
        
        
        $sql = "INSERT INTO notes (NoteID,NoteInfo, RequestID) VALUES (" //Creates note
                .$NoteID.",'"
               .$_POST["noteinfo"] . "',"
                . $reqID
                . ")";
        
    
           $query_successful = mysqli_query($connection, $sql);
        
        if ($query_successful) {
            echo '<p>Note has been successfully Added!</p>';
            echo '<p> Note ID is ' . $NoteID ;
            echo '<p><a href="SystemHome.php">Home</a></p>';
        } else {
            echo '<p>Request failed!</p>';
            echo '<p>Please try again. <a href="SystemHome.php">Home</a></p>';
        }
        
        mysqli_close($connection); 
        ?>
    </body>
</html>
