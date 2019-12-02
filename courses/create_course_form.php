<?php
require_once '../header.html';
?>
<h2>Create Course</h2>
<form method="post" action="create_course.php">
    <input name="name" type="text" placeholder="Enter the course's name" required>
    <br>
    <input type="submit" value='Create Course'>
</form>