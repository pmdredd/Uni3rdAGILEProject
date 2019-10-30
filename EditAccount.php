<html>
    <head>
        <title>Edit Account</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <!-- Display for Edit Account -->
      <div>Fill in the appropriate boxes bellow to edit Account Details</div>
        <form action="EditAccountPHP.php" method="post">
         <br><br> First Name :
        <input id="editfirstname" type="text" name="Firstname" placeholder="First Name" autofocus="" required>
         <br><br> Last Name : 
        <input id="editlastname" type="text" name="Lastname" placeholder="Last Name" required>
         <br><br> Department Name :
        <input id="editdepname" type="text" name="Depname" placeholder="Finance" required >
         <br><br> Location :
        <input id="editlocation" type="text" name="Location" placeholder="1st Floor" required >              
         <br><br><br>
        <input id="editsubmit" type="submit" value="Submit" /> 
        </form>
        <br><br>
        <input id="editback" type="button" value="Back" onclick="window.location.href='SystemHome.php'" /> 
        
         <script src="LTSJava.js"></script> <!--Used to define Java functions location -->
        
    </body>
    
    
    
    
</html>
