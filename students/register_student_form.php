<?php
require_once '../header.html';
?>
<h2>Register a new student</h2>
<form action="register_student.php" method="post">
    <h2>Please enter the student details</h2>
    <p>Student Name: <input name="name" type="text" placeholder='2 - 50 characters' maxlength="50"></p>
    <br><br>
    <input type="submit" value="Register student">
</form>