<?php
require_once 'course_functions.php';

$course_id = htmlspecialchars($_GET["id"]);
$course = getCourseById($course_id);

if ($course) {
    echo '<h1>' . $course['name'] . '</h1>';
    echo '<br>';
    echo '<br>';
    echo '<br>';
    echo 'List of courseworks for this course would be here';
} else {
    echo 'There was a problem, please try again';
}
