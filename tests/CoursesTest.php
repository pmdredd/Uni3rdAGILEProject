<?php

use PHPUnit\Framework\TestCase;
require_once 'courses/course_functions.php';

final class CoursesTest extends TestCase {

    protected function setUp(): void {
        DB::run("INSERT INTO courses (name) VALUES ('test course')");
    }

    // will only actually check if the courses table is empty,
    // not if the rows it returns are correct (e.g. wrong table)
    public function testGetAllCourses() {
        $courses = getAllCourses();
        $this->assertNotEmpty($courses);
    }

    // create a new course called 'test_course', assert that the lastest entry 
    // into the courses table has name 'test_course', then remove that entry.
    public function testCreateCourse() {
        createCourse("test course");
        $test_course = DB::run("SELECT * FROM courses ORDER BY course_id DESC LIMIT 1")->fetch(PDO::FETCH_ASSOC);

        $this->assertSame("test course", $test_course["name"]);
    }

    // create a new course called 'test_course', assert that the lastest entry 
    // into the courses table has the same course_id that getCourseById returns,
    // then remove that entry
    public function testGetCourseById() {
        $test_course = DB::run("SELECT * FROM courses WHERE name LIKE 'test course'")->fetch(PDO::FETCH_ASSOC);
        $test_course_id = $test_course['course_id'];
        $course = getCourseById($test_course_id);

        $this->assertSame($test_course_id, $course['course_id']);
    }

    public function testDeleteCourseById() {
        $test_course = DB::run("SELECT * FROM courses WHERE name LIKE 'test course'")->fetch(PDO::FETCH_ASSOC);
        $test_course_id = $test_course['course_id'];
        // the record should exist, the number of columns in count should be 1
        $recordExists = DB::run("SELECT COUNT(1) FROM courses WHERE course_id = ?", [$test_course_id])->fetchColumn();

        $this->assertEquals(1, $recordExists);
        deleteCourseById($test_course_id);

        // the record should be deleted, the number of columns in count should be 0
        $recordExists = DB::run("SELECT COUNT(1) FROM courses WHERE course_id = ?", [$test_course_id])->fetchColumn();
        $this->assertEquals(0, $recordExists);
    }

    protected function tearDown(): void {
        DB::run("DELETE FROM courses WHERE name LIKE 'test course'");
    }
}
