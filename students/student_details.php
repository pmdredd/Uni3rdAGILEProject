<?php
require_once 'student_functions.php';
require_once '../header.html';

$student_id = htmlspecialchars($_GET["id"]);
$student = getStudentById($student_id);


if (isset($_POST['delete'])) {
    deleteStudentById($student_id);
    header('location: all_students.php');
}    


if ($student) {
    echo '<h1>' . $student['name'] . '</h1>';
    echo '<br>';
    echo '<button type="button" onclick="javascript:history.back()">Back</button>';
    echo '<form action="" method="post">
            <input type="hidden" name="delete" value="' . $student_id . '"/>
            <input type="submit" value="Delete Student">
        </form>'; 
    echo '<br>';
    echo '<br>';
    echo 'List of submissions for this student would be here';
} else {
    echo 'There was a problem, please try again';
}

?>
