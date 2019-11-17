<?php
require_once 'coursework_functions.php';

session_start();
$errors = array();

if (isset($_SESSION['success'])) {
    if ($_SESSION['success'] == true) {
        echo "<script type='text/javascript'>alert('The Coursework was sucessfully created');</script>";
        $_SESSION['success'] = false;
    }
}

$courseworks = getAllCourseworks();

if ($courseworks) {
    foreach ($courseworks as $coursework) {
        echo "<a href='coursework_details.php?id=" . $coursework['coursework_id'] . "'> Coursework Name: " . $coursework['name'] . "</a>\n";
        echo "</br>";
    }
} else {
    echo "<p>No courseworks available</p>";
}