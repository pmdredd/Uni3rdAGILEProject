<?php
require_once 'submission_functions.php';

session_start();
$errors = array();

if (isset($_SESSION['success'])) {
    if ($_SESSION['success'] == true) {
        echo "<script type='text/javascript'>alert('The Coursework was sucessfully submitted');</script>";
        $_SESSION['success'] = false;
    }
}

$submissions = getAllSubmissions();

if ($submissions) {
    foreach ($submissions as $submission) {
        echo "<a href='submission_details.php?id=" . $submission['submission_id'] . "'> Student ID: " . $submission['student_id'] 
              . "  Mark: " . $submission['mark'] . "  Hand in date: " . $submission['hand_in_date'] . "</a>\n";
        echo "</br>";
    }
} else {
    echo "<p>No submissions for this course</p>";
}