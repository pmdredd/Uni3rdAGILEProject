<?php
if (php_sapi_name() == "cli") {
    require_once getcwd().'../database/dbconnection.php';
} else {
    require_once $_SERVER['DOCUMENT_ROOT'].'/database/dbconnection.php';
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
            return 5;
        } elseif($mark >= 34) {
            return 4;
        } elseif ($mark >= 30) {
            return 3;
        } elseif ($mark >= 20) {
            return 2; 
        } elseif ($mark >= 0) {
            return 1;
        } else {
            //so we can check if this has failed e.g. if the $mark is below 0 for some reason
            return false; 
        }
    } else {
        if($mark >= 95)  {
            return 19;
        } elseif ($mark >= 89) {
            return 18;
        } elseif ($mark >= 83) {
            return 17;
        } elseif ($mark >= 76) {
            return 16;
        } elseif ($mark >= 70) {
            return 15;
        } elseif ($mark >= 67) {
            return 14;
        } elseif ($mark >= 64) {
            return 13;
        } elseif ($mark >= 60) {
            return 12;
        } elseif ($mark >= 57) {
            return 11;
        } elseif ($mark >= 54) {
            return 10;
        } elseif ($mark >= 50) {
            return 9;
        } elseif ($mark >= 47) {
            return 8;
        } elseif ($mark >= 44) {
            return 7;
        } elseif ($mark >= 40) {
            return 6;
        } elseif ($mark >= 37) {
            return 5;
        } elseif ($mark >= 34) {
            return 4;
        } elseif ($mark >= 30) {
            return 3;
        } elseif ($mark >= 20) {
            return 2;
        } elseif ($mark >= 0) {
            return 1;
        } else {
        //so we can check if this has failed e.g. if the $mark is below 0 for some reason
            return false; 
        }
    }
}
