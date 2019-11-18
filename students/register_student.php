<?php
require_once 'student_functions.php';
require_once '../header.html';

session_start();
$errors = array();

if (isset($_POST['name'])) {

    $name = $_POST['name'];
    if (empty($name)) {
        array_push($errors, "Student name is required");
    }

    if (count($errors) == 0) {
        createStudent($name);
        $_SESSION['success'] = true;
        header('location: all_students.php');
    } else {
        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
        }
        echo "<p><a href='register.html'>Please try again</a></p>";
    }
}