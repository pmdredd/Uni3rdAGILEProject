<?php
if (php_sapi_name() == "cli") {
    require_once getcwd().'../database/dbconnection.php';
} else {
    require_once $_SERVER['DOCUMENT_ROOT'].'/database/dbconnection.php';
}

// $sql = DB::run("SELECT COUNT(1) FROM courses WHERE course_id = ?", [1])->fetchColumn();
// $check = $sql->fetchColumn();


// var_dump($sql);
// var_dump($check);



DB::run("INSERT INTO courses (name) VALUES (?)", ['test_course']);
$test_course = DB::run("SELECT * FROM courses WHERE name LIKE 'test_course'")->fetch(PDO::FETCH_ASSOC);
$test_course_id = $test_course['course_id'];
echo $test_course_id;
deleteCourseById($test_course_id);
$recordExists = DB::run("SELECT COUNT(1) FROM courses WHERE course_id = ?", [$test_course_id])->fetchColumn();