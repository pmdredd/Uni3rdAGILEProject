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
    $query = "DELETE FROM students WHERE student_id=?";
    $student = DB::run($query, [$student_id]);
    return $student;
}

function getSubmissionsByStudentId($student_id) {
    $query = "SELECT * FROM submissions WHERE student_id=?";
    $submissions = DB::run($query, [$student_id])->fetchAll(PDO::FETCH_ASSOC);
    return $submissions;
}

function getAverageMark($student_id) {
    $query = "SELECT AVG(mark) FROM submissions WHERE student_id=?";
    $avg_mark = DB::run($query, [$student_id])->fetchColumn();
    return $avg_mark;
}

function getStudentGradeCalculation ($Student_id)
    //To get marks and weight from a stundts submission
    $query= "SELECT mark FROM submissions WHERE student_id=?"
    return $Grade
    $query= "Select coursework_id FROM submissions WHERE student_id=?"
    return $Weight
}

function getStudentGrade ($Grade,$Weight){
    //Fetches value from getStudentGradeCalculation then displays value
    $WeightedGrade = $Grade*$Weight;
    //Call Getalpahnumericgrade function
}