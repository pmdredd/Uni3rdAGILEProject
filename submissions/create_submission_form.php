<?php
require_once '../courseworks/coursework_functions.php';
require_once '../students/student_functions.php';
require_once '../header.html';

$courseworks = getAllCourseworks();
$students = getAllStudents();
?>

<h2>Create a Submission</h2>

<form method="post" action="create_submission.php">
    Coursework for this Submission
    <select name='coursework' required>
    <option disabled selected value></option>
    <?php foreach ($courseworks as $coursework) {
        echo "<option value='" . $coursework['coursework_id'] . "'>" . $coursework['name'] . "</option>";
    }
    ?>
    </select>
    <br>
    Student that this Submission belongs to
    <select name='student' required>
    <option disabled selected value></option>
    <?php foreach ($students as $student) {
        echo "<option value='" . $student['student_id'] . "'>" . $student['name'] . "</option>";
    }
    ?>
    </select>
    <br>
    The Student's mark for this submission (out of 100)
    <input name="mark" type="number" placeholder="Enter the course's name" max="100">
    <br>
    The date this submission was handed in by the Student
    <input name="hand_in_date" type="date" required>
    <br>
    Is this the Student's second submission for this Coursework?
    <input name="second_submission" type="checkbox">
    <br>
    <br>
    <input type="submit" value='Create Submission'>
</form>