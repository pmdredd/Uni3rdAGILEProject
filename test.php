<?php
require_once 'database/dbconnection.php';
// $userExists = DB::run("SELECT COUNT(1) FROM users WHERE email = ?", ['test'])->fetchColumn();
$user = DB::run("SELECT * from users where email = ?", ["test@tesom"])->fetch(PDO::FETCH_ASSOC);


// var_dump($userExists);
var_dump($user);