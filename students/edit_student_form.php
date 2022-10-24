<?php
require_once 'student_functions.php';
require_once '../header.html';

$student = getStudentById($_GET['id']);

?>

<h2>Edit Student</h2>

<form method="post" action="edit_student.php">
    <input name="student_id" type="hidden" value="<?php echo $student['student_id'] ?>">
    <input name="name" type="text" value="<?php echo $student['name']; ?>" required>
    <br>
    <input type="submit" value='Edit Student'>
</form>