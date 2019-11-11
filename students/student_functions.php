<?php
if (php_sapi_name() == "cli") {
    require_once getcwd().'../database/dbconnection.php';
} else {
    require_once $_SERVER['DOCUMENT_ROOT'].'/database/dbconnection.php';
}

function getAllStudents() {
    $students = DB::run("SELECT * FROM students")->fetchAll(PDO::FETCH_ASSOC);
    return $students;
}

function createStudent($name) {
    $query = "INSERT INTO students (name) VALUES (?)";
    DB::run($query, [$name]);
}

function getStudentById($student_id) {
    $query = "SELECT * FROM students WHERE student_id=?";
    $student = DB::run($query, [$student_id])->fetch(PDO::FETCH_ASSOC);
    return $student;
}

function deleteStudentById($student_id) {
    getStudentById($student_id);
    $query = "DELETE FROM students WHERE student_id=?";
    $student = DB::run($query, [$student_id]);
    return $student;
}
