<!--

    Team 4   
    GA30003: Assignment 1 (Student Records System)
    November 2019

    Page name:  registerStudent.php

-->

<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student Registration (GA30003)</title>
    <link rel="stylesheet" type="text/css" media="screen" href="css/stylesheet.css" />
    <script src="javascript/script.js"></script>
</head>

<body>

    <!-- Top bar division block -->	
		<div class="topbar">
           <h2>Student Records System</h2>
        </div>
        
    <!-- Title bar division block -->
		<div class="titlebar">
           <h2>Register a new student</h2>
        </div>
        
<div class="content">

	
	<form action="registerStudentPHP.php" method="post">
    <h2>Please enter the student details</h2>
    <p>Student ID: <input id="student_id" type="text" placeholder='1 - 15 characters'></p>
    <p>Student Name: <input id="name" type="text" placeholder='2 - 50 characters'></p>
    <br><br>
	</form>
	<input type="submit" value="Register student" onclick="registerStudent();">
    
	
	
   
</div>
  
<!-- Footer division block -->
<div class="footer">
        <h3><a href="registerStudent.html" title="Home">Back</a></h3>
</div>

</body>
</html>