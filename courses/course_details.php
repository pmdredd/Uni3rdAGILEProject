<?php
require_once 'course_functions.php';
require_once '../header.html';

$course_id = htmlspecialchars($_GET["id"]);
$course = getCourseById($course_id);

if(isset($_POST['delete'])){ //check if form was submitted

    deleteCourseById($course_id);
    header('location: all_courses.php');
}    

if ($course) {
    echo '<h1>' . $course['name'] . '</h1>';
    echo '<br>';
    echo '<button type="button" onclick="javascript:history.back()">Back</button>';
    echo '<form action="" method="post">
            <input type="hidden" name="delete" value="' . $course_id . '"/>
            <input type="submit" value="Delete Course">
        </form>'; 
    echo '<br>';
    echo '<br>';
    echo 'List of courseworks for this course would be here';
} else {
    echo 'There was a problem, please try again';
}

?>
