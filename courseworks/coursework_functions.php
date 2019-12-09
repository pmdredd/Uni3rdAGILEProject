<?php
if (php_sapi_name() == "cli") {
    require_once getcwd().'../database/dbconnection.php';
} else {
    require_once $_SERVER['DOCUMENT_ROOT'].'/database/dbconnection.php';
}

function getAllCourseworks() {
    $courseworks = DB::run("SELECT * FROM courseworks")->fetchAll(PDO::FETCH_ASSOC);
    return $courseworks;
}

function createCoursework($name, $course_id, $deadline, $credit_weight, $feedback_due_date) {
    $query = "INSERT INTO courseworks (name, course_id, deadline, credit_weight, feedback_due_date) VALUES (?, ?, ?, ?, ?)";
    DB::run($query, [$name, $course_id, $deadline, $credit_weight, $feedback_due_date]);
}

/**
 * the 'api' for getting a coursework's name is different because we are also joining the courses table that has its own
 * name field. This is quick and dirty solution to meet the deadline. Ideally we alter the schema to make each 'name' col unique
 */
function getCourseworkById($coursework_id) {
    $query = "SELECT *, c.name as course_name, cworks.name as coursework_name FROM courseworks cworks 
              JOIN courses c on cworks.course_id = c.course_id
              WHERE coursework_id=?";
    $coursework = DB::run($query, [$coursework_id])->fetch(PDO::FETCH_ASSOC);
    return $coursework;
}

function editCoursework($coursework_id, $name, $course_id, $deadline, $credit_weight, $feedback_due_date) {
    DB::run("UPDATE courseworks SET name = ?, course_id = ?, deadline = ?, credit_weight = ?, feedback_due_date = ? 
                 WHERE coursework_id = ?", [$name, $course_id, $deadline, $credit_weight, $feedback_due_date, $coursework_id]);
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