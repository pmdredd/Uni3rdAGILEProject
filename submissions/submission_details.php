<?php
require_once 'submission_functions.php';
require_once '../header.html';

$submission_id = htmlspecialchars($_GET["id"]);
$submission = getSubmissionById($submission_id);

if (isset($_POST['delete'])) {
    deleteSubmissionById($submission_id);
    header('location: all_submissions.php');
}    

echo '<h1>Submission details</h1>';
if ($submission) {
    echo '<h2>Student: ' . $submission['student_name'] . '</h2>';
    echo '<p>Mark: ' . $submission['mark'] . '</p>';
    echo '<p>Hand in date: ' . $submission['hand_in_date'] . '</p>';
    echo '<p>Grade: ' . $submission['grade'] . '</p>';
    if ($submission['second_submission']) {
        echo '<p>Second submission?: Yes</p>';
    } else {
        echo '<p>Second submission?: No</p>';
    }
    echo '<br>';
    echo '<br>';
    echo '<form action="" method="post">
            <input type="hidden" name="delete" value="' . $submission_id . '"/>
            <input type="submit" value="Delete Submission">
        </form>'; 
    echo '<a href=edit_submission_form.php?id=' . $submission_id . '><button>Edit Submission</button></a>';  
    echo '<button type="button" onclick="javascript:history.back()">Back</button>';
    echo '<br>';
    echo '<br>';
} else {
    echo 'There was a problem, please try again';
}

?>
