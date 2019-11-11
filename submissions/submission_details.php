<?php
require_once 'submission_functions.php';

$submission_id = htmlspecialchars($_GET["id"]);
$submission = getSubmissionById($submission_id);


if (isset($_POST['delete'])) {
    deleteSubmissionById($submission_id);
    header('location: all_submissions.php');
}    

echo '<h1>Submission details</h1>';
if ($submission) {
    echo '<h2>Submission ID: ' . $submission['submission_id'] . '</h2>';
    echo '<p>Students name should be here maybe<p>';
    echo '<h2>Student ID: ' . $submission['student_id'] . '</h2>';
    echo '<h2>Mark: ' . $submission['mark'] . '</h2>';
    echo '<h2>Hand in date: ' . $submission['hand_in_date'] . '</h2>';
    echo '<h2>Grade: ' . $submission['grade'] . '</h2>';
    echo '<br>';
    echo '<br>';
    echo '<button type="button" onclick="javascript:history.back()">Back</button>';
    echo '<form action="" method="post">
            <input type="hidden" name="delete" value="' . $submission_id . '"/>
            <input type="submit" value="Delete Submission">
        </form>'; 
    echo '<br>';
    echo '<br>';
} else {
    echo 'There was a problem, please try again';
}

?>
