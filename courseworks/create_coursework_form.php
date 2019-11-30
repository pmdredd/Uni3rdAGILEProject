<?php
require_once '../courses/course_functions.php';
require_once '../header.html';

$courses = getAllCourses();
?>

<h2>Create a Course</h2>
<form method="post" action="create_coursework.php">
    <input name="name" type="text" placeholder="Enter the course's name" required>
    <br>
    <select name='course' required>
    <option disabled selected value></option>
    <?php foreach ($courses as $course) {
        echo "<option value='" . $course['course_id'] . "'>" . $course['name'] . "</option>";
    }
    ?>
    </select>
    <br>
    <input name="deadline" type="date" placeholder="Deadline for this Coursework" required>
    <br>
    <input name="credit_weight" type="number" placeholder="Credit weight for this Coursework" required>
    <br>
    <input name="feedback_due_date" type="date" placeholder="Feedback due date for this Coursework" required>
    <br>
    <input type="submit" value='Create Coursework'>
</form>