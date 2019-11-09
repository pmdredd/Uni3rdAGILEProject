<?php
require_once 'course_functions.php';

session_start();
$errors = array();

if (isset($_SESSION['success'])) {
    if ($_SESSION['success'] == true) {
        echo "<script type='text/javascript'>alert('The Course was sucessfully created');</script>";
        $_SESSION['success'] = false;
    }
}

$courses = getAllCourses();

if ($courses) {
    foreach ($courses as $course) {
        echo "<a href='course_details.php?id=" . $course['course_id'] . "'> Course Name: " . $course['name'] . "</a>\n";
        echo "</br>";
    }
} else {
    echo "<p>No courses available</p>";
}