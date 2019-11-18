<?php
require_once 'course_functions.php';
require_once '../header.html';

$course_id = htmlspecialchars($_GET["id"]);
$course = getCourseById($course_id);
$courseworks = getCourseworksByCourseId($course_id);

if(isset($_POST['delete'])){ //check if form was submitted

    deleteCourseById($course_id);
    header('location: all_courses.php');
}    

if ($course) {
    echo '<h1>' . $course['name'] . '</h1>';
    echo '<br>';
    echo '<form action="" method="post">
            <input type="hidden" name="delete" value="' . $course_id . '"/>
            <input type="submit" value="Delete Course">
        </form>'; 
    echo '<button type="button" onclick="javascript:history.back()">Back</button>';
    echo '<br>';
    echo '<hr>';
    echo '<h1>Courseworks for this Course: </h1>';
    if ($courseworks) {
        foreach ($courseworks as $coursework) {
            echo "<a href='/courseworks/coursework_details.php?id=" . $coursework['coursework_id'] . "'>" . $coursework['name'] . "</a>";
            echo "</br>";
        }
    } else {
        echo '<p>This Course has no Courseworks yet</p>';
    }
} else {
    echo 'There was a problem, please try again';
}

?>
