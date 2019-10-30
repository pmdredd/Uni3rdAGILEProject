<!DOCTYPE html>
<!--
Displays the new users form
-->
<html>
    <head>
        <title>Register</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>Fill in the boxes bellow to register</div>
        <form action="registerphp.php" method="post">
         <br><br> First Name :
        <input id="firstname" type="text" name="Firstname" placeholder="First Name" autofocus="" required>
         <br><br> Last Name : 
        <input id="lastname" type="text" name="Lastname" placeholder="Last Name" required>
         <br><br> Department Name :
        <input id="depname" type="text" name="Depname" placeholder="Finance" required >
         <br><br> Location :
        <input id="location" type="text" name="Location" placeholder="1st Floor" required >              
         <br><br> Email : 
        <input id="email" type="email" name ="Email" placeholder="Email@email.com" required>
         <br><br> Password :
        <input id="password1" type="password" name ="Password1" placeholder="******" required>
        <br> <br> Confirm Password :
        <input id="password2" type="password" name ="Password2" placeholder="******" required>
        No complexity required yet
         <br><br><br>
         <input id="registersubmit" type="submit" value="Submit"/> <!-- onclick="Register();" />  FOR AFTER PHP WORKS-->
        <br><br>
     <input id="rigsterback" type="button" value="Back" onclick="window.location.href='index.php'" /> 
        </form>
        
         <script src="LTSJava.js"></script> <!--Used to define Java functions location -->
        
         
         
         
         
    </body>
</html>
