<?php
require_once 'submission_functions.php';
require_once '../header.html';

$submission = getSubmissionById($_GET['id']);
?>

<h2>Edit Submission</h2>

<form method="post" action="edit_submission.php">
    <input name="submission_id" type="hidden" value="<?php echo $submission['submission_id'] ?>">
    Coursework Id for this Submission
    <input name="coursework_id" type="number" value="<?php echo $submission['coursework_id'] ?>" required>
    <br>
    Student Id for the Student that this Submission belongs to
    <input name="student_id" type="number" value="<?php echo $submission['student_id'] ?>" required>
    <br>
    The Student's mark for this submission (out of 100)
    <input name="mark" type="number" value="<?php echo $submission['mark'] ?>">
    <br>
    The date this submission was handed in by the Student
    <input name="hand_in_date" type="date" value="<?php echo $submission['hand_in_date'] ?>" required>
    <br>
    Is this the Student's second submission for this Coursework?
    <input name="second_submission" type="checkbox" <?php if($submission['second_submission'] == 1) {echo 'checked';} ?>>
    <br>
    <br>
    <input type="submit" value='Edit Submission'>
</form>
