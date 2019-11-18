<?php
require_once 'submission_functions.php';
require_once '../header.html';

session_start();
$errors = array();

if (isset($_SESSION['success'])) {
    if ($_SESSION['success'] == true) {
        echo "<script type='text/javascript'>alert('The Coursework was sucessfully submitted');</script>";
        $_SESSION['success'] = false;
    }
}

$submissions = getAllSubmissions();

// we should try and group by coursework_id e.g. we first get a list of all submissions for Agile Development,
// then a list of all submissions for Java Programming, then Business Systems, etc. see PDO::FETCH_GROUP

if ($submissions) {
    foreach ($submissions as $submission) {
        echo '<h3>Coursework: ' . $submission['coursework_name'] . '</h3>';
        echo "<a href='submission_details.php?id=" . $submission['submission_id'] . "'> Student : " . $submission['student_name'] 
              . "  Hand in date: " . $submission['hand_in_date'] . "</a>\n";
        echo "</br>";
    }
} else {
    echo "<p>No submissions for this course</p>";
}