<?php
require_once 'coursework_functions.php';
require_once '../header.html';

$coursework_id = htmlspecialchars($_GET["id"]);
$coursework = getCourseworkById($coursework_id);
$submissions = getSubmissionsByCourseworkId($coursework_id);

if(isset($_POST['delete'])){ //check if form was submitted

    deleteCourseworkById($coursework_id);
    header('location: all_courseworks.php');
}    

if ($coursework) {
    echo '<h1>' . $coursework['name'] . '</h1>';
    echo '<br>';
    echo '<form action="" method="post">
            <input type="hidden" name="delete" value="' . $coursework_id . '"/>
            <input type="submit" value="Delete Coursework">
        </form>'; 
    echo '<button type="button" onclick="javascript:history.back()">Back</button>';
    echo '<br>';
    echo '<hr>';
    echo '<h1>Submissions for this Coursework</h1>';
    if ($submissions) {
        foreach ($submissions as $submission) {
            echo "<a href='/submissions/submission_details.php?id=" . $submission['submission_id'] . "'>{Student name here} Mark: " . $submission['mark'] . "</a>";
            echo "</br>";
        }
    } else {
        echo '<p>This Coursework has no Submissions yet</p>';
    }
} else {
    echo 'There was a problem, please try again';
}

?>
