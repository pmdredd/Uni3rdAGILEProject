<?php
if (php_sapi_name() == "cli") {
    require_once getcwd().'../database/dbconnection.php';
} else {
    require_once $_SERVER['DOCUMENT_ROOT'].'/database/dbconnection.php';
}


function getGradeMapping($grade) {
    /* This associative array (aka HashMap or Dictionary) maps all possible Grade values to their respective Primary Key in the Grades table.
     * The Grade keys are descending with the Grade values to make the logic around Late Penalties easier to understand e.g.
     * Submission with Grade A5 is late by 3 days, and we 'drop down' the Grade each day the Submission is late, so
     * we can decrement the Grade's PK by 3 to find the Grade after the late penalty of 3 days is applied.
     *
     * IMPORTANT: If the Grades table schema or records change for any reason, this mapping will need to be updated to reflect the change.
    */
    $gradeMap = array("A1" => 17, "A2" => 16, "A3" => 15, "A4" => 14, "A5" => 13,
        "B1" => 12, "B2" => 11, "B3" => 10,
        "C1" => 9, "C2" => 8, "C3" => 7,
        "D1" => 6, "D2" => 5, "D3" => 4,
        "MF" => 3, "CF" => 2, "BF" => 1);

    return $gradeMap[$grade];
}

function calculateGrade($mark, $second_submission) {
    if ($second_submission) {
        return calculateGradeSecondSubmission($mark);
    } else {
        return calculateGradeFirstSubmission($mark);
    }
}

function calculateGradeFirstSubmission($mark) {
    if ($mark > 100) {
        return false;
    } elseif ($mark >= 95 ) {
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
        return false;
    }
}

function calculateGradeSecondSubmission($mark) {
    if ($mark > 100) {
        return false;
    } elseif ($mark >= 40) {
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
    }
    return false;
}
