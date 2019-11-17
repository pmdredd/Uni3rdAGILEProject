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

function createCoursework($name, $coursework_id, $deadline, $credit_weight, $feedback_due_date) {
    $query = "INSERT INTO courseworks (name, coursework_id, deadline, credit_weight, feedback_due_date) VALUES (?, ?, ?, ?, ?)";
    DB::run($query, [$name]);
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
