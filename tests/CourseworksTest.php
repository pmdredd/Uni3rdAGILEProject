<?php

use PHPUnit\Framework\TestCase;
require_once 'courseworks/coursework_functions.php';

/**
 * Class CourseworksTest
 */
final class CourseworksTest extends TestCase {

    /**
     * Create the test coursework and an associated test course on which the test methods are run.
     * This will be run before each test method.
     */
    protected function setUp(): void {
        DB::run("INSERT INTO courses (course_id, name) VALUES (0, 'test coursework')");
        DB::run("INSERT INTO courseworks (name, course_id, deadline, credit_weight, feedback_due_date) 
                 VALUES ('test coursework', 0, '2019-12-12', 10, '2019-12-21')");
    }

    /**
     * Test the getAllCourseWorks() function which should return all courseworks from the courseworks table.
     * This implementation of the test will only actually test that *something* is returned,
     * (i.e. that it returns something that is not empty), not that the correct data is returned.
     */
    public function testGetAllCourseworks() {
        $courseworks = getAllCourseworks();
        $this->assertNotEmpty($courseworks);
    }

    /**
     * Create a new coursework using the createCourseWork() function, then make sure that the name
     * of the newly created coursework is the same as the latest coursework in the db.
     */
    public function testCreateCourse() {
        createCoursework('test coursework', 0, '2019-12-12', 10, '2019-12-21');
        $test_coursework = DB::run("SELECT * FROM courseworks ORDER BY coursework_id DESC LIMIT 1")->fetch(PDO::FETCH_ASSOC);

        $this->assertSame("test coursework", $test_coursework["name"]);
        $this->assertEquals(0, $test_coursework["course_id"]);
        $this->assertSame("2019-12-12", $test_coursework["deadline"]);
        $this->assertEquals(10, $test_coursework["credit_weight"]);
        $this->assertSame("2019-12-21", $test_coursework["feedback_due_date"]);
    }

    /**
     * Get the test coursework from the db, then check if that coursework's id is the same as the
     * coursework returned by the getCourseworkById() function.
     */
    public function testGetCourseworkById() {
        $test_coursework = DB::run("SELECT * FROM courseworks WHERE name LIKE 'test coursework'")->fetch(PDO::FETCH_ASSOC);
        $test_coursework_id = $test_coursework['coursework_id'];
        $coursework = getCourseworkById($test_coursework_id);

        $this->assertSame($test_coursework_id, $coursework['coursework_id']);
    }

    /**
     * Get the test coursework record from the db, ensure that the record exists,
     * then run the deleteCourseworkById() method and assert that the record has been deleted
     */
    public function testDeleteCourseworkById() {
        $test_coursework = DB::run("SELECT * FROM courseworks WHERE name LIKE 'test coursework'")->fetch(PDO::FETCH_ASSOC);
        $test_coursework_id = $test_coursework['coursework_id'];
        // the record should exist, the number of columns in count should be 1
        $recordExists = DB::run("SELECT COUNT(1) FROM courseworks WHERE coursework_id = ?", [$test_coursework_id])->fetchColumn();

        $this->assertEquals(1, $recordExists);
        deleteCourseworkById($test_coursework_id);

        // the record should be deleted, the number of columns in count should be 0
        $recordExists = DB::run("SELECT COUNT(1) FROM courseworks WHERE coursework_id = ?", [$test_coursework_id])->fetchColumn();
        $this->assertEquals(0, $recordExists);
    }

    /**
    * Remove the test coursework and course from the db.
    * This is run after every test method.
    */
    protected function tearDown(): void {
        DB::run("DELETE FROM courseworks WHERE name like 'test coursework'");
    }
}
