<?php
if (php_sapi_name() == "cli") {
    require_once getcwd().'../database/dbconnection.php';
    require_once getcwd().'../grades/grade_functions.php';
} else {
    require_once $_SERVER['DOCUMENT_ROOT'].'/database/dbconnection.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/grades/grade_functions.php';
}

function getAllCourseworks() {
    $courseworks = DB::run("SELECT * FROM courseworks")->fetchAll(PDO::FETCH_ASSOC);
    return $courseworks;
}

function createCoursework($name, $course_id, $deadline, $credit_weight, $feedback_due_date) {
    $query = "INSERT INTO courseworks (name, course_id, deadline, credit_weight, feedback_due_date) VALUES (?, ?, ?, ?, ?)";
    DB::run($query, [$name, $course_id, $deadline, $credit_weight, $feedback_due_date]);
}

function getCourseworkById($coursework_id) {
    $query = "SELECT * FROM courseworks WHERE coursework_id=?";
    $coursework = DB::run($query, [$coursework_id])->fetch(PDO::FETCH_ASSOC);
    return $coursework;
}

function deleteCourseworkById($coursework_id) {
    $query = "DELETE FROM courseworks WHERE coursework_id=?";
    $coursework = DB::run($query, [$coursework_id]);
    return $coursework;
}

function getSubmissionsByCourseworkId($coursework_id) {
    $query = "SELECT submission_id, hand_in_date, name as student_name, mark, grade FROM submissions sub
              JOIN students stu ON sub.student_id = stu.student_id
              JOIN grades g ON sub.grade_id = g.grade_id 
              WHERE coursework_id = ?";
    $submissions = DB::run($query, [$coursework_id])->fetchAll(PDO::FETCH_ASSOC);
    return $submissions;
}

// 'fails' are defined as submissions where the grade is lower than D3
function getNumberOfFails($coursework_id) {
    $grade_id = getGradeId("D3");
    $query = "SELECT COUNT(*) FROM submissions sub
              JOIN courseworks cworks on sub.coursework_id = cworks.coursework_id
              JOIN grades g on sub.grade_id = g.grade_id 
              WHERE g.grade_id < ? AND sub.coursework_id = ?";
    $no_of_fails = DB::run($query, [$grade_id, $coursework_id])->fetchColumn();
    return $no_of_fails;
}

function getCourseworkAverageMark($coursework_id) {
    $query = "SELECT AVG(mark) FROM submissions sub
              WHERE sub.coursework_id = ?";
    $avg_mark = DB::run($query, [$coursework_id])->fetchColumn();
    return round($avg_mark,0);
}

function getNumberOfLateSubmissions($coursework_id) {
    $query = "SELECT COUNT(*) FROM submissions sub
              JOIN courseworks cworks ON cworks.coursework_id = sub.coursework_id
              WHERE sub.hand_in_date > cworks.deadline AND sub.coursework_id = ?";
    $late_submissions = DB::run($query, [$coursework_id])->fetchColumn();
    return $late_submissions;
}

function getNumberOfSecondSubmissions($coursework_id) {
    $query = "SELECT COUNT(*) FROM submissions sub
              WHERE sub.second_submission = TRUE AND sub.coursework_id = ?";
    $second_submissions = DB::run($query, [$coursework_id])->fetchColumn();
    return $second_submissions;
}