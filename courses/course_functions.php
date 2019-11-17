<?php
if (php_sapi_name() == "cli") {
    require_once getcwd().'../database/dbconnection.php';
} else {
    require_once $_SERVER['DOCUMENT_ROOT'].'/database/dbconnection.php';
}

function getAllCourses() {
    $courses = DB::run("SELECT * FROM courses")->fetchAll(PDO::FETCH_ASSOC);
    return $courses;
}

function createCourse($name) {
    $query = "INSERT INTO courses (name) VALUES (?)";
    DB::run($query, [$name]);
}

function getCourseById($course_id) {
    $query = "SELECT * FROM courses WHERE course_id=?";
    $course = DB::run($query, [$course_id])->fetch(PDO::FETCH_ASSOC);
    return $course;
}

function deleteCourseById($course_id) {
    $query = "DELETE FROM courses WHERE course_id=?";
    $course = DB::run($query, [$course_id]);
    return $course;
}
