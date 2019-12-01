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
    }
    return false;
}