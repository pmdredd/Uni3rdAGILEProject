<?php
require_once 'student_functions.php';

$student_id = htmlspecialchars($_GET["id"]);
$student = getStudentById($student_id);
$submissions = getSubmissionsByStudentId($student_id);


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
    echo '<hr>';
    echo "<h1>This student's submissions</h1>";
    if ($submissions) {
        foreach ($submissions as $submission) {
            echo '<h3>Coursework: ' . $submission['coursework_id']  .'<h3>
                  <p>Hand in Date: ' . $submission['hand_in_date']  . '</p>
                  <p>Mark: ' . $submission['mark'] . '</p>
                  <p>Grade: ' . $submission['grade'] . '</p>
                  <br>';
        }
    } else {
        echo '<p>This student has no submissions yet</p>';
    }
    
} else {
    echo 'There was a problem, please try again';
}

?>
