<?php
require_once 'course_functions.php';
require_once '../header.html';

session_start();
$errors = array();

if (isset($_POST['name']) && isset($_POST['course_id'])) {

    $name = $_POST['name'];
    if (empty($name)) {
        array_push($errors, "Course name is required");
    }
    $course_id = $_POST['course_id'];
    if (empty($course_id)) {
        array_push($errors, "Course id is required");
    }
    if (count($errors) == 0) {
        editCourse($course_id, $name);
        header('location: course_details.php?id=' . $course_id);
    } else {
        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
        }
        echo "<p><a href='edit_course_form.php?id=" . $course_id . "'>Please try again</a></p>";
    }
}
