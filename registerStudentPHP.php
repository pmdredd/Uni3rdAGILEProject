<!--

    Team 4   
    GA30003: Assignment 1 (Student Records System)
    November 2019

    Page name:  registerStudentPHP.php

-->

<?php 
  $db = mysqli_connect(** database host, username, password details here **);
  $student_id = "";
  $name = "";
  
  if (isset($_POST['register'])) {
  	$student_id = $_POST['student_id'];
  	$name = $_POST['name'];

  	$sql_id = "SELECT * FROM users WHERE student_id='$student_id'";
  	$sql_name = "SELECT * FROM users WHERE name='$name'";
  	$res_id = mysqli_query($db, $sql_id);
  	$res_name = mysqli_query($db, $sql_name);

  	if (mysqli_num_rows($res_id) > 0) {
  	  $name_error = "Sorry... Student ID already exists"; 	
  	}else if(mysqli_num_rows($res_name) > 0){
  	  $email_error = "Sorry... Student name already exists"; 	
  	}else{
           $query = "INSERT INTO users (student_id, name) 
      	    	  VALUES ('$student_id', '$name')";
           $results = mysqli_query($db, $query);
           echo 'Registered!';
           exit();
  	}
  }
?>