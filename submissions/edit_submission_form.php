<?php
require_once 'submission_functions.php';
require_once '../courseworks/coursework_functions.php';
require_once '../students/student_functions.php';
require_once '../header.html';

$submission = getSubmissionById($_GET['id']);
$courseworks = getAllCourseworks();
$students = getAllStudents();
?>

<h2>Edit Submission</h2>

<form method="post" action="edit_submission.php">
    <input name="submission_id" type="hidden" value="<?php echo $submission['submission_id'] ?>">
    Coursework for this Submission
    <select name='coursework' required>
        <?php
        echo "<option selected value='" . $submission['coursework_id'] . "'>" . $submission['name'] . "</option>";
        foreach ($courseworks as $coursework) {
            if ($coursework['name'] != $submission['name']) {
                echo "<option value='" . $coursework['coursework_id'] . "'>" . $coursework['name'] . "</option>";
            }
        }
        ?>
    </select>
    <br>
    Student that this Submission belongs to
    <select name='student' required>
        <?php
        echo "<option selected value='" . $submission['student_id'] . "'>" . $submission['student_name'] . "</option>";
        foreach ($students as $student) {
            if ($student['name'] != $submission['student_name']) {
                echo "<option value='" . $student['student_id'] . "'>" . $student['name'] . "</option>";
            }
        }
        ?>
    </select>
    <br>
    The Student's mark for this submission (out of 100)
    <input name="mark" type="number" value="<?php echo $submission['mark'] ?>">
    <br>
    The date this submission was handed in by the Student
    <input name="hand_in_date" type="date" value="<?php echo $submission['hand_in_date'] ?>" required>
    <br>
    Is this the Student's second submission for this Coursework?
    <input name="second_submission" type="checkbox" <?php if ($submission['second_submission'] == 1) {
                                                        echo 'checked';
                                                    } ?>>
    <br>
    <br>
    <input type="submit" value='Edit Submission'>
</form>