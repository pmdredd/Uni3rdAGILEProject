<?php

use PHPUnit\Framework\TestCase;
require_once 'courseworks/coursework_functions.php';

final class CourseworksTest extends TestCase {

    protected function setUp(): void {
        DB::run("INSERT INTO courses (course_id, name) VALUES (0, 'test coursework')");
        DB::run("INSERT INTO courseworks (name, course_id, deadline, credit_weight, feedback_due_date) 
                 VALUES ('test coursework', 0, '2019-12-12', 10, '2019-12-21')");
    }

    // will only actually check if the courses table is empty,
    // not if the rows it returns are correct (e.g. wrong table)
    public function testGetAllCourseworks() {
        $courseworks = getAllCourseworks();
        $this->assertNotEmpty($courseworks);
    }

    // create a new course called 'test_course', assert that the lastest entry 
    // into the courses table has name 'test_course', then remove that entry.
    public function testCreateCourse() {
        createCoursework('test coursework', 0, '2019-12-12', 10, '2019-12-21');
        $test_coursework = DB::run("SELECT * FROM courseworks ORDER BY coursework_id DESC LIMIT 1")->fetch(PDO::FETCH_ASSOC);

        $this->assertSame("test coursework", $test_coursework["name"]);
        $this->assertEquals(0, $test_coursework["course_id"]);
        $this->assertSame("2019-12-12", $test_coursework["deadline"]);
        $this->assertEquals(10, $test_coursework["credit_weight"]);
        $this->assertSame("2019-12-21", $test_coursework["feedback_due_date"]);
    }

    // create a new course called 'test_course', assert that the lastest entry 
    // into the courses table has the same course_id that getCourseById returns,
    // then remove that entry
    public function testGetCourseworkById() {
        $test_coursework = DB::run("SELECT * FROM courseworks WHERE name LIKE 'test coursework'")->fetch(PDO::FETCH_ASSOC);
        $test_coursework_id = $test_coursework['coursework_id'];
        $coursework = getCourseworkById($test_coursework_id);

        $this->assertSame($test_coursework_id, $coursework['coursework_id']);
    }

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

    protected function tearDown(): void {
        DB::run("DELETE FROM courseworks WHERE name like 'test coursework'");
    }
}
