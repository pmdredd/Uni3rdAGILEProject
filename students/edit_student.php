<?php
require_once 'student_functions.php';
require_once '../header.html';

session_start();
$errors = array();

if (isset($_POST['name']) && isset($_POST['student_id'])) {

    $name = $_POST['name'];
    if (empty($name)) {
        array_push($errors, "Student name is required");
    }
    $student_id = $_POST['student_id'];
    if (empty($student_id)) {
        array_push($errors, "Student id is required");
    }
    if (count($errors) == 0) {        
        DB::run("UPDATE students SET name = ? WHERE student_id = ?", [$name, $student_id]);
        header('location: student_details.php?id=' . $student_id);
    } else {
        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
        }
        echo "<p><a href='edit_student_form.php?id=" . $student_id . "'>Please try again</a></p>";
    }
}