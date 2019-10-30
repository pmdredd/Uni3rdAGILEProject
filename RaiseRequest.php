<!DOCTYPE html>
<!--
Display for Raising a Request
-->

<html>
    <head>
        <title>Raise Request</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>Please fill in the details of your Request</div>
        
         <br><br> Subject :
  <!--  REDUNDANT CODE     <input id="subject" list="subjects" name="Subject"> -->
         
        <form action="RaiseRequestPHP.php" method="post">
         <select id="selsubjects" name="Subjects">
    <option value="Hardware">Hardware</option>
    <option value="Software">Software</option>
    <option value="Telecoms">Telecoms</option>
    <option value="Server">Server</option>
    <option value="Access">Access</option>
    <option value="Infromation">Information</option>
</select>     
<!-- REDUNDANT CODE REPLACED BY SELECT
<datalist id="subjects">
     <option value="Hardware">
  <option value="Software">
  <option value="Telecoms">
  <option value="Server">
  <option value="Access">
  <option value="Information">
</datalist> <!-- List of possible subjects -->

         
        <br><br> Information : 
        <br>
        <textarea name= "info" rows="10" cols="60" id="requestinfo"  placeholder="Enter Details here" required></textarea>      
        
        <br><br><br>
       <input id="Submit" type="submit" value="Submit"/>
        </form>
        
        <br><br><br>
        <input id="requestback" type="button" value="Back" onclick="window.location.href='SystemHome.php'" /> 
        
         <script src="LTSJava.js"></script> <!--Used to define Java functions location -->  
        
       
         
         
    </body>
    
</html>
