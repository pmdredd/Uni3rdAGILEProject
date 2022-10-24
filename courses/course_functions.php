<?php
if (php_sapi_name() == "cli") {
    require_once getcwd() . '../database/dbconnection.php';
} else {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/database/dbconnection.php';
}

function getAllCourses()
{
    $courses = DB::run("SELECT * FROM courses")->fetchAll(PDO::FETCH_ASSOC);
    return $courses;
}

function createCourse($name)
{
    $query = "INSERT INTO courses (name) VALUES (?)";
    DB::run($query, [$name]);
}

function getCourseById($course_id)
{
    $query = "SELECT * FROM courses WHERE course_id=?";
    $course = DB::run($query, [$course_id])->fetch(PDO::FETCH_ASSOC);
    return $course;
}

function editCourse($course_id, $name)
{
    DB::run("UPDATE courses SET name = ? WHERE course_id = ?", [$name, $course_id]);
}

function getCourseAverageMark($course_id)
{
    $query = "SELECT AVG(mark) FROM submissions sub
              JOIN courseworks cworks ON cworks.coursework_id = sub.coursework_id
              JOIN courses c on c.course_id = cworks.course_id
              WHERE c.course_id = ?";
    $avg_mark = DB::run($query, $course_id)->fetchColumn();
    return $avg_mark;
}

function deleteCourseById($course_id)
{
    $query = "DELETE FROM courses WHERE course_id=?";
    $course = DB::run($query, [$course_id]);
    return $course;
}

function getCourseworksByCourseId($course_id)
{
    $query = "SELECT * FROM courseworks WHERE course_id=?";
    $courseworks = DB::run($query, [$course_id])->fetchAll(PDO::FETCH_ASSOC);
    return $courseworks;
}
