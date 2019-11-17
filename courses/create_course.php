<?php
require_once 'course_functions.php';
require_once '../header.html';

session_start();
$errors = array();

if (isset($_POST['name'])) {

    $name = $_POST['name'];
    if (empty($name)) {
        array_push($errors, "Course name is required");
    }

    if (count($errors) == 0) {
        
        createCourse($name);
        $_SESSION['success'] = true;
        header('location: all_courses.php');
    } else {
        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
        }
        echo "<p><a href='create_course.html'>Please try again</a></p>";
    }
}