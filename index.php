

<html>
    <head>
        <title>LairdTicketSystem</title> <!-- Intro Page --> 
            </head>
    <body>
        <div><h1>Laird Ticket System </h1></div>
        <form action="loginphp.php" method="post">
        <br> Email : 
        <input id="emaillogin" name="emaillogin" type="text" placeholder="Email" required>
        <br> Password :  
        <input id="passwordlogin" name="passwordlogin" type="password" placeholder="*******" required>
        <br/><br/>
        <input id="login" type="submit" value="Login"/> <!-- onclick="Login();" /> <!--Login Button that will run javascript to validate data -->
         <br/><br/>
         </form>
      <input type="button" value="Register" onclick="window.location.href='Register.php'" />  <!-- Takes user to Registration Page to enter data-->
       <br/><br/>      
        
        <script src="LTSJava.js"></script> <!--Used to define Java functions location -->
       
    </body>
</html>
