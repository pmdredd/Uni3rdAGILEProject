<?php

        $closereqid = $_POST["closeid"];
        
      require_once ('dbconnection.php'); // $connection
        $sql  = "UPDATE requests SET CloseDate = CURDATE()" //Closes reuest by instering date into close column
                . " WHERE RequestID = '$closereqid '";

        $query_successful = mysqli_query($connection, $sql);
        
        if ($query_successful) {
            echo '<p>Request has been successfully Closed!</p>';
            echo '<p><a href="YourRequests.php">Requests</a></p>';
            echo '<p><a href="SystemHome.php">Home</a></p>';
        } else {
            echo '<p>Close Request failed!</p>';
            echo '<p>Please try again. <a href="YourRequests.php">Requests</a></p>';
        }
        
        mysqli_close($connection);

        
        ?>