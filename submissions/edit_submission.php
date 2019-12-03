<?php
require_once 'submission_functions.php';
require_once '../header.html';

session_start();
$errors = array();

if (isset($_POST['coursework_id']) && isset($_POST['student_id'])
    && isset($_POST['mark']) && isset($_POST['hand_in_date']) && isset($_POST['submission_id'])) {

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
    $submission_id = $_POST['submission_id'];

    if (empty($coursework_id)) {
        array_push($errors, "Coursework ID is required");
    }
    if (empty($student_id)) {
        array_push($errors, "Student ID is required");
    }
    if (empty($hand_in_date)) {
        array_push($errors, "Hand in date is required");
    }
    if (empty($submission_id)) {
        array_push($errors, "Submission id is required");
    }

    if (count($errors) == 0) {
        $grade = getAlphanumericGrade($mark, $second_submission);
        DB::run("UPDATE submissions SET coursework_id = ?, student_id = ?, mark = ?, hand_in_date = ?, second_submission = ?, grade = ? 
                 WHERE submission_id = ?", [$coursework_id, $student_id, $mark, $hand_in_date, $second_submission, $grade, $submission_id]);
        header('location: submission_details.php?id=' . $submission_id);
    } else {
        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
        }
        echo "<p><a href='edit_submission_form.php?id=" . $submission_id . "'>Please try again</a></p>";
    }
}