<?php
require_once 'student_functions.php';

session_start();
$errors = array();

if (isset($_SESSION['success'])) {
    if ($_SESSION['success'] == true) {
        echo "<script type='text/javascript'>alert('The Student was sucessfully registered');</script>";
        $_SESSION['success'] = false;
    }
}

$students = getAllStudents();

if ($students) {
    foreach ($students as $student) {
        echo "<a href='student_details.php?id=" . $student['student_id'] . "'> Student Name: " . $student['name'] . "</a>\n";
        echo "</br>";
    }
} else {
    echo "<p>No students registered</p>";
}