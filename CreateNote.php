
 <?PHP

 session_start();
require_once ('dbconnection.php'); // $connection
  $reqaddid = $_POST["creatid"];

 
$sql = "SELECT IF(CloseDate IS NULL, 0, 1) as close_date from requests where RequestID = " . $reqaddid; 
$result = mysqli_query($connection, $sql);
 

if (mysqli_num_rows($result) == 1) {  // This is to check that your SQL retrieved ONLY one row of data

 

                $row = mysqli_fetch_assoc($result);

               

if ($row["close_date"] != 1) {
        echo '<html>
    <head>
        <title>Add Note</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    
    <body>
        <div>Please fill in the details of your Note</div>
        <form action="CreateNotePHP.php" method="post">
        <br><br> Information : 
        <br>
        <textarea name= "noteinfo" rows="10" cols="60" id="requestinfo"  placeholder="Enter Details here" required></textarea>      
 '   ;   
  

        echo '<input type="hidden" name="reqidadd" value= ' . $reqaddid  . '> ' ;
               
   echo '     <br><br><br>
       <input id="Submit" type="submit" value="Submit"/>
        </form>
        
        <br><br><br>';
   echo' <p><a href="YourRequests.php">Back</a></p>  
       
         
    </body>
    
</html> ';
   
} else {
    echo'This Request is Closed and Notes Can NOT be Added <br> <br>';  
   echo ' <p><a href="YourRequests.php">Back</a></p>';
}
}
 

                mysqli_free_result($result);

 ?>