<?php
require_once 'submission_functions.php';
require_once '../header.html';

session_start();
$errors = array();

if (isset($_POST['coursework_id']) && isset($_POST['student_id'])
    && isset($_POST['mark']) && isset($_POST['hand_in_date'])) {

    $coursework_id = $_POST['coursework_id'];
    $student_id = $_POST['student_id'];
    if ($_POST['mark']) {
        $mark = $_POST['mark'];
    } else {
        $mark = null;
    }
    $hand_in_date = $_POST['hand_in_date'];
    if ($_POST['second_submission']) {
        $second_submission = true;
    } else {
        $second_submission = false;
    }

    if (empty($coursework_id)) {
        array_push($errors, "Coursework ID is required");
    }
    if (empty($student_id)) {
        array_push($errors, "Student ID is required");
    }
    if (empty($hand_in_date)) {
        array_push($errors, "Hand in date is required");
    }

    if (count($errors) == 0) {
        
        createSubmission($coursework_id, $student_id, $mark, $hand_in_date, $second_submission);
        $_SESSION['success'] = true;
        header('location: all_submissions.php');
    } else {
        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
        }
        echo "<p><a href='create_course.html'>Please try again</a></p>";
    }
}