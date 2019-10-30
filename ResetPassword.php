<!DOCTYPE html>
<!--
Display of Reset Password function
-->
<html>
    <head>
        <title>ResetPassword</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>Enter your New password</div>
        <form action="ResetPasswordPHP.php" method="post">
         <br><br> Email :
        <input id="searchuseremail" type="text" name="searchuseremail" placeholder="Email" required > <!-- Will be used to find user account to reset password-->
         <br><br> New Password :
        <input id="resetpassword1" type="password" name="resetpassword1" placeholder="*****" autofocus="" required>
            <br><br><br><br>    
  <input id="submit" type="submit" value="Submit"/>  <!-- Takes user to Registration Page to enter data-->
           </form>
        <br><br><br><br>
        <input id="passwordback" type="button" value="Back" onclick="window.location.href='SystemHome.php'" /> 
        <!-- <script src="LTSJava.js"></script> -->
        
    </body>
</html>
