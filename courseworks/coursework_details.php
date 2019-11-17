<?php
require_once 'coursework_functions.php';

$coursework_id = htmlspecialchars($_GET["id"]);
$coursework = getCourseworkById($coursework_id);

if(isset($_POST['delete'])){ //check if form was submitted

    deleteCourseworkById($coursework_id);
    header('location: all_courseworks.php');
}    

if ($coursework) {
    echo '<h1>' . $coursework['name'] . '</h1>';
    echo '<br>';
    echo '<button type="button" onclick="javascript:history.back()">Back</button>';
    echo '<form action="" method="post">
            <input type="hidden" name="delete" value="' . $coursework_id . '"/>
            <input type="submit" value="Delete Coursework">
        </form>'; 
    echo '<br>';
    echo '<br>';
    echo 'List of submissions for this coursework would be here';
} else {
    echo 'There was a problem, please try again';
}

?>
