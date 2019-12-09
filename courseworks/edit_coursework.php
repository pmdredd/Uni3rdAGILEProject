<?php
require_once 'coursework_functions.php';
require_once '../header.html';

session_start();
$errors = array();

if (isset($_POST['name']) && isset($_POST['coursework_id'])) {
    $name = $_POST['name'];
    if (empty($name)) {
        array_push($errors, "Coursework name is required");
    }
    $coursework_id = $_POST['coursework_id'];
    if (empty($coursework_id)) {
        array_push($errors, "Coursework is required");
    }
    $course_id = $_POST['course'];
    if (empty($course_id)) {
        array_push($errors, "A related Course ID is required");
    }
    $deadline = $_POST['deadline'];
    if (empty($deadline)) {
        array_push($errors, "Deadline is required");
    }
    $credit_weight = $_POST['credit_weight'];
    if (empty($credit_weight)) {
        array_push($errors, "Credit weight is required");
    }
    $feedback_due_date = $_POST['feedback_due_date'];
    if (empty($feedback_due_date)) {
        array_push($errors, "Feedback due date is required");
    }

    if (count($errors) == 0) {
        editCoursework($coursework_id, $name, $course_id, $deadline, $credit_weight, $feedback_due_date);
        header('location: coursework_details.php?id=' . $coursework_id);
    } else {
        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
        }
        echo "<p><a href='edit_coursework_form.php?id=" . $coursework_id . "'>Please try again</a></p>";
    }
}