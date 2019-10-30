<!DOCTYPE html>
<!--
\Display of all the users own request
-->
<?php
session_start();
?>

<html>
    <head>
        <title>YourRequest</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>Here are your Requests</div>
        <br>
        Enter the request ID of the request you want to interact with in the box before clicking the adjacent button
        <br>
        <form action="CreateNote.php" method="post">
        <br> RequestID : 
       <input name= "creatid" id="creatid" ></input>      
       <input id="Submit" type="submit" value="Add Note"/>
        </form>
       
       
     <form action="AttachedNotes.php" method="post">
        <br> RequestID : 
       <input name= "attchedid" id="attchedid" ></input>      
       <input id="Submit" type="submit" value="See Note"/>
     </form>
       
         <form action="CloseRequest.php" method="post">
        <br> RequestID : 
       <input name= "closeid" id="closeid" ></input>      
       <input id="Submit" type="submit" value="Close Request"/>
         </form>
        
          <form action="ReOpenRequest.php" method="post">
        <br> RequestID : 
       <input name= "reopenid" id="reopenid" ></input>      
       <input id="Submit" type="submit" value="Re-Open Request"/>
         </form>
        
        
       <br><br><br>
        <?php
        $emailreq = $_SESSION['email'];
         require_once ('dbconnection.php'); // $connection
        $result = mysqli_query($connection, "SELECT * FROM requests WHERE email = '$emailreq'");


        
        echo "
        <table border='2'>

        <tr>

        <th>Request ID</th>
        <th>User Email</th>
        <th>Subject</th>
        <th>Info</th>
        <th>Date Opened</th>
        <th>Closed</th>

            </tr>";

 

        while ($row = mysqli_fetch_array($result)) {

            echo "<tr>";

            echo "<td>" . $row['RequestID'] . "</td>";
            
            echo "<td>" . $row['Email'] . "</td>";

            echo "<td>" . $row['Subject'] . "</td>";

            echo "<td>" . $row['Info'] . "</td>";

            echo "<td>" . $row['OpenDate'] . "</td>";

            echo "<td>" . $row['CloseDate']  . "</td>";
            
        

            

            echo "</tr>";

        }

        echo "</table>";
        
        echo '<p><a href="SystemHome.php">Home</a></p>';
  ?>      
</html>
