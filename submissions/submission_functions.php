<?php
if (php_sapi_name() == "cli") {
    require_once getcwd().'../database/dbconnection.php';
    require_once getcwd().'../grades/grade_functions.php';
} else {
    require_once $_SERVER['DOCUMENT_ROOT'].'/database/dbconnection.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/grades/grade_functions.php';
}

function getAllSubmissions() {
    $query = "SELECT submission_id, hand_in_date, stu.name as student_name, c.name as coursework_name FROM submissions sub
    JOIN students stu ON sub.student_id = stu.student_id
    JOIN courses c ON sub.coursework_id = c.course_id
    ORDER BY hand_in_date";
    $submissions = DB::run($query)->fetchAll(PDO::FETCH_ASSOC);
    return $submissions;
}

function createSubmission($coursework_id, $student_id, $mark = null, $hand_in_date, $second_submission) {
    $grade = calculateGrade($mark, $second_submission);
    $query = "INSERT INTO submissions (coursework_id, student_id, mark, hand_in_date, second_submission, grade)
              VALUES (?, ?, ?, ?, ?, ?)";
    DB::run($query, [$coursework_id, $student_id, $mark, $hand_in_date, $second_submission, $grade]);
}

function getSubmissionById($submission_id) {

    $query = "SELECT submission_id, mark, hand_in_date, grade, second_submission, name as student_name FROM submissions sub
              JOIN students stu ON sub.student_id = stu.student_id
              WHERE submission_id = ?";
    $submission = DB::run($query, [$submission_id])->fetch(PDO::FETCH_ASSOC);
    return $submission;
}

function deleteSubmissionById($submission_id) {
    $query = "DELETE FROM submissions WHERE submission_id=?";
    $submission = DB::run($query, [$submission_id]);
    return $submission;
}
