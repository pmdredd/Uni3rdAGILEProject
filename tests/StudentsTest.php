<?php

use PHPUnit\Framework\TestCase;
require_once 'students/student_functions.php';

/**
 * Class StudentsTest
 */
final class StudentsTest extends TestCase {

    /**
     * Create the test student and two test submissions for that student, on which the test methods are run.
     * This will be run before each test method.
     */
    protected function setUp(): void {
        DB::run("INSERT INTO students (student_id, name) VALUES (0, 'test student')");
        DB::run("INSERT INTO submissions (coursework_id, student_id, mark, hand_in_date, second_submission, grade)
                 VALUES (1, 0, 40, '2019-12-12', 0, 'D3')");
        DB::run("INSERT INTO submissions (coursework_id, student_id, mark, hand_in_date, second_submission, grade)
                 VALUES (1, 0, 80, '2019-12-12', 0, 'A4')");
    }

    /**
     * Test the getAllStudents() function which should return all students from the students table.
     * This implementation of the test will only actually test that *something* is returned,
     * (i.e. that it returns something that is not empty), not that the correct data is returned.
     */
    public function testGetAllStudents() {
        $students = getAllStudents();
        $this->assertNotEmpty($students);
    }

    /**
     * Create a new student using the createStudent() function, then make sure that the details
     * of the newly created student are the same as the latest student record in the db.
     */
    public function testCreateStudent() {
        createStudent("test student");
        $test_student = DB::run("SELECT * FROM students ORDER BY student_id DESC LIMIT 1")->fetch(PDO::FETCH_ASSOC);

        $this->assertSame("test student", $test_student["name"]);
    }

    /**
     * Get the test student from the db, then check if that student's id is the same as the
     * student returned by the getStudentById() function.
     */
    public function testGetStudentById() {
        $test_student_id =  DB::run("SELECT * FROM students WHERE student_id=0")->fetchColumn();
        $student = getStudentById($test_student_id);

        $this->assertSame($test_student_id, $student['student_id']);
    }

    /**
     * Get the test student record from the db, ensure that the record exists,
     * then run the deleteStudentById() method and assert that the record has been deleted
     */
    public function testDeleteStudentById() {
        $recordExists = DB::run("SELECT COUNT(1) FROM students WHERE student_id = 0")->fetchColumn();

        $this->assertEquals(1, $recordExists);
        deleteStudentById(0);

        $recordExists = DB::run("SELECT COUNT(1) FROM students WHERE student_id = 0")->fetchColumn();
        $this->assertEquals(0, $recordExists);
    }

    /**
     * Assert that getAverageMark() function returns 60, as the two test submissions added in setUp() have an average mark of 60.
     */
    public function testGetAverageMark() {
        $testAvgMark = getAverageMark(0);

        $this->assertEquals(60, $testAvgMark);
    }


    /**
     * Remove the test course from the db.
     * This is run after every test method.
     */
    protected function tearDown(): void {
        DB::run("DELETE FROM students WHERE name LIKE 'test student'");
        DB::run("DELETE FROM submissions WHERE student_id=0");
    }
}
