<?php

use PHPUnit\Framework\TestCase;
require_once 'submissions/submission_functions.php';

/**
 * Class SubmissionsTest
 */
final class SubmissionsTest extends TestCase {

    /**
     * Create the test submission and an associated test coursework and student.
     * This will be run before each test method.
     */
    protected function setUp(): void {
        DB::run("INSERT INTO students (student_id, name) VALUES (0, 'test student')");
        DB::run("INSERT INTO courseworks (coursework_id, name, course_id, deadline, credit_weight, feedback_due_date) 
                 VALUES (0, 'test coursework', 2, '2019-12-12', 10, '2019-12-21')");
        DB::run("INSERT INTO submissions (submission_id, coursework_id, student_id, mark, hand_in_date, second_submission, grade)
                 VALUES (0, 2, 0, 80, '2019-12-12', 0, 'A1')");
    }

    /**
     * Should return all courseworks from the courseworks table.
     * This implementation of the test will only actually test that *something* is returned,
     * (i.e. that it returns something that is not empty), not that the correct data is returned.
     */
    public function testGetAllSubmissions() {
        $submissions = getAllSubmissions();
        $this->assertNotEmpty($submissions);
    }

    /**
     * Create a new submission, then make sure that the details of the newly created
     * submission are the same as the latest submission record in the db.
     */
    public function testCreateSubmission() {
        createSubmission(2, 0, 80, '2000-12-12', 0);
        $test_submission = DB::run("SELECT * FROM submissions ORDER BY submission_id DESC LIMIT 1")->fetch(PDO::FETCH_ASSOC);

        $this->assertEquals(2, $test_submission["coursework_id"]);
        $this->assertEquals(0, $test_submission["student_id"]);
        $this->assertEquals(80, $test_submission["mark"]);
        $this->assertSame("2000-12-12", $test_submission["hand_in_date"]);
        $this->assertEquals(0, $test_submission["second_submission"]);
    }

    /**
     * Get the test submission from the db, then check if that submission's id is the same as the
     * submission returned by the getSubmissionById() function.
     */
    public function testGetSubmissionById() {
        $submission = getSubmissionById(0);

        $this->assertEquals(0, $submission['submission_id']);
    }

    /**
     * Get the test submission record from the db, ensure that the record exists,
     * then run the deleteSubmissionById() method and assert that the record has been deleted
     */
    public function testDeleteSubmissionById() {
        $test_submission = DB::run("SELECT * FROM submissions WHERE submission_id = 0")->fetch(PDO::FETCH_ASSOC);
        $test_submission_id = $test_submission['submission_id'];
        // the record should exist, the number of columns in count should be 1
        $recordExists = DB::run("SELECT COUNT(1) FROM submissions WHERE submission_id = ?", [$test_submission_id])->fetchColumn();

        $this->assertEquals(1, $recordExists);
        deleteSubmissionById($test_submission_id);

        // the record should be deleted, the number of columns in count should be 0
        $recordExists = DB::run("SELECT COUNT(1) FROM submissions WHERE submission_id = ?", [$test_submission_id])->fetchColumn();
        $this->assertEquals(0, $recordExists);
    }

    /**
    * Remove the test submission, coursework and student from the db.
    * This is run after every test method.
    */
    protected function tearDown(): void {
        DB::run("DELETE FROM courseworks WHERE name like 'test coursework'");
        DB::run("DELETE FROM students WHERE name LIKE 'test student'");
        DB::run("DELETE FROM submissions WHERE submission_id = 0 OR hand_in_date LIKE '2000-12-12'");
    }
}
