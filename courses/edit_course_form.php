<?php
require_once 'course_functions.php';
require_once '../header.html';

$course = getCourseById($_GET['id']);

?>


<h2>Edit Course</h2>

<form method="post" action="edit_course.php">
    <input name="course_id" type="hidden" value="<?php echo $course['course_id'] ?>">
    <input name="name" type="text" value="<?php echo $course['name']; ?>" required>
    <br>
    <input type="submit" value='Edit Course'>
</form>