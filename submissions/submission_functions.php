<?php
if (php_sapi_name() == "cli") {
    require_once getcwd().'../database/dbconnection.php';
    require_once getcwd().'../grades/grade_functions.php';
} else {
    require_once $_SERVER['DOCUMENT_ROOT'].'/database/dbconnection.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/grades/grade_functions.php';
}

function getAllSubmissions() {
    $query = "SELECT submission_id, hand_in_date, stu.name as student_name, cworks.name as coursework_name, c.name as course_name
              FROM submissions sub
              JOIN students stu ON sub.student_id = stu.student_id
              JOIN courseworks cworks ON sub.coursework_id = cworks.coursework_id
	          JOIN courses c ON cworks.course_id = c.course_id
              order by c.course_id, cworks.coursework_id, hand_in_date";
    $submissions = DB::run($query)->fetchAll(PDO::FETCH_ASSOC);
    return $submissions;
}

function createSubmission($coursework_id, $student_id, $mark, $hand_in_date, $second_submission) {
    $grade_value = calculateGrade($mark, $second_submission);
    $grade_id = getGradeId($grade_value);
    $query = "INSERT INTO submissions (coursework_id, student_id, mark, hand_in_date, second_submission, grade_id)
              VALUES (?, ?, ?, ?, ?, ?)";
    DB::run($query, [$coursework_id, $student_id, $mark, $hand_in_date, $second_submission, $grade_id]);
}

function getSubmissionById($submission_id) {
    $query = "SELECT submission_id, sub.coursework_id, stu.student_id, mark, hand_in_date, g.grade, second_submission, stu.name as student_name, c.name 
              FROM submissions sub
              JOIN students stu ON sub.student_id = stu.student_id
              JOIN grades g on sub.grade_id = g.grade_id
              JOIN courseworks c on sub.coursework_id = c.coursework_id
              WHERE submission_id = ?";
    $submission = DB::run($query, [$submission_id])->fetch(PDO::FETCH_ASSOC);
    return $submission;
}

function editSubmission($submission_id, $coursework_id, $student_id, $mark, $hand_in_date, $second_submission) {
    $grade_value = calculateGrade($mark, $second_submission);
    $grade_id = getGradeId($grade_value);
    DB::run("UPDATE submissions SET coursework_id = ?, student_id = ?, mark = ?, hand_in_date = ?, second_submission = ?, grade_id = ? 
                 WHERE submission_id = ?", [$coursework_id, $student_id, $mark, $hand_in_date, $second_submission, $grade_id, $submission_id]);
}

function deleteSubmissionById($submission_id) {
    $query = "DELETE FROM submissions WHERE submission_id=?";
    $submission = DB::run($query, [$submission_id]);
    return $submission;
}
