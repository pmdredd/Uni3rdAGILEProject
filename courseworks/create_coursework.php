<?php
require_once 'coursework_functions.php';
require_once '../header.html';

session_start();
$errors = array();

if (isset($_POST['name'])) {

    $name = $_POST['name'];
    if (empty($name)) {
        array_push($errors, "Coursework name is required");
    }
    $course_id = $_POST['course_id'];
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
        createCoursework($name, $course_id, $deadline, $credit_weight, $feedback_due_date);
        $_SESSION['success'] = true;
        header('location: all_courseworks.php');
    } else {
        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
        }
        echo "<p><a href='create_coursework.html'>Please try again</a></p>";
    }
}