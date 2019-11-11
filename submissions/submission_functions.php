<?php
if (php_sapi_name() == "cli") {
    require_once getcwd().'../database/dbconnection.php';
} else {
    require_once $_SERVER['DOCUMENT_ROOT'].'/database/dbconnection.php';
}

function getAllSubmissions() {
    $submissions = DB::run("SELECT * FROM submissions")->fetchAll(PDO::FETCH_ASSOC);
    return $submissions;
}

function createSubmission($coursework_id, $student_id, $mark = null, $hand_in_date, $second_submission) {
    $query = "INSERT INTO submissions (coursework_id, student_id, mark, hand_in_date, second_submission)
              VALUES (?, ?, ?, ?, ?)";
    DB::run($query, [$coursework_id, $student_id, $mark, $hand_in_date, $second_submission]);
}

function getSubmissionById($submission_id) {
    $query = "SELECT * FROM submissions WHERE submission_id=?";
    $submission = DB::run($query, [$submission_id])->fetch(PDO::FETCH_ASSOC);
    return $submission;
}

function deleteSubmissionById($submission_id) {
    getSubmissionById($submission_id);
    $query = "DELETE FROM submissions WHERE submission_id=?";
    $submission = DB::run($query, [$submission_id]);
    return $course;
}