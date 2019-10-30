  <?php
        $reqattid = $_POST['attchedid'];
         require_once ('dbconnection.php'); // $connection
        $result = mysqli_query($connection, "SELECT * FROM notes WHERE RequestID = '$reqattid '"); //finds all attached notes
      
        echo "
        <table border='2'>

        <tr>

        <th>Note ID</th>
        <th>Note Info</th>
          </tr>";

 

        while ($row = mysqli_fetch_array($result)) { //displayed table showing info

            echo "<tr>";

            echo "<td>" . $row['NoteID'] . "</td>";
            
            echo "<td>" . $row['NoteInfo'] . "</td>";

            echo "</tr>";

        }

        echo "</table>";
        
        echo '<p><a href="SystemHome.php">Home</a></p>';
        
        ?>