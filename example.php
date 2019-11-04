<?php
include('database/dbconnection.php');

function add($arg1, $arg2)
{
    return $arg1 + $arg2;
}

function getAllStudents()
{
    $pdo = DbConnection::getInstance()->getConn();
    $students = $pdo->query("SELECT * FROM students");
    return $students;
}

function getStudentById($studentId)
{
    $pdo = DbConnection::getInstance()->getConn();
    $stmt = $pdo->prepare("SELECT * from students WHERE student_id = ?");
    $stmt->execute([$studentId]);
    $student = $stmt->fetch();
    return $student;
}

$students = getAllStudents();
echo "All Students " . "\n";
foreach ($students as $student) {
    echo "ID: " . $student['student_id'] . ", Name: " . $student['name'] . "\n";
}

echo "\n";

$student = getStudentById(1);
echo "Name: " . $student['name'] . "\n";
