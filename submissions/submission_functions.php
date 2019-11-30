<?php
if (php_sapi_name() == "cli") {
    require_once getcwd().'../database/dbconnection.php';
} else {
    require_once $_SERVER['DOCUMENT_ROOT'].'/database/dbconnection.php';
}

function getAllSubmissions() {
    $query = "SELECT submission_id, hand_in_date, stu.name as student_name, cworks.name as coursework_name, c.name as course_name FROM submissions sub
    JOIN students stu ON sub.student_id = stu.student_id
    JOIN courseworks cworks ON sub.coursework_id = cworks.coursework_id
	JOIN courses c ON cworks.course_id = c.course_id
    order by c.course_id, cworks.coursework_id, hand_in_date";
    $submissions = DB::run($query)->fetchAll(PDO::FETCH_ASSOC);
    return $submissions;
}

function createSubmission($coursework_id, $student_id, $mark = null, $hand_in_date, $second_submission) {
    $grade = getAlphanumericGrade($mark, $second_submission);
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

function getAlphanumericGrade($mark, $second_submission) {
    if ($second_submission) {
        if ($mark >= 40) {
            return "D3";
        } elseif ($mark >= 37) {
            return "MF1";
        } elseif($mark >= 34) {
            return "MF2";
        } elseif ($mark >= 30) {
            return "MF3";
        } elseif ($mark >= 20) {
            return "CF"; 
        } elseif ($mark >= 0) {
            return "BF";
        } else {
            //so we can check if this has failed e.g. if the $mark is below 0 for some reason
            return false; 
        }
    } else {
        if($mark >= 95)  {
            return "A1";
        } elseif ($mark >= 89) {
            return "A2";
        } elseif ($mark >= 83) {
            return "A3";
        } elseif ($mark >= 76) {
            return "A4";
        } elseif ($mark >= 70) {
            return "A5";
        } elseif ($mark >= 67) {
            return "B1";
        } elseif ($mark >= 64) {
            return "B2";
        } elseif ($mark >= 60) {
            return "B3";
        } elseif ($mark >= 57) {
            return "C1";
        } elseif ($mark >= 54) {
            return "C2";
        } elseif ($mark >= 50) {
            return "C3";
        } elseif ($mark >= 47) {
            return "D1";
        } elseif ($mark >= 44) {
            return "D2";
        } elseif ($mark >= 40) {
            return "D3";
        } elseif ($mark >= 37) {
            return "MF1";
        } elseif ($mark >= 34) {
            return "MF2";
        } elseif ($mark >= 30) {
            return "MF3";
        } elseif ($mark >= 20) {
            return "CF";
        } elseif ($mark >= 0) {
            return "BF";
        } else {
        //so we can check if this has failed e.g. if the $mark is below 0 for some reason
            return false; 
        }
    }
}
