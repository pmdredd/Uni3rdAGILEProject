<?php
require_once 'student_functions.php';
require_once '../header.html';

session_start();
$errors = array();

if (isset($_SESSION['success'])) {
    if ($_SESSION['success'] == true) {
        echo "<script type='text/javascript'>alert('The Student was sucessfully registered');</script>";
        $_SESSION['success'] = false;
    }
}

$students = getAllStudents();

echo '<h1>Students</h1>';
echo "<a href='register_student_form.php'>Register Student</a>\n";
echo '<br>';
echo '<br>';
if ($students) {
    foreach ($students as $student) {
        echo "<a href='student_details.php?id=" . $student['student_id'] . "'> Student Name: " . $student['name'] . "</a>\n";
        echo "</br>";
    }
} else {
    echo "<p>No students registered</p>";
}
