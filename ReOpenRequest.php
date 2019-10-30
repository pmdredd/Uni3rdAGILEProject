<?php

        $closereqid = $_POST["reopenid"];
        
      require_once ('dbconnection.php'); // $connection
        $sql  = "UPDATE requests SET CloseDate = NULL" //Re-Opens Request by Nulling the close date column
                . " WHERE RequestID = '$closereqid '";
                
       
        $query_successful = mysqli_query($connection, $sql);
        
        if ($query_successful) {
            echo '<p>Request has been successfully Re-Opened!</p>';
            echo '<p><a href="YourRequests.php">Requests</a></p>';
            echo '<p><a href="SystemHome.php">Home</a></p>';
        } else {
            echo '<p>Re-Open Request failed!</p>';
            echo '<p>Please try again. <a href="YourRequests.php">Requests</a></p>';
        }
        
        mysqli_close($connection);

        
        ?>