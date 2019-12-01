<?php
if (php_sapi_name() == "cli") {
    require_once getcwd().'../database/dbconnection.php';
} else {
    require_once $_SERVER['DOCUMENT_ROOT'].'/database/dbconnection.php';
}

function calculateGrade($mark) {
    if ($mark >= 95 ) {
        return "A1";
    } elseif ($mark >= 89) {
        return "A2";
    }
    return false;
}