<?php

use PHPUnit\Framework\TestCase;

require_once 'courses/course_functions.php';

/**
 * Class CoursesTest
 */
final class CoursesTest extends TestCase
{

    /**
     * Create the test course on which the test methods are run.
     * This will be run before each test method.
     */
    protected function setUp(): void
    {
        DB::run("INSERT INTO courses (name) VALUES ('test course')");
    }

    /**
     * Test the getAllCourses() function which should return all courses from the courses table.
     * This implementation of the test will only actually test that *something* is returned,
     * (i.e. that it returns something that is not empty), not that the correct data is returned.
     */
    public function testGetAllCourses()
    {
        $courses = getAllCourses();
        $this->assertNotEmpty($courses);
    }

    /**
     * Create a new course using the createCourse() function, then make sure that the details
     * of the newly created course are the same as the latest course record in the db.
     */
    public function testCreateCourse()
    {
        createCourse("test course");
        $test_course = DB::run("SELECT * FROM courses ORDER BY course_id DESC LIMIT 1")->fetch(PDO::FETCH_ASSOC);

        $this->assertSame("test course", $test_course["name"]);
    }

    /**
     * Get the test course from the db, then check if that course's id is the same as the
     * course returned by the getCourseById() function.
     */
    public function testGetCourseById()
    {
        $test_course = DB::run("SELECT * FROM courses WHERE name LIKE 'test course'")->fetch(PDO::FETCH_ASSOC);
        $test_course_id = $test_course['course_id'];
        $course = getCourseById($test_course_id);

        $this->assertSame($test_course_id, $course['course_id']);
    }

    /**
     * Get the test course from the db, make sure the name is 'test course', use editCourse() to
     * change the course's name, and assert that the same record has the changed name
     */
    public function testEditCourse()
    {
        $test_course = DB::run("SELECT * FROM courses WHERE name LIKE 'test course'")->fetch(PDO::FETCH_ASSOC);
        $test_course_id = $test_course['course_id'];
        $this->assertEquals("test course", $test_course['name']);
        editCourse($test_course_id, "edited course");
        $test_course = DB::run("SELECT * FROM courses WHERE course_id = ?", [$test_course_id])->fetch(PDO::FETCH_ASSOC);
        $this->assertEquals("edited course", $test_course['name']);
    }

    /**
     * Get the test course record from the db, ensure that the record exists,
     * then run the deleteCourseById() method and assert that the record has been deleted
     */
    public function testDeleteCourseById()
    {
        $test_course = DB::run("SELECT * FROM courses WHERE name LIKE 'test course'")->fetch(PDO::FETCH_ASSOC);
        $test_course_id = $test_course['course_id'];
        $recordExists = DB::run("SELECT COUNT(1) FROM courses WHERE course_id = ?", [$test_course_id])->fetchColumn();

        $this->assertEquals(1, $recordExists);
        deleteCourseById($test_course_id);

        $recordExists = DB::run("SELECT COUNT(1) FROM courses WHERE course_id = ?", [$test_course_id])->fetchColumn();
        $this->assertEquals(0, $recordExists);
    }

    /**
     * Remove the test course from the db.
     * This is run after every test method.
     */
    protected function tearDown(): void
    {
        DB::run("DELETE FROM courses WHERE name LIKE 'test course'");
        DB::run("DELETE FROM courses WHERE name LIKE 'edited course'");
    }
}
