<?php
require_once 'coursework_functions.php';
require_once '../courses/course_functions.php';
require_once '../header.html';

$coursework = getCourseworkById($_GET['id']);
$coursework_course_name = getCourseworkCourseName($_GET['id'])->fetchColumn();
$courses = getAllCourses();
?>

<form method="post" action="edit_coursework.php">
    <input name="coursework_id" type="hidden" value="<?php echo $coursework['coursework_id'] ?>">
    <input name="name" type="text" value="<?php echo $coursework['name']?>" required>
    <br>
    <select name='course' required>
    <?php
    echo "<option selected value='" . $coursework['course_id'] . "'>" . $coursework_course_name . "</option>";
    echo "<br>";
    foreach ($courses as $course) {
        if ($course['name'] != $coursework_course_name) {
            echo "<option value='" . $course['course_id'] . "'>" . $course['name'] . "</option>";
        }
    }
    ?>
    </select>
    <br>
    <input name="deadline" type="date" value="<?php echo $coursework['deadline']?>" required>
    <br>
    <input name="credit_weight" type="number" value="<?php echo $coursework['credit_weight']?>" required>
    <br>
    <input name="feedback_due_date" type="date" value="<?php echo $coursework['feedback_due_date']?>" required>
    <br>
    <input type="submit" value='Edit Coursework'>
</form>
